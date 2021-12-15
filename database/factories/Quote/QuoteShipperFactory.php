<?php

namespace Database\Factories\Quote;

use App\Models\Quote;
use App\Models\Quote\QuoteShipper;
use Database\Factories\QuoteFactory;
use Faker\Provider\en_HK\PhoneNumber;
use Faker\Provider\en_US\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class QuoteShipperFactory extends Factory
{
    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->faker->addProvider(new PhoneNumber($this->faker));
        $this->faker->addProvider(new Address($this->faker));
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuoteShipper::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quote_id' => Quote::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => substr($this->faker->e164PhoneNumber, 2, 10),
            'email' => $this->faker->email,
            'type' => $this->faker->randomElement(array_keys(QuoteShipper::TYPES_MAP)),
            'company' => $this->faker->company,
            'address_1' => $this->faker->address,
            'address_2' => $this->faker->address,
            'zip' => substr($this->faker->postcode, 0, 5),
            'city' => $this->faker->city,
            'state' => $this->faker->stateAbbr,
            'phone_2' => substr($this->faker->e164PhoneNumber, 2, 10),
            'mobile' => substr($this->faker->e164PhoneNumber, 2, 10),
            'fax' => $this->faker->faxNumber,
            'notes_from_shipper' => $this->faker->sentence(6)
        ];
    }
}
