<?php

namespace App\Http\Controllers;

use App\Service\WidgetService;
use App\Http\Requests\Widget\WidgetRequest;
use App\Http\Resources\ShipperSettingsResource;

/**
 * Class WidgetsController
 * @package App\Http\Controllers
 */
class WidgetsController extends Controller
{
    private $widgetService;

    /**
     * WidgetsController constructor.
     * @param WidgetService $widgetService
     */
    public function __construct(WidgetService $widgetService)
    {
        $this->widgetService = $widgetService;
    }

    /**
     * @param WidgetRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function renderQuickQuote(WidgetRequest $request)
    {
        return view('spa.external');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\Helpers\DatabaseException
     */
    public function getSettings()
    {
        $responseData = $this->widgetService->getAccessKeys();

        return response()->json(new ShipperSettingsResource($responseData));
    }
}
