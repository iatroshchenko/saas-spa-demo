<?php

namespace Database\Factories;

use App\Models\Quote;
use App\Models\Shipper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shipper_id' => Shipper::factory(),
            'client_id' => User::factory()
        ];
    }
}
