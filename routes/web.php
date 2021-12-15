<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaController;
use App\Http\Requests\VerifyEmail\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\EmailTrackingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    SpaController::class,
    'any'
])->name('start');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')
        ->with('email', 'verified');
})->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('{user}/new-email-verification/{email}', [
    UserController::class,
    'changeEmail'
])->name('verify-new-email')->middleware('signed');

Route::get('tracking/quote-email/{quote}/view', [
    EmailTrackingController::class,
    'quoteEmailViewed'
])->name('quote-email-tracking');

Route::get('external/{any}', [
    SpaController::class,
    'external'
])->where('any', '.*');

Route::get('/{any}', [
    SpaController::class,
    'any'
])->where('any', '.*');

Auth::routes();
