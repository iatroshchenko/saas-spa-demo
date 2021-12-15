<?php

namespace Database\Seeders;

use App\Models\ClientMeta;
use App\Models\Contact;
use App\Models\ContactGroup;
use App\Models\Load;
use App\Models\OwnerMeta;
use App\Models\Quote;
use App\Models\Shipper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Faker\Factory;
use Faker\Generator as FakerGenerator;

class DatabaseSeeder extends Seeder
{
    private FakerGenerator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $emails = [
            'admin1@admin.com',
            'admin2@admin.com',
            'admin3@admin.com'
        ];

        foreach ($emails as $email) {

            $users = User::factory()
                ->count(10)
                ->create();

            $clients = User::factory()
                ->count(5)
                ->state([
                    'role' => User::ROLE_CLIENT,
                    'password' => null
                ])
                ->has(ClientMeta::factory())
                ->create();
            $clientIDs = $clients->pluck('id')->toArray();

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
                        ->state([
                            'client_id' => $this->faker->randomElement($clientIDs)
                        ])
                        ->count(20)
                        ->has(Quote\QuoteShipper::factory())
                        ->has(Quote\QuoteVehicle::factory())
                        ->has(Quote\QuoteDestination::factory())
                        ->has(Quote\QuoteOrigin::factory())
                        ->has(Quote\QuoteTransport::factory()),
                    'quotes'
                )
                ->has(
                    Load::factory()
                        ->state([
                            'client_id' => $this->faker->randomElement($clientIDs)
                        ])
                        ->count(10)
                        ->has(Load\LoadShipper::factory())
                        ->has(Load\LoadVehicle::factory()->count(10))
                        ->has(Load\LoadOrigin::factory())
                        ->has(Load\LoadDestination::factory())
                        ->has(Load\LoadTransport::factory()),
                    'loads'
                )
                ->has(
                    ContactGroup::factory()
                        ->count(10)
                        ->has(
                            Contact::factory()
                                ->state(function (array $attributes, ContactGroup $contactGroup) {
                                    return [
                                        'shipper_id' => $contactGroup->shipper->id
                                    ];
                                })
                                ->count(10)
                        ),
                    'contactGroups'
                )
                ->has(
                    Contact::factory()
                        ->state([
                            'contact_group_id' => null
                        ])
                        ->count(5)
                )
                ->create();

            /* Setup Primary Contact */
            foreach($shipper->contactGroups as $contactGroup)
            {
                $contact = $contactGroup->contacts->first();
                $contact->update(['is_primary' => true]);
            }

            foreach ($shipper->quotes as $quote) {
                $quote->update([
                    'client_id' => $this->faker->randomElement($clientIDs)
                ]);
            }

            foreach ($shipper->loads as $load) {
                $load->update([
                    'client_id' => $this->faker->randomElement($clientIDs)
                ]);
            }

            $ownerMeta = OwnerMeta::factory()
                ->state([
                    'owner_id' => $businessUser->id
                ])
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

            foreach ($clients as $client) {
                $client->shippers()->attach($shipper);
            }
        }

        $superadmins = [
            'admin@admin.com'
        ];

        foreach ($superadmins as $email) {
            User::factory()->state([
                'role' => User::ROLE_SUPERADMIN,
                'email' => $email,
                'password' => Hash::make('password')
            ])->create();
        }

        // Additional seeders
        $this->call(UserTokensSeeder::class);
    }
}
