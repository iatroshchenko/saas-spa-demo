<?php

namespace Tests\Feature\Register;

use App\Service\ShipperManagementService;
use Faker\Provider\en_US\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Http\Requests\Register\BusinessRegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shipper;

class BusinessRegisterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->faker->addProvider(new Address($this->faker));
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccess()
    {
        // create business user
        $data = [
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->address,
            'business_name' => 'ExampleSaasApp',
            'phone' => substr($this->faker->e164PhoneNumber, 2, 10),
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => substr($this->faker->postcode, 0, 5)
        ];

        $request = new BusinessRegisterRequest($data);
        $validator = Validator::make($request->all(), $request->rules());

        try {
            if ($validator->validate()) {
                $data = $validator->validated();
            }
        } catch (ValidationException $exception) {
            dump($exception->errors()); dd(self::class);
        }

        $businessService = app()->make(ShipperManagementService::class);
        $user = $businessService->registerNewBusinessFromRequest($request);
        $newUser = User::find($user->id);

        $this->assertNotNull($newUser);
        $this->assertInstanceOf(User::class, $newUser);
        $this->assertEquals($user->id, $newUser->id);

        // assert that first shipper is being created for new user
        $newShipper = Shipper::where('owner_id', $newUser->id)->first();

        $this->assertNotNull($newShipper); // assert shipper created for user
        $this->assertInstanceOf(Shipper::class, $newShipper);
        $this->assertEquals($data['business_name'], $newShipper->name);

        // assert user owns shipper
        $this->assertTrue($newUser->owns($newShipper));
        $this->assertEquals($newUser->id, $newShipper->owner->id);
        $this->assertTrue($newUser->controlledShippers->count() === 1);

        // assert that user has been created correctly
        $this->assertEquals($data['email'], $newUser->email);
        $this->assertEquals($data['first_name'], $newUser->first_name);
        $this->assertEquals($data['last_name'], $newUser->last_name);
        $this->assertEquals($data['phone'], $newUser->phone);
        $this->assertEquals(User::ROLE_BUSINESS, $newUser->role);
        $this->assertEquals(User::STATUS_ACTIVE, $newUser->status);

        $this->assertEquals($data['business_name'], $newShipper->name);

        $this->assertEquals($data['address'], $newUser->ownerMeta->address);
        $this->assertEquals($data['city'], $newUser->ownerMeta->city);
        $this->assertEquals($data['state'], $newUser->ownerMeta->state);
        $this->assertEquals($data['zip'], $newUser->ownerMeta->zip);

        $this->assertEquals(Shipper::DEFAULT_PRICE_PER_MILE, $newShipper->price_per_mile);
    }
}
