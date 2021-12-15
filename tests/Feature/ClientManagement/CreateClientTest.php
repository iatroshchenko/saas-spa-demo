<?php

namespace Tests\Feature\ClientManagement;

use App\Http\Requests\ClientManagement\CreateClientRequest;
use App\Models\Quote\QuoteShipper;
use App\Models\Shipper;
use App\Models\User;
use App\Service\ClientManagementService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class CreateClientTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected User $businessUser;
    protected Shipper $shipper;
    protected ClientManagementService $clientManagement;

    protected function setUp(): void
    {
        parent::setUp();

        // creates User, Shipper
        $shipper = Shipper::factory()
            ->state([
                'owner_id' => $user = User::factory()->state([
                    'role' => User::ROLE_BUSINESS
                ])->create()
            ])
            ->create();

        $this->shipper = $shipper;
        $this->businessUser = $user;
        $this->clientManagement = app()->make(ClientManagementService::class);
    }

    public function businessSuccessfullyAddsClientDataProvider(): array
    {
        return [
            ["0"],
            ["1"]
        ];
    }

    /**
     * @dataProvider businessSuccessfullyAddsClientDataProvider
     * @param $askChangeNext
     */
    public function testBusinessSuccessfullyCreatesClient($askChangeNext)
    {
        $quoteShipper = QuoteShipper::factory()->make();

        $validRequestData = [
            'shipper_id' => $this->businessUser->getShipper()->getPublicKey(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => substr($this->faker->e164PhoneNumber, 2,10),
            'email' => $this->faker->email,
            'password' => $this->faker->password(8, 20),
            'ask_password_change_next_login' => $askChangeNext,

            'type' => $quoteShipper->type,
            'company' => $quoteShipper->company,
            'address_1' => $quoteShipper->address_1,
            'address_2' => $quoteShipper->address_2,
            'zip' => $quoteShipper->zip,
            'city' => $quoteShipper->city,
            'state' => $quoteShipper->state,
            'phone_2' => $quoteShipper->phone_2,
            'mobile' => $quoteShipper->mobile,
            'fax' => $quoteShipper->fax,
            'notes_from_shipper' => $quoteShipper->notes_from_shipper,
        ];

        $request = new CreateClientRequest($validRequestData);
        $validator = Validator::make($request->all(), $request->rules());

        try {
            if ($validator->validate()) {
                $data = $validator->validated();
            }
        } catch (ValidationException $exception) {
            dump($exception->errors());
            dd(self::class);
        }

        $client = $this
            ->clientManagement
            ->createClientFromRequest($request);

        $this->assertInstanceOf(User::class, $client);
        $this->assertTrue($client->isMemberOf($this->shipper));

        $this->assertEquals($validRequestData['first_name'], $client->first_name);
        $this->assertEquals($validRequestData['last_name'], $client->last_name);
        $this->assertEquals($validRequestData['email'], $client->email);
        $this->assertEquals($validRequestData['phone'], $client->phone);
        $this->assertTrue(Hash::check($validRequestData['password'], $client->password));
        $this->assertEquals(User::STATUS_INACTIVE, $client->status);
        $this->assertEquals(User::ROLE_CLIENT, $client->role);
        $this->assertEquals(boolval($validRequestData['ask_password_change_next_login']), $client->ask_password_change_next_login);

        $this->assertEquals($quoteShipper->type, $client->clientMeta->type);
        $this->assertEquals($quoteShipper->company, $client->clientMeta->company);
        $this->assertEquals($quoteShipper->address_1, $client->clientMeta->address_1);
        $this->assertEquals($quoteShipper->address_2, $client->clientMeta->address_2);
        $this->assertEquals($quoteShipper->zip, $client->clientMeta->zip);
        $this->assertEquals($quoteShipper->city, $client->clientMeta->city);
        $this->assertEquals($quoteShipper->state, $client->clientMeta->state);
        $this->assertEquals($quoteShipper->phone_2, $client->clientMeta->phone_2);

        $this->assertEquals($quoteShipper->mobile, $client->clientMeta->mobile);
        $this->assertEquals($quoteShipper->fax, $client->clientMeta->fax);
        $this->assertEquals($quoteShipper->notes_from_shipper, $client->clientMeta->notes_from_shipper);
    }
}
