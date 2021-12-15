<?php

namespace Tests\Feature\QuoteManagement;

use App\Http\Requests\Quote\CreateQuoteRequest;
use App\Models\Quote;
use App\Models\User;
use App\Repository\UserRepository;
use App\Service\QuoteManagementService;
use App\Models\Shipper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class CreateQuoteTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testQuoteForNewClient()
    {
        $shipper = Shipper::factory()->create();
        $users = app()->make(UserRepository::class);

        $quoteShipper = Quote\QuoteShipper::factory()->make();
        $quoteOrigin = Quote\QuoteOrigin::factory()->make();
        $quoteDestination = Quote\QuoteDestination::factory()->make();
        $quoteVehicle = Quote\QuoteVehicle::factory()->make();

        $quoteTransport = Quote\QuoteTransport::factory()->make();

        $validRequestData = [
            'shipper_id' => $shipper->getPublicKey(),

            // quote shipper
            'first_name' => $quoteShipper->first_name,
            'last_name' => $quoteShipper->last_name,
            'phone' => $quoteShipper->phone,
            'email' => $quoteShipper->email,
            'type' => $quoteShipper->type,
            'company' => $quoteShipper->company,
            'address_1' => $quoteShipper->address_1,
            'address_2' => $quoteShipper->address_2,
            'zip' => $quoteShipper->zip,
            'city' => $quoteShipper->city,
            'state' => $quoteShipper->state,
            'phone_2' => $quoteShipper->phone_2,
            'mobile' => $quoteShipper->mobile,
            'fax' => $quoteShipper->fax,
            'notes_from_shipper' => $quoteShipper->notes_from_shipper,

            // quote origin
            'quote_origin_zip' => $quoteOrigin->zip,
            'quote_origin_city' => $quoteOrigin->city,
            'quote_origin_state' => $quoteOrigin->state,

            // quote destination
            'quote_destination_zip' => $quoteDestination->zip,
            'quote_destination_city' => $quoteDestination->city,
            'quote_destination_state' => $quoteDestination->state,

            // quote vehicle
            'quote_vehicle_year' => $quoteVehicle->year,
            'quote_vehicle_make' => $quoteVehicle->make,
            'quote_vehicle_model' => $quoteVehicle->model,
            'quote_vehicle_size' => $quoteVehicle->size,
            'quote_vehicle_is_running' => $quoteVehicle->is_running,
            'quote_vehicle_vin' => $quoteVehicle->vin,

            // quote transport
            'carrier_type' => $quoteTransport->carrier_type,
            'available_date' => $quoteTransport->available_date->format('Y/m/d'),
            'delivery_date' => $quoteTransport->delivery_date->format('Y/m/d'),
            'delivery_accuracy' => $quoteTransport->delivery_accuracy,
            'price' => $quoteTransport->price,
            'deposit' => $quoteTransport->deposit,
            'distance' => $quoteTransport->distance
        ];

        $request = new CreateQuoteRequest($validRequestData);
        $validator = Validator::make($request->all(), $request->rules());

        try {
            if ($validator->validate()) {
                $data = $validator->validated();
            }
        } catch (ValidationException $exception) {
            dump($exception->errors()); dd(self::class);
        }

        $quoteManagement = app()->make(QuoteManagementService::class);
        $createdQuote = $quoteManagement->createQuoteFromRequest($request);

        $this->assertInstanceOf(Quote::class, $createdQuote);
        $this->assertInstanceOf(Quote::class, Quote::find($createdQuote->id));
        $this->assertEquals(Quote::STATUS_QUOTE, $createdQuote->status);

        // Shipper
        $this->assertEquals($shipper->id, $createdQuote->shipper->id);

        // QuoteShipper
        $this->assertEquals($quoteShipper->first_name, $createdQuote->quoteShipper->first_name);
        $this->assertEquals($quoteShipper->last_name, $createdQuote->quoteShipper->last_name);
        $this->assertEquals($quoteShipper->phone, $createdQuote->quoteShipper->phone);

        $this->assertEquals($quoteShipper->email, $createdQuote->quoteShipper->email);
        $this->assertEquals($quoteShipper->type, $createdQuote->quoteShipper->type);
        $this->assertEquals($quoteShipper->company, $createdQuote->quoteShipper->company);
        $this->assertEquals($quoteShipper->address_1, $createdQuote->quoteShipper->address_1);
        $this->assertEquals($quoteShipper->address_2, $createdQuote->quoteShipper->address_2);
        $this->assertEquals($quoteShipper->zip, $createdQuote->quoteShipper->zip);
        $this->assertEquals($quoteShipper->city, $createdQuote->quoteShipper->city);
        $this->assertEquals($quoteShipper->state, $createdQuote->quoteShipper->state);
        $this->assertEquals($quoteShipper->phone_2, $createdQuote->quoteShipper->phone_2);

        $this->assertEquals($quoteShipper->mobile, $createdQuote->quoteShipper->mobile);
        $this->assertEquals($quoteShipper->fax, $createdQuote->quoteShipper->fax);
        $this->assertEquals($quoteShipper->notes_from_shipper, $createdQuote->quoteShipper->notes_from_shipper);

        // QuoteOrigin
        $this->assertEquals($quoteOrigin->city, $createdQuote->quoteOrigin->city);
        $this->assertEquals($quoteOrigin->state, $createdQuote->quoteOrigin->state);
        $this->assertEquals($quoteOrigin->zip, $createdQuote->quoteOrigin->zip);

        // QuoteDestination
        $this->assertEquals($quoteDestination->city, $createdQuote->quoteDestination->city);
        $this->assertEquals($quoteDestination->state, $createdQuote->quoteDestination->state);
        $this->assertEquals($quoteDestination->zip, $createdQuote->quoteDestination->zip);

        // QuoteVehicle
        $this->assertEquals($quoteVehicle->year, $createdQuote->quoteVehicle->year);
        $this->assertEquals($quoteVehicle->make, $createdQuote->quoteVehicle->make);
        $this->assertEquals($quoteVehicle->model, $createdQuote->quoteVehicle->model);
        $this->assertEquals($quoteVehicle->size, $createdQuote->quoteVehicle->size);
        $this->assertEquals($quoteVehicle->vin, $createdQuote->quoteVehicle->vin);
        $this->assertEquals($quoteVehicle->is_running, $createdQuote->quoteVehicle->is_running);

        // QuoteTransport
        $this->assertEquals($quoteTransport->carrier_type, $createdQuote->quoteTransport->carrier_type);

        $availableDateExpected = Carbon::create($quoteTransport->available_date->format('Y/m/d'))->format('Y/m/d');
        $availableDateActual = $createdQuote->quoteTransport->available_date->format('Y/m/d');

        $deliveryDateExpected = Carbon::create($quoteTransport->delivery_date->format('Y/m/d'))->format('Y/m/d');
        $deliveryDateActual = $createdQuote->quoteTransport->delivery_date->format('Y/m/d');

        $this->assertEquals($availableDateExpected, $availableDateActual);
        $this->assertEquals($deliveryDateExpected, $deliveryDateActual);

        $this->assertEquals($quoteTransport->delivery_accuracy, $createdQuote->quoteTransport->delivery_accuracy);
        $this->assertEquals($quoteTransport->price, $createdQuote->quoteTransport->price);
        $this->assertEquals($quoteTransport->deposit, $createdQuote->quoteTransport->deposit);
        $this->assertEquals($quoteTransport->distance, $createdQuote->quoteTransport->distance);

        // Client has been created
        $client = $users
            ->findByEmail($validRequestData['email']);

        $this->assertInstanceOf(User::class, $client);
        $this->assertTrue($client->isMemberOf($shipper));
        $this->assertNull($client->password);

        $this->assertEquals($quoteShipper->email, $client->email);
        $this->assertEquals($quoteShipper->first_name, $client->first_name);
        $this->assertEquals($quoteShipper->last_name, $client->last_name);
        $this->assertEquals($quoteShipper->phone, $client->phone);

        $this->assertEquals($quoteShipper->type, $client->clientMeta->type);
        $this->assertEquals($quoteShipper->company, $client->clientMeta->company);
        $this->assertEquals($quoteShipper->address_1, $client->clientMeta->address_1);
        $this->assertEquals($quoteShipper->address_2, $client->clientMeta->address_2);
        $this->assertEquals($quoteShipper->zip, $client->clientMeta->zip);
        $this->assertEquals($quoteShipper->city, $client->clientMeta->city);
        $this->assertEquals($quoteShipper->state, $client->clientMeta->state);
        $this->assertEquals($quoteShipper->phone_2, $client->clientMeta->phone_2);

        $this->assertEquals($quoteShipper->mobile, $client->clientMeta->mobile);
        $this->assertEquals($quoteShipper->fax, $client->clientMeta->fax);
        $this->assertEquals($quoteShipper->notes_from_shipper, $client->clientMeta->notes_from_shipper);
    }
}
