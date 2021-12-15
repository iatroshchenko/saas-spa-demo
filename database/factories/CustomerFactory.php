<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Shipper;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'uuid' => Str::uuid(),
            'shipper_id' => Shipper::factory(),
            'phone' => $this->faker->e164PhoneNumber,
            'fax' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'company' => $this->faker->company
        ];
    }
}
