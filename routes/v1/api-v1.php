<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\GoogleAPIController;
use App\Http\Controllers\Api\v1\BusinessAPIController;
use App\Http\Controllers\Api\v1\QuoteAPIController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\ShipperController;
use App\Http\Controllers\Api\ZipController;

Route::get('external/distance-between', [
    GoogleAPIController::class,
    'getDistanceBetween'
])
    ->name('api.google.distance-between');

Route::get('business', [
    BusinessAPIController::class,
    'getBusinessData'
])
    ->name('api.business.get');

Route::post('quote/draft', [
    QuoteAPIController::class,
    'createQuoteDraft'
])
    ->name('api.quote.draft.create');



/* api overrides */

Route::get('carrier-types-data', [
    QuoteController::class,
    'getCarrierTypesData'
]);

Route::get('delivery-accuracy-data', [
    QuoteController::class,
    'getDeliveryAccuracyData'
]);

Route::get('states-data', [
    QuoteController::class,
    'getStatesData'
]);

Route::get('car-sizes-data', [
    QuoteController::class,
    'getCarSizesData'
]);

Route::get('quote-statuses-data', [
    QuoteController::class,
    'getQuoteStatusesData'
]);

Route::prefix('zip')->group(function () {
    Route::get('{zip}/autocomplete',  [
        ZipController::class,
        'getZipCodePredictions'
    ]);
});

Route::prefix('city')->group(function () {
    Route::get('{city}/autocomplete', [
        ZipController::class,
        'getCityPredictions'
    ]);
});

Route::post('calculate-price', [
    QuoteController::class,
    'calculateQuotePrice'
]);

Route::group(['prefix' => 'settings'], function() {

    Route::post('logo', [
        ShipperController::class,
        'uploadLogo'
    ]);
});

Route::prefix('shipper')->group(function () {
    Route::prefix('{shipper}')->group(function () {
        Route::prefix('quotes')->group(function () {
            Route::get('{quote}', [
                QuoteController::class,
                'getQuote'
            ])->middleware('auth');
            Route::post('{quote}', [
                QuoteController::class,
                'updateQuote'
            ])->middleware('auth');
        });

        Route::group(['prefix' => 'settings'], function() {

            Route::get('{setting}', [
                ShipperController::class,
                'getSetting'
            ]);
        });
    });
});
