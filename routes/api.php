<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource as UserResource;
use App\Http\Resources\ClientResource;

use App\Http\Controllers\Api\AccessController;
use App\Http\Controllers\Api\ShipperController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\ZipController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\Api\LoadController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\QuoteConfirmController;
use App\Http\Controllers\Api\LeadController;
use App\Models\User;
use App\Models\Shipper;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->get('/userinfo', function () {
    $user = auth()->user();
    $user->load([
        'shippers',
        'controlledShippers',
        'ownerMeta'
    ]);
    return new UserResource($user);
});

Route::middleware('auth')->get('/clientinfo', function () {
    $user = auth()->user();
    $user->load([
        'clientMeta'
    ]);
    return new ClientResource($user);
});

Route::middleware('auth')->get('/role', function () {
    $user = auth()->user();
    return response()->json([
        'role' => $user->getRoleName()
    ]);
});

Route::middleware('auth')->post('/change-password', [
    UserController::class,
    'changePassword'
]);

Route::middleware('auth')->post('/send-credentials', [
    UserController::class,
    'sendCredentials'
]);

Route::prefix('temporary')->group(function () {
    Route::prefix('confirm-order')->group(function () {
        Route::prefix('{quote}')->group(function () {
            Route::get('data', [
                QuoteConfirmController::class,
                'getConfirmQuoteData'
            ])->name('confirm-order.get-data')
                ->middleware('signed');
            Route::post('confirm', [
                QuoteConfirmController::class,
                'clientConvertQuoteToOrder'
            ])->name('confirm-order.confirm')
                ->middleware('signed');
        });
    });
});

Route::prefix('can')->group(function () {
    Route::post('manage-users', [
        AccessController::class,
        'ifUserCanManageUsersForShipper'
    ])->middleware('auth');

    Route::post('manage-admins', [
        AccessController::class,
        'ifUserCanManageAdminsForShipper'
    ]);

    Route::post('manage-managers', [
        AccessController::class,
        'ifUserCanManageManagersForShipper'
    ]);

    Route::post('manage-dispatchers', [
        AccessController::class,
        'ifUserCanManageDispatchersForShipper'
    ]);

    Route::post('manage-drivers', [
        AccessController::class,
        'ifUserCanManageDriversForShipper'
    ]);

    // Contacts Access
    Route::post('manage-contacts', [
        AccessController::class,
        'ifUserCanManageContactsForShipper'
    ]);

    // Orders Create
    Route::post('create-orders', [
        AccessController::class,
        'ifUserCanCreateOrdersForShipper'
    ])->middleware('auth');

    // Quotes Access
    Route::post('see-quotes', [
        AccessController::class,
        'ifUserCanSeeQuotesForShipper'
    ])->middleware('auth');
    Route::post('create-quotes', [
        AccessController::class,
        'ifUserCanCreateQuotesForShipper'
    ])->middleware('auth');
    Route::post('get-quote', [
        AccessController::class,
        'ifUserCanGetQuote'
    ])->middleware('auth');
    Route::post('edit-quote', [
        AccessController::class,
        'ifUserCanEditQuote'
    ])->middleware('auth');

    // Loads Access
    Route::post('see-loads', [
        AccessController::class,
        'ifUserCanSeeLoadsForShipper'
    ])->middleware('auth');
    Route::post('create-loads', [
        AccessController::class,
        'ifUserCanCreateLoadsForShipper'
    ])->middleware('auth');
    Route::post('get-load', [
        AccessController::class,
        'ifUserCanGetLoad'
    ])->middleware('auth');
    Route::post('edit-load', [
        AccessController::class,
        'ifUserCanEditLoad'
    ]);

    // Email Templates Access
    Route::post('edit-email-templates', [
        AccessController::class,
        'ifUserCanEditMailTemplates'
    ])->middleware('auth');

});


/*
 * Все строится на shipper/{shipper_id}/и так далее поэтому будет ShipperController
 * как shipper/
 *
 * а все остальное -> shipper/{shipper_id}/{domain}/{action}
 *
 * */

Route::prefix('user')->group(function () {
   Route::post('request-email-change', [
       UserController::class,
       'requestEmailChange'
   ])->middleware('auth');
});

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

Route::prefix('place')->group(function () {
    Route::get('{place}/details', [
        ZipController::class,
        'getPlaceDetails'
    ]);
});

Route::get('quote-progress-statuses-data', [
    QuoteController::class,
    'getQuoteProgressStatusesData'
]);
Route::get('quote-statuses-data', [
    QuoteController::class,
    'getQuoteStatusesData'
])->middleware('auth');
Route::get('load-statuses-data', [
    LoadController::class,
    'getLoadStatusesData'
])->middleware('auth');
Route::get('states-data', [
    QuoteController::class,
    'getStatesData'
])->middleware('auth');
Route::get('carrier-types-data', [
    QuoteController::class,
    'getCarrierTypesData'
])->middleware('auth');
Route::get('car-sizes-data', [
    QuoteController::class,
    'getCarSizesData'
])->middleware('auth');
Route::get('available-accuracy-data', [
    QuoteController::class,
    'getAvailableAccuracyData'
])->middleware('auth');
Route::get('delivery-accuracy-data', [
    QuoteController::class,
    'getDeliveryAccuracyData'
])->middleware('auth');
Route::get('carrier-pay-terms-data', [
    LoadController::class,
    'getCarrierPayTermsData'
])->middleware('auth');
Route::get('customer-pay-terms-data', [
    LoadController::class,
    'getCustomerPayTermsData'
])->middleware('auth');

Route::post('calculate-price', [
    QuoteController::class,
    'calculateQuotePrice'
])->middleware('auth');

Route::post('upload-avatar', [
    UploadController::class,
    'avatar'
])->middleware('auth');
Route::post('upload-company-logo', [
    UploadController::class,
    'companyLogo'
])->middleware('auth');

Route::post('profile', [
    UserController::class,
    'updateProfileInfo'
])->middleware('auth');

/*
 * Shipper section
 * */
Route::prefix('shipper')->group(function () {
    Route::prefix('{shipper:' . Shipper::publicKey() . '}')->group(function () {

        /* Fast Actions */
        Route::post('assign-driver-to-load', [
            ShipperController::class,
            'assignDriverToLoad'
        ])->middleware('auth');

        /* Settings */
        Route::post('settings', [
            ShipperController::class,
            'setSettings'
        ])->middleware('auth');

        /* Contacts */
        Route::prefix('contacts')->group(function () {
            Route::get('/', [
                ShipperController::class,
                'getShipperContacts'
            ])->middleware('auth');

            Route::post('/', [
                ContactController::class,
                'create'
            ]);

            Route::prefix('{contact:' . Contact::publicKey() . '}')->group(function () {
                Route::post('/', [
                    ContactController::class,
                    'update'
                ]);
                Route::post('/delete', [
                    ContactController::class,
                    'delete'
                ]);
            });
        });

        /* Customers */
        Route::prefix('customers')->group(function () {

//            /* Contacts */
//            Route::prefix( '{customer:' . Customer::publicKey() . '}' . '/contacts')->group(function() {
//                Route::post('/', [
//                    ContactController::class,
//                    'create'
//                ])->middleware('auth');
//
//                Route::post('{contact:' . Customer::publicKey() . '}', [
//                    ContactController::class,
//                    'update'
//                ])->middleware('auth');
//
//                Route::post('{contact:' . Customer::publicKey() . '}' . '/delete', [
//                    ContactController::class,
//                    'delete'
//                ])->middleware('auth');
//            });
        });


        /* Users */
        Route::get('admins', [
            ShipperController::class,
            'getAdmins'
        ])->middleware('auth');

        Route::get('managers', [
            ShipperController::class,
            'getManagers'
        ])->middleware('auth');

        Route::get('dispatchers', [
            ShipperController::class,
            'getDispatchers'
        ])->middleware('auth');

        Route::get('drivers', [
            ShipperController::class,
            'getDrivers'
        ])->middleware('auth');

        Route::prefix('users')->group(function () {
            Route::get('/', [
                ShipperController::class,
                'getUsers'
            ])->middleware('auth');

            Route::post('/', [
                ShipperController::class,
                'createUser'
            ])->middleware('auth');

            Route::post('{user:' . User::publicKey() . '}', [
                ShipperController::class,
                'updateUser'
            ])->middleware('auth');

            Route::post('{user:' . User::publicKey() . '}' . '/delete', [
                ShipperController::class,
                'deleteUser'
            ])->middleware('auth');
        });

        /* Clients */
        Route::prefix('clients')->group(function () {
            Route::get('/', [
                ShipperController::class,
                'getClients'
            ])->middleware('auth');
            Route::get('/all', [
                ShipperController::class,
                'getClientsWithLeads'
            ]);
            Route::post('/', [
                ClientController::class,
                'createClient'
            ])->middleware('auth');
            Route::post('{user:' . User::publicKey() . '}', [
                ClientController::class,
                'updateClient'
            ])->middleware('auth');
        });

        /* Leads */
        Route::prefix('leads')->group(function () {
            Route::get('/', [
                ShipperController::class,
                'getLeads'
            ])->middleware('auth');

            Route::post('/', [
                LeadController::class,
                'create'
            ])->middleware('auth');

            Route::post('{user:' . User::publicKey() . '}', [
                ClientController::class,
                'updateClient'
            ])->middleware('auth');
        });

        /* Drivers */
        Route::prefix('drivers')->group(function () {
            Route::get('/', [
                ShipperController::class,
                'getDrivers'
            ])->middleware('auth');
        });

        /* Quotes */
        Route::prefix('orders')->group(function () {
            Route::get('/', [
                ShipperController::class,
                'getOrders'
            ])->middleware('auth');
            Route::post('/', [
                QuoteController::class,
                'createOrder'
            ])->middleware('auth');
        });

        Route::prefix('quotes')->group(function () {
            Route::get('/', [
                ShipperController::class,
                'getQuotes'
            ])->middleware('auth');
            Route::post('/', [
                QuoteController::class,
                'createQuote'
            ])->middleware('auth');
            Route::get('{quote}', [
                QuoteController::class,
                'getQuote'
            ])->middleware('auth');
            Route::post('{quote}', [
                QuoteController::class,
                'updateQuote'
            ])->middleware('auth');
            Route::post('{quote}/delete', [
                QuoteController::class,
                'deleteQuote'
            ])->middleware('auth');
            Route::post('{quote}/restore', [
                QuoteController::class,
                'restoreQuote'
            ])->middleware('auth');
            Route::post('{quote}/email', [
                QuoteController::class,
                'emailQuote'
            ])->middleware('auth');
            Route::post('{quote}/to-order', [
                QuoteController::class,
                'convertQuoteToOrder'
            ])->middleware('auth');
            Route::post('{quote}/pay', [
                QuoteController::class,
                'payQuote'
            ])->middleware('auth');
        });

        /* Loads */
        Route::prefix('loads')->group(function () {
            Route::get('/', [
                ShipperController::class,
                'getLoads'
            ])->middleware('auth');
            Route::post('/', [
                LoadController::class,
                'createLoad'
            ])->middleware('auth');
            Route::get('{load}', [
                LoadController::class,
                'getLoad'
            ])->middleware('auth');
            Route::post('{load}', [
                LoadController::class,
                'updateLoad'
            ])->middleware('auth');
            Route::post('{load}/delete', [
                LoadController::class,
                'deleteLoad'
            ])->middleware('auth');
            Route::post('{load}/email', [
                LoadController::class,
                'emailLoad'
            ])->middleware('auth');
        });

        /* Shipper Email Templates */
        Route::group(['middleware' => 'auth', 'prefix' => 'email-templates'], function () {
            Route::get('/', [
               ShipperController::class,
               'getShipperEmailTemplates'
            ]);
            Route::get('/variables', [
                ShipperController::class,
                'getShipperEmailTemplatesVariables'
            ]);
            Route::post('/', [
                ShipperController::class,
                'addNewMailTemplate'
            ]);
            Route::post('/active', [
                ShipperController::class,
                'addNewMailTemplateAndSetActive'
            ]);
            Route::post('/delete', [
                ShipperController::class,
                'deleteSelectedMailTemplates'
            ]);
        });

        /* Shipper Settings */
        Route::group(['middleware' => 'auth', 'prefix' => 'settings'], function() {
            Route::get('', [
                ShipperController::class,
                'getSettings'
            ]);

            Route::get('{settingKey}', [
                ShipperController::class,
                'getSetting'
            ]);

            Route::post('logo', [
                ShipperController::class,
                'uploadLogo'
            ]);
        });
    });

    Route::get('roles', [
        ShipperController::class,
        'getRoles'
    ])->middleware('auth');

    Route::get('subordinate-roles', [
        ShipperController::class,
        'getSubordinateRoles'
    ])->middleware('auth');

    Route::get('roles-to-create', [
        ShipperController::class,
        'getRolesToCreate'
    ])->middleware('auth');
    Route::get('staff-roles-to-create', [
        ShipperController::class,
        'getStaffRolesToCreate'
    ])->middleware('auth');
});

/*
 * Widgets section
 */

Route::group(['middleware' => 'auth', 'prefix' => 'widgets'], function() {
    Route::get('settings', [
        WidgetsController::class,
        'getSettings'
    ]);
});

Route::get('/auth', function () {
    return !!auth()->user();
});
