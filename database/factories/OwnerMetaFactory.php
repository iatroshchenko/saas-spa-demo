<?php

namespace Database\Factories;

use App\Models\OwnerMeta;
use Faker\Provider\en_US\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Collection;

class OwnerMetaFactory extends Factory
{
    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->faker->addProvider(new Address($this->faker));
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OwnerMeta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_id' => User::factory()->state(['role' => User::ROLE_BUSINESS]),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => substr($this->faker->postcode, 0, 5)
        ];
    }
}

