<?php

namespace Database\Factories;

use App\Models\Shipper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipperFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipper::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'owner_id' => User::factory(),
            'price_per_mile' => Shipper::DEFAULT_PRICE_PER_MILE
        ];
    }
}
