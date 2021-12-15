<?php

namespace Tests\Feature\General;

use App\Models\OwnerMeta;
use App\Models\Quote;
use App\Models\Shipper;
use App\Models\User;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PermissionsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private User $superAdmin;
    private User $businessAdmin;
    private User $admin;
    private User $manager;
    private User $client;
    private User $dispatcher;
    private User $driver;
    private Shipper $shipper;

    private Shipper $anotherShipper;
    private User $anotherBusinessAdmin;
    private User $anotherAdmin;
    private User $anotherManager;

    private ShipperRepository $shippers;
    private UserRepository $users;


    public function createFirstShipperWithUsers()
    {
        $emails = [ $businessAdminEmail = 'business.admin@business.com'];

        $shipper = null;
        foreach ($emails as $email) {
            $shipper = Shipper::factory()
                ->state([
                    'owner_id' => $businessUser = User::factory()->state([
                        'role' => User::ROLE_BUSINESS,
                        'email' => $email,
                        'password' => Hash::make('password')
                    ])->create()
                ])
                ->has(
                    Quote::factory()
                        ->count(10)
                        ->has(Quote\QuoteShipper::factory())
                        ->has(Quote\QuoteVehicle::factory()->count('10'))
                        ->has(Quote\QuoteDestination::factory())
                        ->has(Quote\QuoteOrigin::factory())
                        ->has(Quote\QuoteTransport::factory()),
                    'quotes'
                )
                ->create();

            $ownerMeta = OwnerMeta::factory()
                ->state([
                    'owner_id' => $businessUser->id
                ])
                ->create();

            $users = User::factory()
                ->count(20)
                ->create();

            foreach ($users as $user)
            {
                $user->update([
                    'role' => $this
                        ->faker
                        ->randomElement([
                            User::ROLE_ADMIN,
                            User::ROLE_MANAGER,
                            User::ROLE_DRIVER,
                            User::ROLE_DISPATCHER
                        ])
                ]);

                $user
                    ->shippers()
                    ->attach($shipper);
            }
        }

        $this->businessAdmin = $this->users->findByEmail($businessAdminEmail);

        $this->shipper = $shipper;

        $this->admin = $shipper->users()
            ->where('role', User::ROLE_ADMIN)->first();

        $this->manager = $shipper->users()
            ->where('role', User::ROLE_MANAGER)->first();

        $this->dispatcher = $shipper->users()
            ->where('role', User::ROLE_DISPATCHER)->first();

        $this->driver = $shipper->users()
            ->where('role', User::ROLE_DRIVER)->first();
    }

    public function createAnotherShipperWithUsers()
    {
        $emails = [ $businessAdminEmail = 'business.admin2@business.com'];

        $shipper = null;
        foreach ($emails as $email) {
            $shipper = Shipper::factory()
                ->state([
                    'owner_id' => $businessUser = User::factory()->state([
                        'role' => User::ROLE_BUSINESS,
                        'email' => $email,
                        'password' => Hash::make('password')
                    ])->create()
                ])
                ->has(
                    Quote::factory()
                        ->count(10)
                        ->has(Quote\QuoteShipper::factory())
                        ->has(Quote\QuoteVehicle::factory()->count('10'))
                        ->has(Quote\QuoteDestination::factory())
                        ->has(Quote\QuoteOrigin::factory())
                        ->has(Quote\QuoteTransport::factory()),
                    'quotes'
                )
                ->create();

            $ownerMeta = OwnerMeta::factory()
                ->state([
                    'owner_id' => $businessUser->id
                ])
                ->create();

            $users = User::factory()
                ->count(20)
                ->create();

            foreach ($users as $user)
            {
                $user->update([
                    'role' => $this
                        ->faker
                        ->randomElement([
                            User::ROLE_ADMIN,
                            User::ROLE_MANAGER,
                            User::ROLE_DRIVER,
                            User::ROLE_DISPATCHER
                        ])
                ]);

                $user
                    ->shippers()
                    ->attach($shipper);
            }
        }

        $this->anotherBusinessAdmin = $this->users->findByEmail($businessAdminEmail);
        $this->anotherShipper = $shipper;

        $this->anotherAdmin = $shipper->users()
            ->where('role', User::ROLE_ADMIN)->first();

        $this->anotherManager = $shipper->users()
            ->where('role', User::ROLE_MANAGER)->first();
    }


    public function setUp(): void
    {
        parent::setUp();

        $this->shippers = app()->make(ShipperRepository::class);
        $this->users = app()->make(UserRepository::class);

        $this->createFirstShipperWithUsers();
        $this->createAnotherShipperWithUsers();

        $supeadmins = [
            $supeadminEmail = 'admin@admin.com'
        ];

        foreach ($supeadmins as $email) {
            User::factory()->state([
                'role' => User::ROLE_SUPERADMIN,
                'email' => $email,
                'password' => Hash::make('password')
            ])->create();
        }

        $this->superAdmin = $this->users->findByEmail($supeadminEmail);
    }

    /*
     * For clear concerns -
     *  validation -> only validates input data (protection against fools)
     *  authorization -> validates on allowed (protection against smart (hackers))
     *
     * */


    /*
     * Вопросы на митинг
     * 1. client management
     *  какие атрибуты есть у клиента ?
     *  у него есть зип / ориджин / всякая такого рода херня
     *
     *  я имею в виду если мы создаем клиента в shipper info
     *  а там есть зип state и т д
     *  то почему бы нам не создавать клиента и через create client вместе с zip state и т д
     *
     *
     * +
     * + убрать роль из таблицы клиентов
     *
     * 2.
     * Если у клиента поменялась почта - то что мы делаем ?
     * менеджер должен иметь возможность поменять ему почту без подтверждения
     * основную почту клиента трогать не надо ?
     *
     * 3.
     * Что мы выбираем во вкладе shipper info ? (Create Quote form)
     * В выборе клиента для квоты - мы выбираем
     *  либо создать нового клиента - либо take existing
     *
     * 4. Если клиент сам создает квоту - то он откуда вбивает информацию (shipper info) ?
     * подтягивается его информация
     *
     *
     * */



    /*
     * Permissions
So first of all we make our permissions

create client for shipper ->
    if we are Superadmin -> yes

   we can do it if we are
    [Business, Admin, Manager]

update client ->
    if we are Superadmin -> yes
   if not ->
        only client for this shipper
        only manager, admin, business owner

calculate quote price

    for quote of same shipper
    only client, manager, admin, business_owner

email quote

    for quote of same shipper
    only client, manager, admin, business_owner

create quote

get quote info  -> get quote

    client -> only quotes attached to client (quote has nullable client_id)
    if (!$user->isClient()) {
            for quote of same shipper
            only manager, admin, business_owner
    }

update quote

    client -> only quotes attached to client (quote has nullable client_id)
    if (!$user->isClient()) {
            for quote of same shipper
            only manager, admin, business_owner
    }



update quote
delete quote

set settings

user -> change email request
// everyone (because is temporary signed route)

password change request
// every one who auth

user -> requestEmailChange
// rename to RequestChangeUserEmailRequest (change email for subordinate user)
and move to user management requests
// only manager and higher -> applied to subordinates !!

// send credentials -> for subordinates same shipper

     *
     *
     *
     * */

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateUsersForShipper()
    {
        $ability = 'create-users-for-shipper';

        // SuperAdmin
        $this->assertTrue($this->superAdmin->can($ability, $this->shipper));
        $this->assertTrue($this->superAdmin->can($ability, $this->anotherShipper));

        // This Business Admin
        $this->assertTrue($this->businessAdmin->can($ability, $this->shipper));
        $this->assertFalse($this->businessAdmin->can($ability, $this->anotherShipper));

        // Another Business Admin
        $this->assertTrue($this->anotherBusinessAdmin->can($ability, $this->anotherShipper));
        $this->assertFalse($this->anotherBusinessAdmin->can($ability, $this->shipper));

        // This admin
        $this->assertTrue($this->admin->can($ability, $this->shipper));
        $this->assertFalse($this->admin->can($ability, $this->anotherShipper));

        // Another admin
        $this->assertTrue($this->anotherAdmin->can($ability, $this->anotherShipper));
        $this->assertFalse($this->anotherAdmin->can($ability, $this->shipper));

        // Manager
        $this->assertTrue($this->manager->can($ability, $this->shipper));
        $this->assertFalse($this->manager->can($ability, $this->anotherShipper));

        // Another Manager
        $this->assertTrue($this->anotherManager->can($ability, $this->anotherShipper));
        $this->assertFalse($this->anotherManager->can($ability, $this->shipper));

        $this->assertFalse($this->dispatcher->can($ability, $this->shipper));
        $this->assertFalse($this->driver->can($ability, $this->shipper));
    }

    public function testUpdateUser()
    {
        $ability = 'update-user';

        // SuperAdmin
        $this->assertTrue($this->superAdmin->can($ability, $this->businessAdmin));
        $this->assertTrue($this->superAdmin->can($ability, $this->anotherBusinessAdmin));
        $this->assertTrue($this->superAdmin->can($ability, $this->admin));
        $this->assertTrue($this->superAdmin->can($ability, $this->anotherAdmin));
        $this->assertTrue($this->superAdmin->can($ability, $this->manager));
        $this->assertTrue($this->superAdmin->can($ability, $this->anotherManager));

        // Business Admin
        $this->assertTrue($this->businessAdmin->can($ability, $this->admin));
        $this->assertTrue($this->businessAdmin->can($ability, $this->manager));
        $this->assertTrue($this->businessAdmin->can($ability, $this->dispatcher));
        $this->assertTrue($this->businessAdmin->can($ability, $this->driver));

        $this->assertFalse($this->businessAdmin->can($ability, $this->businessAdmin));
        $this->assertFalse($this->businessAdmin->can($ability, $this->anotherAdmin));
        $this->assertFalse($this->businessAdmin->can($ability, $this->anotherManager));
    }

    public function testDeleteUser()
    {
        $ability = 'delete-user';

        // SuperAdmin
        $this->assertTrue($this->superAdmin->can($ability, $this->businessAdmin));
        $this->assertTrue($this->superAdmin->can($ability, $this->anotherBusinessAdmin));
        $this->assertTrue($this->superAdmin->can($ability, $this->admin));
        $this->assertTrue($this->superAdmin->can($ability, $this->anotherAdmin));
        $this->assertTrue($this->superAdmin->can($ability, $this->manager));
        $this->assertTrue($this->superAdmin->can($ability, $this->anotherManager));

        // Business Admin
        $this->assertTrue($this->businessAdmin->can($ability, $this->admin));
        $this->assertTrue($this->businessAdmin->can($ability, $this->manager));
        $this->assertTrue($this->businessAdmin->can($ability, $this->dispatcher));
        $this->assertTrue($this->businessAdmin->can($ability, $this->driver));

        $this->assertFalse($this->businessAdmin->can($ability, $this->businessAdmin));
        $this->assertFalse($this->businessAdmin->can($ability, $this->anotherAdmin));
        $this->assertFalse($this->businessAdmin->can($ability, $this->anotherManager));
    }

    public function testCreateClientsForShipper()
    {
        $ability = 'create-clients-for-shipper';

        // SuperAdmin
        $this->assertTrue($this->superAdmin->can($ability, $this->shipper));
        $this->assertTrue($this->superAdmin->can($ability, $this->anotherShipper));

        // This Business Admin
        $this->assertTrue($this->businessAdmin->can($ability, $this->shipper));
        $this->assertFalse($this->businessAdmin->can($ability, $this->anotherShipper));

        // Another Business Admin
        $this->assertTrue($this->anotherBusinessAdmin->can($ability, $this->anotherShipper));
        $this->assertFalse($this->anotherBusinessAdmin->can($ability, $this->shipper));

        // This admin
        $this->assertTrue($this->admin->can($ability, $this->shipper));
        $this->assertFalse($this->admin->can($ability, $this->anotherShipper));

        // Another admin
        $this->assertTrue($this->anotherAdmin->can($ability, $this->anotherShipper));
        $this->assertFalse($this->anotherAdmin->can($ability, $this->shipper));

        // Manager
        $this->assertTrue($this->manager->can($ability, $this->shipper));
        $this->assertFalse($this->manager->can($ability, $this->anotherShipper));

        // Another Manager
        $this->assertTrue($this->anotherManager->can($ability, $this->anotherShipper));
        $this->assertFalse($this->anotherManager->can($ability, $this->shipper));

        $this->assertFalse($this->dispatcher->can($ability, $this->shipper));
        $this->assertFalse($this->driver->can($ability, $this->shipper));
    }

//    public function testGetClients()
//    {
//
//    }
//
//    public function testCreateQuotesForShipper()
//    {
//
//    }
//
//    public function testGetQuote()
//    {
//
//    }
//
//    public function testDeleteQuote()
//    {
//
//    }



}
