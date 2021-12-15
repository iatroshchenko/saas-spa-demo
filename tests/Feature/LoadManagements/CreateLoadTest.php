<?php

namespace Tests\Feature\LoadManagements;

use App\Http\Requests\Load\CreateLoadRequest;
use App\Models\Load;
use App\Models\Shipper;
use App\Models\User;
use App\Repository\LoadRepository;
use App\Repository\UserRepository;
use App\Service\LoadManagementService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class CreateLoadTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /* Services */
    private LoadManagementService $loadManagement;

    /* Repositories */
    private LoadRepository $loads;
    private UserRepository $users;

    /* Entities */
    private Shipper $shipper;

    private Load\LoadShipper $loadShipper;
    private Load\LoadOrigin $loadOrigin;
    private Load\LoadDestination $loadDestination;
    private Collection $loadVehicles;
    private Load\LoadTransport $loadTransport;

    private ?string $customLoadNumber;
    private string $referrer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadManagement = app(LoadManagementService::class);
        $this->loads = app(LoadRepository::class);
        $this->users = app(UserRepository::class);
        $this->shipper = $shipper = Shipper::factory()->create();

        $this->loadShipper = Load\LoadShipper::factory()->make();
        $this->loadOrigin = Load\LoadOrigin::factory()->make();
        $this->loadDestination = Load\LoadDestination::factory()->make();

        $this->loadVehicles = Load\LoadVehicle::factory()
            ->count(4)
            ->make();

        $this->loadTransport = Load\LoadTransport::factory()->make();

        $loadNumberOptions = [
            null,
            $this->faker->biasedNumberBetween(2, 250000),
            $this->faker->sentence(3)
        ];

        $this->customLoadNumber = $this
            ->faker
            ->randomElement($loadNumberOptions);

        $this->referrer = $this->faker->sentence(2);
    }

    public function testCreateOrderForNewClient()
    {
        $validRequestData = [
            // load
            'shipper_id' => $this->shipper->getPublicKey(),
            'custom_load_number' => $this->customLoadNumber,
            'referrer' => $this->referrer,
            // 'client_id' => null,

            // load shipper
            'first_name' => $this->loadShipper->first_name,
            'last_name' => $this->loadShipper->last_name,
            'phone' => $this->loadShipper->phone,
            'email' => $this->loadShipper->email,
            'type' => $this->loadShipper->type,
            'company' => $this->loadShipper->company,
            'description' => $this->loadShipper->description,
            'address_1' => $this->loadShipper->address_1,
            'address_2' => $this->loadShipper->address_2,
            'zip' => $this->loadShipper->zip,
            'city'=> $this->loadShipper->city,
            'state' => $this->loadShipper->state,
            'phone_2'=> $this->loadShipper->phone_2,
            'mobile' => $this->loadShipper->mobile,
            'fax' => $this->loadShipper->fax,
            'notes_from_shipper' => $this->loadShipper->notes_from_shipper,

            // load origin
            'load_origin_name' => $this->loadOrigin->name,
            'load_origin_company'=> $this->loadOrigin->company,
            'load_origin_type' => $this->loadOrigin->type,
            'load_origin_address_1' => $this->loadOrigin->address_1,
            'load_origin_address_2' => $this->loadOrigin->address_2,
            'load_origin_city' => $this->loadOrigin->city,
            'load_origin_state' => $this->loadOrigin->state,
            'load_origin_zip' => $this->loadOrigin->zip,
            'load_origin_phone' => $this->loadOrigin->phone,
            'load_origin_phone_2' => $this->loadOrigin->phone_2,
            'load_origin_mobile' => $this->loadOrigin->mobile,
            'load_origin_email' => $this->loadOrigin->email,

            // load destination
            'load_destination_name' => $this->loadDestination->name,
            'load_destination_company'=> $this->loadDestination->company,
            'load_destination_type' => $this->loadDestination->type,
            'load_destination_address_1' => $this->loadDestination->address_1,
            'load_destination_address_2' => $this->loadDestination->address_2,
            'load_destination_city' => $this->loadDestination->city,
            'load_destination_state' => $this->loadDestination->state,
            'load_destination_zip' => $this->loadDestination->zip,
            'load_destination_phone' => $this->loadDestination->phone,
            'load_destination_phone_2' => $this->loadDestination->phone_2,
            'load_destination_mobile' => $this->loadDestination->mobile,
            'load_destination_email' => $this->loadDestination->email,

            // load vehicles
            'load_vehicles' => [
                [
                    'year' => $this->loadVehicles->first()->year,
                    'make' => $this->loadVehicles->first()->make,
                    'model' => $this->loadVehicles->first()->model,
                    'is_running' => $this->loadVehicles->first()->is_running,
                    'size' => $this->loadVehicles->first()->size,
                    'vin' => $this->loadVehicles->first()->vin,
                    'color' => $this->loadVehicles->first()->color,
                    'plate_number' => $this->loadVehicles->first()->plate_number,
                    'lot_number' => $this->loadVehicles->first()->lot_number,
                    'p_o_number' => $this->loadVehicles->first()->p_o_number,
                    'notes' => $this->loadVehicles->first()->notes,
                    'state' => $this->loadVehicles->first()->state,
                    'price' => $this->loadVehicles->get(0)->price
                ],
                [
                    'year' => $this->loadVehicles->get(1)->year,
                    'make' => $this->loadVehicles->get(1)->make,
                    'model' => $this->loadVehicles->get(1)->model,
                    'is_running' => $this->loadVehicles->get(1)->is_running,
                    'size' => $this->loadVehicles->get(1)->size,
                    'vin' => $this->loadVehicles->get(1)->vin,
                    'color' => $this->loadVehicles->get(1)->color,
                    'plate_number' => $this->loadVehicles->get(1)->plate_number,
                    'lot_number' => $this->loadVehicles->get(1)->lot_number,
                    'p_o_number' => $this->loadVehicles->get(1)->p_o_number,
                    'notes' => $this->loadVehicles->get(1)->notes,
                    'state' => $this->loadVehicles->get(1)->state,
                    'price' => $this->loadVehicles->get(1)->price
                ],
                [
                    'year' => $this->loadVehicles->get(2)->year,
                    'make' => $this->loadVehicles->get(2)->make,
                    'model' => $this->loadVehicles->get(2)->model,
                    'is_running' => $this->loadVehicles->get(2)->is_running,
                    'size' => $this->loadVehicles->get(2)->size,
                    'vin' => $this->loadVehicles->get(2)->vin,
                    'color' => $this->loadVehicles->get(2)->color,
                    'plate_number' => $this->loadVehicles->get(2)->plate_number,
                    'lot_number' => $this->loadVehicles->get(2)->lot_number,
                    'p_o_number' => $this->loadVehicles->get(2)->p_o_number,
                    'notes' => $this->loadVehicles->get(2)->notes,
                    'state' => $this->loadVehicles->get(2)->state,
                    'price' => $this->loadVehicles->get(2)->price
                ],
                [
                    'year' => $this->loadVehicles->get(3)->year,
                    'make' => $this->loadVehicles->get(3)->make,
                    'model' => $this->loadVehicles->get(3)->model,
                    'is_running' => $this->loadVehicles->get(3)->is_running,
                    'size' => $this->loadVehicles->get(3)->size,
                    'vin' => $this->loadVehicles->get(3)->vin,
                    'color' => $this->loadVehicles->get(3)->color,
                    'plate_number' => $this->loadVehicles->get(3)->plate_number,
                    'lot_number' => $this->loadVehicles->get(3)->lot_number,
                    'p_o_number' => $this->loadVehicles->get(3)->p_o_number,
                    'notes' => $this->loadVehicles->get(3)->notes,
                    'state' => $this->loadVehicles->get(3)->state,
                    'price' => $this->loadVehicles->get(3)->price
                ]
            ],

            // load transport
            'carrier_type' => $this->loadTransport->carrier_type,
            'available_date' => $this->loadTransport->available_date->format('Y/m/d'),
            'available_accuracy' => $this->loadTransport->available_accuracy,
            'delivery_date' => $this->loadTransport->delivery_date->format('Y/m/d'),
            'delivery_accuracy' => $this->loadTransport->delivery_accuracy,
            'distance' => $this->loadTransport->distance,
            'price' => $this->loadTransport->price,
            'deposit' => $this->loadTransport->deposit,
            'customer_pay_terms' => $this->loadTransport->customer_pay_terms,
            'carrier_pay_terms' => $this->loadTransport->carrier_pay_terms,
            'carrier_pay' => $this->loadTransport->carrier_pay
        ];

        $request = new CreateLoadRequest($validRequestData);
        $validator = Validator::make($request->all(), $request->rules());

        try {
            if ($validator->validate()) {
                $data = $validator->validated();
            }
        } catch (ValidationException $exception) {
            dump($exception->errors()); dd(self::class);
        }

        $newLoad = $this
            ->loadManagement
            ->createLoadFromRequest($request);

        $this->assertInstanceOf(Load::class, $newLoad);
        $this->assertInstanceOf(Load::class, $this->loads->findById($newLoad->id));

        // shipper
        $this->assertEquals($this->shipper->id, $newLoad->shipper->id);

        // client
        $newClient = $this->users->findByEmail($validRequestData['email']);

        $this->assertInstanceOf(User::class, $newClient);
        $this->assertEquals(User::ROLE_CLIENT, $newClient->role);

        // load
        $this->assertEquals($this->customLoadNumber, $newLoad->custom_load_number);
        $this->assertEquals($this->referrer, $newLoad->referrer);
        $this->assertEquals(Load::STATUS_NEW_LOAD, $newLoad->status);

        // load shipper
        $this->assertEquals($this->loadShipper->first_name, $newLoad->loadShipper->first_name);
        $this->assertEquals($this->loadShipper->last_name, $newLoad->loadShipper->last_name);
        $this->assertEquals($this->loadShipper->phone, $newLoad->loadShipper->phone);
        $this->assertEquals($this->loadShipper->email, $newLoad->loadShipper->email);
        $this->assertEquals($this->loadShipper->type, $newLoad->loadShipper->type);
        $this->assertEquals($this->loadShipper->company, $newLoad->loadShipper->company);

        $this->assertEquals($this->loadShipper->description, $newLoad->loadShipper->description);
        $this->assertEquals($this->loadShipper->address_1, $newLoad->loadShipper->address_1);
        $this->assertEquals($this->loadShipper->address_2, $newLoad->loadShipper->address_2);
        $this->assertEquals($this->loadShipper->zip, $newLoad->loadShipper->zip);

        $this->assertEquals($this->loadShipper->city, $newLoad->loadShipper->city);
        $this->assertEquals($this->loadShipper->state, $newLoad->loadShipper->state);
        $this->assertEquals($this->loadShipper->phone_2, $newLoad->loadShipper->phone_2);
        $this->assertEquals($this->loadShipper->mobile, $newLoad->loadShipper->mobile);
        $this->assertEquals($this->loadShipper->fax, $newLoad->loadShipper->fax);
        $this->assertEquals($this->loadShipper->notes_from_shipper, $newLoad->loadShipper->notes_from_shipper);

        // load origin
        $this->assertEquals($this->loadOrigin->name, $newLoad->loadOrigin->name);
        $this->assertEquals($this->loadOrigin->company, $newLoad->loadOrigin->company);
        $this->assertEquals($this->loadOrigin->type, $newLoad->loadOrigin->type);
        $this->assertEquals($this->loadOrigin->address_1, $newLoad->loadOrigin->address_1);
        $this->assertEquals($this->loadOrigin->address_2, $newLoad->loadOrigin->address_2);
        $this->assertEquals($this->loadOrigin->city, $newLoad->loadOrigin->city);
        $this->assertEquals($this->loadOrigin->state, $newLoad->loadOrigin->state);
        $this->assertEquals($this->loadOrigin->zip, $newLoad->loadOrigin->zip);
        $this->assertEquals($this->loadOrigin->phone, $newLoad->loadOrigin->phone);
        $this->assertEquals($this->loadOrigin->phone_2, $newLoad->loadOrigin->phone_2);
        $this->assertEquals($this->loadOrigin->mobile, $newLoad->loadOrigin->mobile);
        $this->assertEquals($this->loadOrigin->email, $this->loadOrigin->email);

        // load destination
        $this->assertEquals($this->loadDestination->name, $newLoad->loadDestination->name);
        $this->assertEquals($this->loadDestination->company, $newLoad->loadDestination->company);
        $this->assertEquals($this->loadDestination->type, $newLoad->loadDestination->type);
        $this->assertEquals($this->loadDestination->address_1, $newLoad->loadDestination->address_1);
        $this->assertEquals($this->loadDestination->address_2, $newLoad->loadDestination->address_2);
        $this->assertEquals($this->loadDestination->city, $newLoad->loadDestination->city);
        $this->assertEquals($this->loadDestination->state, $newLoad->loadDestination->state);
        $this->assertEquals($this->loadDestination->zip, $newLoad->loadDestination->zip);
        $this->assertEquals($this->loadDestination->phone, $newLoad->loadDestination->phone);
        $this->assertEquals($this->loadDestination->phone_2, $newLoad->loadDestination->phone_2);
        $this->assertEquals($this->loadDestination->mobile, $newLoad->loadDestination->mobile);
        $this->assertEquals($this->loadDestination->email, $this->loadDestination->email);

        // load vehicles
        foreach ($this->loadVehicles as $key => $vehicle) {
            $this->assertEquals($vehicle->year, $newLoad->loadVehicles[$key]->year);
            $this->assertEquals($vehicle->make, $newLoad->loadVehicles[$key]->make);
            $this->assertEquals($vehicle->model, $newLoad->loadVehicles[$key]->model);
            $this->assertEquals($vehicle->vin, $newLoad->loadVehicles[$key]->vin);
            $this->assertEquals($vehicle->is_running, $newLoad->loadVehicles[$key]->is_running);
            $this->assertEquals($vehicle->size, $newLoad->loadVehicles[$key]->size);

            $this->assertEquals($vehicle->color, $newLoad->loadVehicles[$key]->color);
            $this->assertEquals($vehicle->plate_number, $newLoad->loadVehicles[$key]->plate_number);
            $this->assertEquals($vehicle->lot_number, $newLoad->loadVehicles[$key]->lot_number);
            $this->assertEquals($vehicle->p_o_number, $newLoad->loadVehicles[$key]->p_o_number);
            $this->assertEquals($vehicle->notes, $newLoad->loadVehicles[$key]->notes);
            $this->assertEquals($vehicle->state, $newLoad->loadVehicles[$key]->state);
            $this->assertEquals($vehicle->price, $newLoad->loadVehicles[$key]->price);
        }

        // load transport
        $this->assertEquals($this->loadTransport->carrier_type, $newLoad->loadTransport->carrier_type);
        $this->assertEquals($this->loadTransport->available_date->format('Y/m/d'), $newLoad->loadTransport->available_date->format('Y/m/d'));
        $this->assertEquals($this->loadTransport->delivery_date->format('Y/m/d'), $newLoad->loadTransport->delivery_date->format('Y/m/d'));
        $this->assertEquals($this->loadTransport->delivery_accuracy, $newLoad->loadTransport->delivery_accuracy);
        $this->assertEquals($this->loadTransport->available_accuracy, $newLoad->loadTransport->available_accuracy);
        $this->assertEquals($this->loadTransport->distance, $newLoad->loadTransport->distance);
        $this->assertEquals($this->loadTransport->price, $newLoad->loadTransport->price);
        $this->assertEquals($this->loadTransport->deposit, $newLoad->loadTransport->deposit);
        $this->assertEquals($this->loadTransport->customer_pay_terms, $newLoad->loadTransport->customer_pay_terms);
        $this->assertEquals($this->loadTransport->carrier_pay_terms, $newLoad->loadTransport->carrier_pay_terms);
        $this->assertEquals($this->loadTransport->carrier_pay, $newLoad->loadTransport->carrier_pay);
    }

//    public function testCreateForExistingClient()
//    {
//
//    }
}
