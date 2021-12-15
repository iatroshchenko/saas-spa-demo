<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Service\QuoteManagementService;
use App\Http\Requests\Quote\CreateQuoteDraftRequest;

/**
 * Class QuoteAPIController
 * @package App\Http\Controllers\Api\v1
 *
 * @property QuoteManagementService $quoteService
 */
class QuoteAPIController extends Controller
{
    private QuoteManagementService $quoteService;

    /**
     * QuoteAPIController constructor.
     * @param QuoteManagementService $quoteService
     */
    public function __construct(QuoteManagementService $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    /**
     * @param CreateQuoteDraftRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function createQuoteDraft(CreateQuoteDraftRequest $request)
    {
        $response = $this->quoteService->createQuoteDraft($request);

        return response()->json(['id' => $response]);
    }
}
