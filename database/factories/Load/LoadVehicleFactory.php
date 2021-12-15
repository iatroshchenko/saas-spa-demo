<?php

namespace Database\Factories\Load;

use App\Models\Load;
use App\Models\Load\LoadVehicle;
use App\Models\Quote\QuoteVehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Faker\Provider\Fakecar;

class LoadVehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LoadVehicle::class;

    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->faker->addProvider(new Fakecar($this->faker));
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vehicle = $this->faker->vehicleArray;

        return [
            'load_id' => Load::factory(),
            'year' => $this->faker->biasedNumberBetween(1998, 2017, 'sqrt'),
            'make' => $vehicle['brand'],
            'model' => $vehicle['model'],
            'vin' => $this->faker->vin,
            'is_running' => $this->faker->randomElement([true, false]),
            'size' => $this->faker->randomElement(array_keys(QuoteVehicle::VEHICLE_SIZE_MAP)),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'state' => $this->faker->randomElement(['After Car Accident', 'New', 'Used', 'Almost like New']),
            'color' => $this->faker->colorName,
            'plate_number' => $this->faker->vehicleRegistration,
            'lot_number' => $this->faker->vehicleRegistration,
            'p_o_number' => $this->faker->vehicleRegistration,
            'notes' => $this->faker->sentence(6)
        ];
    }
}
