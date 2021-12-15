<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactGroup;
use App\Models\Shipper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => \Illuminate\Support\Str::uuid(),
            'shipper_id' => Shipper::factory(),
            'contact_group_id' => ContactGroup::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phone' => $this->faker->e164PhoneNumber,
            'is_primary' => false
        ];
    }
}
