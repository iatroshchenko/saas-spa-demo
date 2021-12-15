<?php

namespace Database\Factories;

use App\Models\Load;
use App\Models\Shipper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Load::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $loadNumberOptions = [
            null,
            $this->faker->biasedNumberBetween(2, 250000),
            $this->faker->sentence(3)
        ];

        return [
            'shipper_id' => Shipper::factory(),
            'client_id' => User::factory(),
            'custom_load_number' => $this->faker->randomElement($loadNumberOptions)
        ];
    }
}
