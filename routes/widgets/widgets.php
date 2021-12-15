<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WidgetsController;

Route::get('quick-quote', [
    WidgetsController::class,
    'renderQuickQuote'
])
    ->name('quote.helper');

