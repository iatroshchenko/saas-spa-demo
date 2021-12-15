<?php

namespace Database\Factories\Quote;

use App\Models\Quote;
use App\Models\Quote\QuoteTransport;
use Carbon\Carbon;
use Database\Factories\QuoteFactory;
use Faker\Provider\Biased;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class QuoteTransportFactory extends Factory
{
    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->faker->addProvider(new Biased($this->faker));
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuoteTransport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quote_id' => Quote::factory(),
            'carrier_type' => $this->faker->randomElement(array_keys(QuoteTransport::CARRIER_TYPES_MAP)),
            'available_date' => Carbon::now()->addDays($this->faker->biasedNumberBetween(1,5)),
            'delivery_date' => Carbon::now()->addDays($this->faker->biasedNumberBetween(5,10)),
            'delivery_accuracy' => $this->faker->randomElement(array_keys(QuoteTransport::DELIVERY_ACCURACY_MAP)),
            'price' => $this->faker->biasedNumberBetween(10000,100000),
            'deposit' => $this->faker->biasedNumberBetween(10000,100000),
            'distance' => $this->faker->randomFloat(4, 500, 5500)
        ];
    }
}
