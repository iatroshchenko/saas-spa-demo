<?php

namespace Database\Factories\Quote;

use App\Models\Quote;
use App\Models\Quote\QuoteDestination;
use Faker\Provider\en_US\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class QuoteDestinationFactory extends Factory
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
    protected $model = QuoteDestination::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quote_id' => Quote::factory(),
            'zip' => substr($this->faker->postcode, 0, 5),
            'state' => $this->faker->stateAbbr,
            'city' => $this->faker->city
        ];
    }
}
