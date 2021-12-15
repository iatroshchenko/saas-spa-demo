<?php


namespace App\Service;


use App\DTO\UserWithCredentials;
use App\Http\Requests\ClientManagement\CreateClientRequest;
use App\Http\Requests\ClientManagement\UpdateClientRequest;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Http\Requests\LeadManagement\CreateLeadRequest;
use App\Http\Requests\Load\CreateLoadRequest;
use App\Http\Requests\Quote\CreateQuoteRequest;
use App\Mail\CredentialsEmail;
use App\Models\Shipper;
use App\Models\User;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use App\TemplateMail\CredentialsTemplateMail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ClientManagementService
{
    private UserRepository $users;
    private ShipperRepository $shippers;

    public function __construct(
        UserRepository $users,
        ShipperRepository $shippers
    )
    {
        $this->users = $users;
        $this->shippers = $shippers;
    }

    public function getClientsWithLeadsForShipper(Shipper $shipper): Collection
    {
        return $this
            ->users
            ->getClientsWithLeadsForShipper($shipper);
    }

    public function getClientsForShipper(Shipper $shipper): Collection
    {
        return $this
            ->users
            ->getClientsForShipper($shipper);
    }

    public function getLeadsForShipper(Shipper $shipper): Collection
    {
        return $this
            ->users
            ->getLeadsForShipper($shipper);
    }

    public function createLeadFromRequest(CreateLeadRequest $request): User
    {
        try {
            DB::beginTransaction();

            $client = $this
                ->users
                ->createLeadFromRequest($request);

            $this
                ->users
                ->createClientMetaFromRequest($client, $request);

            DB::commit();

            return $client;

        } catch (\Throwable $exception) {
            DB::rollback();
            throw $exception;
        }
    }

    public function createClientFromRequest(CreateClientRequest $request): User
    {
        try {
            DB::beginTransaction();

            $client = $this
                ->users
                ->createClientFromRequest($request);

            $this
                ->users
                ->createClientMetaFromRequest($client, $request);

            DB::commit();

            return $client;

        } catch (\Throwable $exception) {
            DB::rollback();
            throw $exception;
        }
    }

    public function createClientFromQuoteRequest(CreateQuoteRequest $request, bool $isQuote = true): User
    {
        try {
            DB::beginTransaction();

            $clientWithCredentials = $this
                ->users
                ->createClientFromQuoteRequestWithCredentials($request, $isQuote);

            $client = $clientWithCredentials->user;

            $this
                ->users
                ->createClientMetaFromQuoteRequest($client, $request);

            DB::commit();

            $shipper = $this
                ->shippers
                ->findById($request->input('shipper_id'));

            if (!$isQuote) {
                Mail::to($client->email)
                    ->send(new CredentialsTemplateMail(
                        $shipper,
                        $clientWithCredentials->credentials
                    ));
            }

            return $client;

        } catch (\Throwable $exception) {
            DB::rollback();
            throw $exception;
        }
    }

    public function createClientFromLoadRequest(CreateLoadRequest $request): User
    {
        try {
            DB::beginTransaction();

            $clientWithCredentials = $this
                ->users
                ->createClientFromLoadRequestWithCredentials($request);

            $client = $clientWithCredentials->user;

            $this
                ->users
                ->createClientMetaFromLoadRequest($client, $request);

            DB::commit();

            $shipper = $this
                ->shippers
                ->findById($request->input('shipper_id'));

            Mail::to($client->email)
                ->send(new CredentialsTemplateMail(
                    $shipper,
                    $clientWithCredentials->credentials
                ));

            return $client;

        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function updateClientFromRequest(UpdateClientRequest $request): User
    {
        try {
            DB::beginTransaction();

            $client = $this
                ->users
                ->updateFromRequest($request);

            $client
                ->clientMeta()
                ->delete();

            $this
                ->users
                ->createClientMetaFromRequest($client, $request);

            DB::commit();

            return $client;

        } catch (\Throwable $exception) {
            DB::rollback();
            throw $exception;
        }
    }

    public function createClientFromContactRequest(CreateContactRequest $request): UserWithCredentials
    {
        $clientWithCredentials = $this
            ->users
            ->createClientFromContactRequestWithCredentials($request);

        $shipper = $this->shippers->findById($request->input('shipper_id'));
        $clientWithCredentials->user->shippers()->attach($shipper);

        return $clientWithCredentials;
    }
}
