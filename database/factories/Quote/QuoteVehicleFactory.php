<?php

namespace Database\Factories\Quote;

use App\Models\Quote;
use App\Models\Quote\QuoteVehicle;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class QuoteVehicleFactory extends Factory
{
    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->faker->addProvider(new Fakecar($this->faker));
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuoteVehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vehicle = $this->faker->vehicleArray;

        return [
            'quote_id' => Quote::factory(),
            'year' => $this->faker->year,
            'make' => $vehicle['brand'],
            'model' => $vehicle['model'],
            'vin' => $this->faker->vin,
            'is_running' => $this->faker->randomElement([true, false]),
            'size' => $this->faker->randomElement(array_keys(QuoteVehicle::VEHICLE_SIZE_MAP))
        ];
    }
}
