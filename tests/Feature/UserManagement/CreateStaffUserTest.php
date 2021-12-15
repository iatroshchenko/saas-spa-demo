<?php

namespace Tests\Feature\UserManagement;

use App\Http\Requests\UserManagement\CreateStaffUserRequest;
use App\Service\UserManagementService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

use App\Models\{User, Shipper};

class CreateStaffUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected User $user;
    protected Shipper $shipper;
    protected UserManagementService $userManagement;

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
        $this->user = $user;
        $this->userManagement = app()->make(UserManagementService::class);
    }

    public function businessSuccessfullyRegistersStaffUserDataProvider(): array
    {
        return [
            [User::ROLE_ADMIN, "0"],
            [User::ROLE_ADMIN, "1"],
            [User::ROLE_MANAGER, "0"],
            [User::ROLE_MANAGER, "1"],
            [User::ROLE_DRIVER, "0"],
            [User::ROLE_DRIVER, "1"],
            [User::ROLE_DISPATCHER, "0"],
            [User::ROLE_DISPATCHER, "1"]
        ];
    }

    /**
     * @dataProvider businessSuccessfullyRegistersStaffUserDataProvider
     * @param $userRole
     * @param $askChangeNext
     */
    public function testBusinessSuccessfullyRegistersStaffUser($userRole, $askChangeNext)
    {
        $validRequestData = [
            'shipper_id' => $this->user->controlledShippers->first()->getPublicKey(),
            'role' => $userRole,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => substr($this->faker->e164PhoneNumber, 2,10),
            'email' => $this->faker->email,
            'password' => $this->faker->password(8, 20),
            'ask_password_change_next_login' => $askChangeNext
        ];

        $request = new CreateStaffUserRequest($validRequestData);
        $validator = Validator::make($request->all(), $request->rules());

        try {
            if ($validator->validate()) {
                $data = $validator->validated();
            }
        } catch (ValidationException $exception) {
            dump($exception->errors());
            dd(self::class);
        }

        $user = $this
            ->userManagement
            ->createStaffUserFromRequest($request);

        $this->assertInstanceOf(User::class, $user);
        $this->assertTrue($user->isMemberOf($this->shipper));

        $this->assertEquals($validRequestData['first_name'], $user->first_name);
        $this->assertEquals($validRequestData['last_name'], $user->last_name);
        $this->assertEquals($validRequestData['email'], $user->email);
        $this->assertEquals($validRequestData['role'], $user->role);
        $this->assertEquals($validRequestData['phone'], $user->phone);
        $this->assertTrue(Hash::check($validRequestData['password'], $user->password));
        $this->assertEquals(User::STATUS_INACTIVE, $user->status);
        $this->assertEquals(boolval($validRequestData['ask_password_change_next_login']), $user->ask_password_change_next_login);
    }
}
