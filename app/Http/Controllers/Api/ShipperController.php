<?php

namespace App\Http\Controllers\Api;

use App\Concerns\Controller\SendsEmptyResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shipper\AssignDriverToLoadRequest;
use App\Http\Requests\Shipper\GetSettingsRequest;
use App\Http\Requests\Shipper\GetShipperContactsRequest;
use App\Http\Requests\Shipper\GetShipperEmailTemplatesRequest;
use App\Http\Requests\Shipper\MailTemplate\AddNewTemplateRequest;
use App\Http\Requests\Shipper\MailTemplate\DeleteSelectedMailTemplatesRequest;
use App\Http\Requests\Shipper\MailTemplate\GetVariablesRequest;
use App\Http\Requests\Shipper\SetSettingsRequest;
use App\Http\Requests\UserManagement\CreateStaffUserRequest;
use App\Http\Requests\UserManagement\DeleteStaffUserRequest;
use App\Http\Requests\UserManagement\UpdateStaffUserRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ContactGroupResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\LoadResource;
use App\Http\Resources\MailTemplateResource;
use App\Http\Resources\QuoteResource;
use App\Models\Contact;
use App\Models\ContactGroup;
use App\Models\Shipper;
use App\Http\Resources\UserResource as UserResource;
use App\Models\Setting;
use App\Models\User;
use App\Repository\LoadRepository;
use App\Repository\ShipperMailTemplateRepository;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use App\Service\ShipperManagementService;
use App\Service\ClientManagementService;
use App\Service\LoadManagementService;
use App\Service\QuoteManagementService;
use App\Service\UserManagementService;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    use SendsEmptyResponse;

    private UserManagementService $userManagement;
    private QuoteManagementService $quoteManagement;
    private ClientManagementService $clientManagement;
    private LoadManagementService $loadManagement;
    private ShipperManagementService $shipperManagementService;
    private UserRepository $users;
    private ShipperMailTemplateRepository $shipperMailTemplates;
    private ShipperRepository $shippers;

    public function __construct(
        UserManagementService $userManagement,
        QuoteManagementService $quoteManagement,
        ClientManagementService $clientManagement,
        LoadManagementService $loadManagement,
        ShipperManagementService $shipperManagementService,
        UserRepository $users,
        ShipperRepository $shippers,
        ShipperMailTemplateRepository $shipperMailTemplates
    )
    {
        $this->userManagement = $userManagement;
        $this->quoteManagement = $quoteManagement;
        $this->clientManagement = $clientManagement;
        $this->loadManagement = $loadManagement;
        $this->shipperManagementService = $shipperManagementService;
        $this->users = $users;
        $this->shipperMailTemplates = $shipperMailTemplates;
        $this->shippers = $shippers;
    }

    public function getOrders(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('get-quotes-for-shipper', $shipper)) {
            $quotes = $this
                ->quoteManagement
                ->getOrdersForShipper($shipper);

            $quotes
                ->load([
                    'client',
                    'quoteShipper',
                    'quoteOrigin',
                    'quoteDestination',
                    'quoteVehicle',
                    'quoteTransport'
                ]);

            return QuoteResource::collection($quotes);
        }

        return $this->sendEmptyResponse();
    }

    public function getQuotes(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('get-quotes-for-shipper', $shipper)) {
            $quotes = $this
                ->quoteManagement
                ->getQuotesForShipper($shipper);

            $quotes
                ->load([
                    'client',
                    'quoteShipper',
                    'quoteOrigin',
                    'quoteDestination',
                    'quoteVehicle',
                    'quoteTransport'
                ]);

            return QuoteResource::collection($quotes);
        }

        return $this->sendEmptyResponse();
    }

    public function getLoads(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('get-loads-for-shipper', $shipper)) {
            $loads = $this
                ->loadManagement
                ->getLoadsForShipper($shipper);

            $loads
                ->load([
                    'client',
                    'driver',
                    'loadShipper',
                    'loadOrigin',
                    'loadDestination',
                    'loadVehicles',
                    'loadTransport'
                ]);

            return LoadResource::collection($loads);
        }

        return $this->sendEmptyResponse();
    }

    public function getUsers(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('get-shipper-users', $shipper)) {
            $users = $this
                ->userManagement
                ->getUsersForShipper($shipper);

            return UserResource::collection($users);
        }

        return $this->sendEmptyResponse();
    }

    public function getClientsWithLeads(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('get-shipper-users', $shipper)) {
            $clients = $this
                ->clientManagement
                ->getClientsWithLeadsForShipper($shipper);

            return ClientResource::collection($clients);
        }

        return $this->sendEmptyResponse();
    }

    public function getClients(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('get-shipper-users', $shipper)) {
            $clients = $this
                ->clientManagement
                ->getClientsForShipper($shipper);

            return ClientResource::collection($clients);
        }

        return $this->sendEmptyResponse();
    }

    public function getLeads(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('get-shipper-users', $shipper)) {
            $clients = $this
                ->clientManagement
                ->getLeadsForShipper($shipper);

            return ClientResource::collection($clients);
        }

        return $this->sendEmptyResponse();
    }

    public function getAdmins(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('manage-admins', $shipper)) {
            $admins = $this
                ->userManagement
                ->getAdminsForShipper($shipper);

            return UserResource::collection($admins);
        }

        $this->sendEmptyResponse();
    }

    public function getManagers(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('manage-managers', $shipper)) {
            $admins = $this
                ->userManagement
                ->getManagersForShipper($shipper);

            return UserResource::collection($admins);
        }

        $this->sendEmptyResponse();
    }

    public function getDispatchers(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('manage-dispatchers', $shipper)) {
            $admins = $this
                ->userManagement
                ->getDispatchersForShipper($shipper);

            return UserResource::collection($admins);
        }

        $this->sendEmptyResponse();
    }


    public function getDrivers(Shipper $shipper)
    {
        if ($shipper && auth()->user()->can('get-shipper-drivers', $shipper)) {
            $drivers = $this
                ->userManagement
                ->getDriversForShipper($shipper);

            return UserResource::collection($drivers);
        }

        return $this->sendEmptyResponse();
    }

    public function getRolesToCreate()
    {
        $only = [
            User::ROLE_SUPERADMIN => [
                User::ROLE_BUSINESS,
                User::ROLE_ADMIN,
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER,
                User::ROLE_CLIENT
            ],
            User::ROLE_BUSINESS => [
                User::ROLE_ADMIN,
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER,
                User::ROLE_CLIENT
            ],
            User::ROLE_ADMIN => [
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER,
                User::ROLE_CLIENT
            ],
            User::ROLE_MANAGER => [
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER,
                User::ROLE_CLIENT
            ],
            User::ROLE_DRIVER => [],
            User::ROLE_DISPATCHER => []
        ];

        $data = collect(User::ROLE_MAP)
            ->only($only[auth()->user()->role])
            ->map(function ($val, $key) {
                return [
                    'id' => $key,
                    'name' => $val
                ];
            })
            ->values();

        return response()->json([
            'roles' => $data
        ]);
    }

    public function getStaffRolesToCreate()
    {
        $only = [
            User::ROLE_SUPERADMIN => [
                User::ROLE_BUSINESS,
                User::ROLE_ADMIN,
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER
            ],
            User::ROLE_BUSINESS => [
                User::ROLE_ADMIN,
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER
            ],
            User::ROLE_ADMIN => [
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER
            ],
            User::ROLE_MANAGER => [
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER
            ],
            User::ROLE_DRIVER => [],
            User::ROLE_DISPATCHER => []
        ];

        $data = collect(User::ROLE_MAP)
            ->only($only[auth()->user()->role])
            ->map(function ($val, $key) {
                return [
                    'id' => $key,
                    'name' => $val
                ];
            })
            ->values();

        return response()->json([
            'roles' => $data
        ]);
    }

    public function getSubordinateRoles()
    {
        $only = [
            User::ROLE_SUPERADMIN => [
                User::ROLE_BUSINESS,
                User::ROLE_ADMIN,
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER
            ],
            User::ROLE_BUSINESS => [
                User::ROLE_ADMIN,
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER
            ],
            User::ROLE_ADMIN => [
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER
            ],
            User::ROLE_MANAGER => [
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER
            ],
            User::ROLE_DRIVER => [],
            User::ROLE_DISPATCHER => []
        ];

        $data = collect(User::ROLE_MAP)
            ->only($only[auth()->user()->role])
            ->map(function ($val, $key) {
                return [
                    'id' => $key,
                    'name' => $val
                ];
            })
            ->values();

        return response()->json([
            'roles' => $data
        ]);
    }

    public function getRoles()
    {
        $data = collect(User::ROLE_MAP)
            ->only([
                User::ROLE_ADMIN,
                User::ROLE_MANAGER,
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER,
            ])
            ->map(function ($val, $key) {
                return [
                    'id' => $key,
                    'name' => $val
                ];
            })
            ->values();

        return response()->json([
            'roles' => $data
        ]);
    }

    public function createUser(CreateStaffUserRequest $request)
    {
        $this
            ->userManagement
            ->createStaffUserFromRequest($request);

        return $this->sendCreatedResponse();
    }

    public function updateUser(UpdateStaffUserRequest $request)
    {
        $this
            ->userManagement
            ->updateUserFromRequest($request);

        return $this->sendUpdatedResponse();
    }

    public function deleteUser(DeleteStaffUserRequest $request)
    {
        $this
            ->userManagement
            ->deleteUserFromRequest($request);

        return $this->sendDeletedResponse();
    }

    public function getShipperEmailTemplates(GetShipperEmailTemplatesRequest $request)
    {
        $shippers = app(ShipperRepository::class);
        $shipper = $shippers->findById($request->input('shipper_id'));
        $templates = $this->shipperMailTemplates->getMailTemplatesForShipper($shipper);

        $templates = MailTemplateResource::collection($templates)
            ->groupBy(function ($item, $key) {
                return Shipper\ShipperMailTemplate::mailableToType($item['mailable']);
            });

        $templatesData = [];
        foreach (array_keys(Shipper\ShipperMailTemplate::TYPE_TO_MAILABLE_MAP) as $keyName)
        {
            $templatesData[$keyName] = $templates[$keyName] ?? [];
        }

        return response()
            ->json([
                'data' => $templatesData
            ]);
    }

    public function getShipperEmailTemplatesVariables(GetVariablesRequest $request)
    {
        return response()
            ->json([
                'data' => Shipper\ShipperMailTemplate::getVariablesByType()
            ]);
    }

    public function addNewMailTemplate(AddNewTemplateRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $existing = Shipper\ShipperMailTemplate::where('uuid', $request->input('id'))
            ->first();

        $newTemplate = Shipper\ShipperMailTemplate::updateOrCreate([
            'uuid' => $request->input('id')
        ], [
            'shipper_id' => $shipper->id,
            'html_template' => $request->input('html_template'),
            'name' => $request->input('name'),
            'subject' => $request->input('subject'),
            'mailable' => Shipper\ShipperMailTemplate::TYPE_TO_MAILABLE_MAP[$request->input('type')],
            'is_active' => $existing ? $existing->is_active : false,
            'background_color' => $request->input('background_color')
        ]);

        return $this->sendCreatedResponse();
    }

    public function addNewMailTemplateAndSetActive(AddNewTemplateRequest $request)
    {
        Shipper\ShipperMailTemplate::where('mailable', Shipper\ShipperMailTemplate::TYPE_TO_MAILABLE_MAP[$request->input('type')])
            ->update(['is_active' => 0]);

        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $newTemplate = Shipper\ShipperMailTemplate::updateOrCreate([
            'uuid' => $request->input('id')
        ], [
            'shipper_id' => $shipper->id,
            'html_template' => $request->input('html_template'),
            'name' => $request->input('name'),
            'subject' => $request->input('subject'),
            'mailable' => Shipper\ShipperMailTemplate::TYPE_TO_MAILABLE_MAP[$request->input('type')],
            'is_active' => true,
            'background_color' => $request->input('background_color')
        ]);

        return $this->sendCreatedResponse();
    }

    public function getShipperContacts(GetShipperContactsRequest $request)
    {
        $shipper = $this->shippers->findById($request->input('shipper_id'));

        $contactGroups = ContactGroup::with([
            'contacts' => function ($query) {
                $query
                    ->orderByDesc('is_primary')
                    ->orderByDesc('created_at');
            },
            'primaryContact'
        ])
            ->withCount('contacts')
            ->where('shipper_id', $shipper->id)
            ->orderByDesc('created_at')
            ->get();

        $contacts = Contact::with('contactGroup')
            ->where('shipper_id', $shipper->id)
            ->whereNull('contact_group_id')
            ->orderByDesc('created_at')
            ->get();

        $contactGroups = ContactGroupResource::collection($contactGroups);
        $contacts = ContactResource::collection($contacts);

        $result = $contactGroups->concat($contacts);

        return response()
            ->json([
                'data' => $result
            ]);
    }


    /**
     * @deprecated
     *
     * TODO: refactor
     * we've created new entity called ShipperSetting and now we can store
     * settings in there instead of creating new fields in shipper entity
     *
     *
     * @param SetSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function setSettings(SetSettingsRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $updateData = [
            'price_per_mile' => $request->input('price_per_mile'),
            'public_key' => $request->input('public_key'),
            'secret_key' => $request->input('secret_key'),
            'test_mode' => $request->input('test_mode'),

            'business_name' => $request->input('business_name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax'),
            'email' => $request->input('email'),
            'timezone' => $request->input('timezone'),
        ];

        if ($request->input('logo')) $updateData['logo'] = $request->input('logo');

        $shipper->update($updateData);

        return $this->sendUpdatedResponse();
    }

    /**
     * @param GetSettingsRequest $request
     * @param string $shipperId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSettings(GetSettingsRequest $request, string $shipperId)
    {
        $response = $this->shipperManagementService->getSettings($shipperId);

        return response()->json($response);
    }


    /**
     * @param string $shipperId
     * @param $settingKey
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSetting(string $shipperId, $settingKey)
    {
        $response = $this->shipperManagementService->getSetting($shipperId, $settingKey);

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @param string $shipperId
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadLogo(Request $request, string $shipperId)
    {
        if (
            $request->hasFile('company_logo') &&
            $request->file('company_logo')->isValid()
        ) {
            $file = $request->company_logo;
            $filePath = '/storage/' . $file->store($shipperId . '/images', 'public');

            $response = $this->shipperManagementService->saveSetting(
                $shipperId,
                Setting::SETTING_KEY_LOGO,
                $filePath,
            );

            return response()->json(['url' => $response->value]);
        }
    }

    public function assignDriverToLoad(AssignDriverToLoadRequest $request)
    {
        $loads = app(LoadRepository::class);
        $load = $loads->findById($request->input('load_id'));
        $load->update([
            'driver_id' => $this->users->findById($request->input('driver_id'))->id
        ]);

        return $this->sendUpdatedResponse();
    }

    public function deleteSelectedMailTemplates(DeleteSelectedMailTemplatesRequest $request)
    {
        Shipper\ShipperMailTemplate::whereIn('uuid', $request->input('templates'))
            ->delete();

        return $this->sendDeletedResponse();
    }
}
