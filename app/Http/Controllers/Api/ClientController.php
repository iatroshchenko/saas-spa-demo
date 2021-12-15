<?php

namespace App\Http\Controllers\Api;

use App\Concerns\Controller\SendsEmptyResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientManagement\CreateClientRequest;
use App\Http\Requests\ClientManagement\UpdateClientRequest;
use App\Service\ClientManagementService;

class ClientController extends Controller
{
    use SendsEmptyResponse;

    private ClientManagementService $clientManagement;

    public function __construct(ClientManagementService $clientManagementService)
    {
        $this->clientManagement = $clientManagementService;
    }

    public function createClient(CreateClientRequest $request)
    {
        $this
            ->clientManagement
            ->createClientFromRequest($request);

        return $this->sendCreatedResponse();
    }

    public function updateClient(UpdateClientRequest $request)
    {
        $this
            ->clientManagement
            ->updateClientFromRequest($request);

        return $this->sendUpdatedResponse();
    }
}
