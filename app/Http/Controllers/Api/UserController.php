<?php

namespace App\Http\Controllers\Api;

use App\Concerns\Controller\SendsEmptyResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangeEmailRequest;
use App\Http\Requests\User\PasswordChangeRequest;
use App\Http\Requests\User\RequestEmailChangeRequest;
use App\Http\Requests\User\SendCredentialsRequest;
use App\Service\UserManagementService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use SendsEmptyResponse;

    private UserManagementService $userManagement;

    public function __construct(UserManagementService $userManagement)
    {
        $this->userManagement = $userManagement;
    }

    public function changePassword(PasswordChangeRequest $request)
    {
        $this
            ->userManagement
            ->changeUserPasswordFromRequest($request);

        return $this->sendEmptyTrueResponse('changed');
    }

    public function sendCredentials(SendCredentialsRequest $request)
    {
        $this
            ->userManagement
            ->sendCredentialsFromRequest($request);

        return $this->sendEmptyTrueResponse('sent');
    }

    public function requestEmailChange(RequestEmailChangeRequest $request)
    {
        $this
            ->userManagement
            ->requestEmailChange($request);

        return $this->sendEmptyTrueResponse('email_change_requested');
    }

    public function changeEmail(ChangeEmailRequest $request)
    {
        $this
            ->userManagement
            ->changeEmailFromRequest($request);

        return redirect(route('start'))
            ->with('new-email', 'verified');
    }

    public function updateProfileInfo(Request $request)
    {
        $avatarName = $request->input('avatar');

        if ($avatarName) {
            $request->user()->setAvatar($avatarName);
        }

        return $this->sendUpdatedResponse();
    }
}
