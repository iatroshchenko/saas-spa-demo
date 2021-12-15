<?php

namespace App\Http\Controllers\Api;

use App\Concerns\Controller\SendsEmptyResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LeadManagement\CreateLeadRequest;
use App\Service\ClientManagementService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    use SendsEmptyResponse;

    private ClientManagementService $clientManagement;

    public function __construct(ClientManagementService $clientManagement)
    {
        $this->clientManagement = $clientManagement;
    }

    public function create(CreateLeadRequest $request)
    {
        $this
            ->clientManagement
            ->createLeadFromRequest($request);

        return $this->sendCreatedResponse();
    }
}
