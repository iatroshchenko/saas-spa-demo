<?php

namespace App\Http\Controllers\Api;

use App\Concerns\Controller\SendsEmptyResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Http\Requests\Contact\DeleteContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Models\ContactGroup;
use App\Models\User;
use App\Repository\ContactRepository;
use App\Repository\ShipperRepository;
use App\Service\ClientManagementService;
use App\TemplateMail\CredentialsTemplateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    use SendsEmptyResponse;

    private ShipperRepository $shippers;
    private ContactRepository $contacts;
    private ClientManagementService $clientManagement;

    public function __construct(
        ShipperRepository $shippers,
        ContactRepository $contacts,
        ClientManagementService $clientManagement
    )
    {
        $this->shippers = $shippers;
        $this->contacts = $contacts;
        $this->clientManagement = $clientManagement;
    }

    public function create(CreateContactRequest $request)
    {
        $shipper = $this->shippers->findById($request->input('shipper_id'));

        $contactGroupName = $request->input('contact_group_name');
        $contactGroupId = null;
        $contactGroup = null;

        try {
            DB::beginTransaction();

            if (!is_null($contactGroupName)) {
                $contactGroupPublicId = $request->input('contact_group_id');

                // update
                if (is_string($contactGroupPublicId)) {
                    $contactGroup = $this->contacts->findGroupById($contactGroupPublicId);
                    if ($contactGroup) {
                        $contactGroupId = $contactGroup->id;

                        if ($request->input('is_primary')) {
                            $this->markAllContactsNotPrimaryForCompany($contactGroup);
                        }
                    }
                }

                // create
                if ($contactGroupPublicId === 0) {
                    $contactGroup = ContactGroup::create([
                        'name' => $contactGroupName,
                        'shipper_id' => $shipper->id
                    ]);
                }
            }

            $contact = Contact::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'is_primary' => $contactGroup ? $request->input('is_primary') : null,
                'contact_group_id' => $contactGroup ? $contactGroup->id : null,
                'shipper_id' => $shipper->id,
            ]);

            DB::commit();

        } catch (\Throwable $exception) {
            DB::rollback();
            throw $exception;
        }

        return response()
            ->json([
                'data' => new ContactResource($contact)
            ]);
    }

    private function markAllContactsNotPrimaryForCompany(ContactGroup $contactGroup)
    {
        Contact::where('contact_group_id', $contactGroup->id)
            ->update([
                'is_primary' => false
            ]);
    }

    public function update(UpdateContactRequest $request)
    {
        $shipper = $this->shippers->findById($request->input('shipper_id'));
        $contact = $this->contacts->findById($request->input('contact_id'));

        $contactGroupName = $request->input('contact_group_name');
        $contactGroupId = null;
        $contactGroup = null;

        try {
            DB::beginTransaction();

            if (!is_null($contactGroupName)) {
                $contactGroupPublicId = $request->input('contact_group_id');

                // update
                if (is_string($contactGroupPublicId)) {
                    $contactGroup = $this->contacts->findGroupById($contactGroupPublicId);
                    if ($contactGroup) {
                        $contactGroupId = $contactGroup->id;

                        if ($request->input('is_primary')) {
                            $this->markAllContactsNotPrimaryForCompany($contactGroup);
                        }
                    }
                }

                // create
                if ($contactGroupPublicId === 0) {
                    $contactGroup = ContactGroup::create([
                        'name' => $contactGroupName,
                        'shipper_id' => $shipper->id
                    ]);
                }
            }

            $contact->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'is_primary' => $contactGroup ? $request->input('is_primary') : null,
                'contact_group_id' => $contactGroup ? $contactGroup->id : null
            ]);

            DB::commit();

        } catch (\Throwable $exception) {
            DB::rollback();
            throw $exception;
        }

        return response()
            ->json([
                'data' => new ContactResource($contact)
            ]);
    }

    public function delete(DeleteContactRequest $request)
    {
        $contact = $this
            ->contacts
            ->findById($request->input('contact_id'));

        $contact->delete();

        return $this->sendDeletedResponse();
    }
}
