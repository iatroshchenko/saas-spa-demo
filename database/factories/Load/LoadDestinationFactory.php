<?php

namespace Database\Factories\Load;

use App\Models\Load;
use App\Models\Load\LoadDestination;
use App\Models\Quote;
use App\Models\Quote\QuoteShipper;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoadDestinationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LoadDestination::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'load_id' => Load::factory(),
            'name' => $this->faker->word(),
            'company' => $this->faker->company,
            'type' => $this->faker->randomElement(array_keys(QuoteShipper::TYPES_MAP)),
            'address_1' => $this->faker->address,
            'address_2' => $this->faker->address,
            'zip' => substr($this->faker->postcode, 0, 5),
            'state' => $this->faker->stateAbbr,
            'city' => $this->faker->city,
            'phone' => substr($this->faker->e164PhoneNumber, 2, 10),
            'phone_2' => substr($this->faker->e164PhoneNumber, 2, 10),
            'mobile' => substr($this->faker->e164PhoneNumber, 2, 10),
            'email' => $this->faker->email
        ];
    }
}
