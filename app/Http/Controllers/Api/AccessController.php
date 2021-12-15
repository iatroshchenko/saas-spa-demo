<?php

namespace App\Http\Controllers\Api;

use App\Concerns\Controller\AuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Access\UserCanCreateLoadsForShipperRequest;
use App\Http\Requests\Access\UserCanCreateQuotesForShipperRequest;
use App\Http\Requests\Access\UserCanEditMailTemplatesRequest;
use App\Http\Requests\Access\UserCanEditQuoteRequest;
use App\Http\Requests\Access\UserCanPayQuoteRequest;
use App\Http\Requests\Access\UserCanGetLoadRequest;
use App\Http\Requests\Access\UserCanManageContactsForShipper;
use App\Http\Requests\Access\UserCanManageUsersForShipperRequest;
use App\Http\Requests\Access\UserCanSeeLoadsForShipperRequest;
use App\Http\Requests\Access\UserCanSeeQuotesForShipperRequest;
use App\Http\Requests\Access\UserCanGetQuoteRequest;
use App\Http\Requests\Access\UsersCanEditLoadRequest;
use App\Http\Requests\Access\UserCanCreateOrdersForShipperRequest;
use App\Repository\LoadRepository;
use App\Repository\QuoteRepository;
use App\Repository\ShipperRepository;

class AccessController extends Controller
{
    use AuthorizesRequests;

    private ShipperRepository $shippers;
    private QuoteRepository $quotes;
    private LoadRepository $loads;

    public function __construct(
        ShipperRepository $shippers,
        QuoteRepository $quotes,
        LoadRepository $loads
    )
    {
        $this->shippers = $shippers;
        $this->quotes = $quotes;
        $this->loads = $loads;
    }

    public function ifUserCanManageUsersForShipper(UserCanManageUsersForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('manage-users', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanManageAdminsForShipper(UserCanManageUsersForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('manage-admins', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanManageManagersForShipper(UserCanManageUsersForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('manage-managers', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanManageDriversForShipper(UserCanManageUsersForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('manage-drivers', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanManageDispatchersForShipper(UserCanManageUsersForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('manage-dispatchers', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanSeeQuotesForShipper(UserCanSeeQuotesForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('get-quotes-for-shipper', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanCreateOrdersForShipper(UserCanCreateOrdersForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('create-orders-for-shipper', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanCreateQuotesForShipper(UserCanCreateQuotesForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('create-quotes-for-shipper', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanGetQuote(UserCanGetQuoteRequest $request)
    {
        $quote = $this
            ->quotes
            ->findById($request->input('quote_id'));

        $user = auth()->user();

        if ($user->can('get-quote', $quote)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanEditQuote(UserCanEditQuoteRequest $request)
    {
        $quote = $this
            ->quotes
            ->findById($request->input('quote_id'));

        $user = auth()->user();

        if ($user->can('edit-quote', $quote)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanSeeLoadsForShipper(UserCanSeeLoadsForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('get-loads-for-shipper', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanCreateLoadsForShipper(UserCanCreateLoadsForShipperRequest $request)
    {
        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        $user = auth()->user();

        if ($user->can('create-loads-for-shipper', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanGetLoad(UserCanGetLoadRequest $request)
    {
        $load = $this
            ->loads
            ->findById($request->input('load_id'));

        $user = auth()->user();

        if ($user->can('get-load', $load)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanEditLoad(UsersCanEditLoadRequest $request)
    {
        $load = $this
            ->loads
            ->findById($request->input('load_id'));

        $user = auth()->user();

        if ($user->can('edit-load', $load)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanEditMailTemplates(UserCanEditMailTemplatesRequest $request)
    {
        $shipper = $this->shippers->findById($request->input('shipper_id'));
        $user = auth()->user();
        if ($user->can('get-shipper-email-templates', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanManageContactsForShipper(UserCanManageContactsForShipper $request)
    {
        $shipper = $this->shippers->findById($request->input('shipper_id'));
        $user = auth()->user();
        if ($user->can('manage-contacts-for-shipper', $shipper)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }

    public function ifUserCanPayQuote(UserCanPayQuoteRequest $request)
    {
        $quote = $this
            ->quotes
            ->findById($request->input('quote_id'));

        $user = auth()->user();

        if ($user->can('pay-quote', $quote)) {
            return $this->sendAllowedJsonResponse();
        }

        return $this->sendForbiddenJsonResponse();
    }
}
