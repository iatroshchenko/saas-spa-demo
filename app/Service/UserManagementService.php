<?php


namespace App\Service;


use App\DTO\Credentials;
use App\Http\Requests\User\ChangeEmailRequest;
use App\Http\Requests\User\RequestEmailChangeRequest;
use App\Http\Requests\UserManagement\DeleteStaffUserRequest;
use App\Http\Requests\User\PasswordChangeRequest;
use App\Http\Requests\User\SendCredentialsRequest;
use App\Http\Requests\UserManagement\UpdateStaffUserRequest;
use App\Http\Requests\UserManagement\CreateStaffUserRequest;
use App\Models\User;
use App\Models\Shipper;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use App\TemplateMail\CredentialsTemplateMail;
use App\TemplateMail\EmailChangeVerificationTemplateMail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class UserManagementService
{
    private UserRepository $users;
    private ShipperRepository $shippers;

    public function __construct(
        UserRepository $users,
        ShipperRepository $shippers
    )
    {
        $this->users = $users;
        $this->shippers = $shippers;
    }

    public function getAdminsForShipper(Shipper $shipper)
    {
        return $shipper->users()
            ->where('role', User::ROLE_ADMIN)
            ->get();
    }

    public function getManagersForShipper(Shipper $shipper)
    {
        return $shipper->users()
            ->where('role', User::ROLE_MANAGER)
            ->get();
    }

    public function getDispatchersForShipper(Shipper $shipper)
    {
        return $shipper->users()
            ->where('role', User::ROLE_DISPATCHER)
            ->get();
    }

    public function getDriversForShipper(Shipper $shipper)
    {
        return $shipper->users()
            ->where('role', User::ROLE_DRIVER)
            ->get();
    }

    public function createStaffUserFromRequest(CreateStaffUserRequest $request)
    {
        return $this
            ->users
            ->createStaffUserFromRequest($request);
    }

    public function updateUserFromRequest(UpdateStaffUserRequest $request): User
    {
        $userId = $request->input('user_id');

        return $this
            ->users
            ->updateFromRequest($request);
    }

    public function deleteUserFromRequest(DeleteStaffUserRequest $request): bool
    {
        $userId = $request->input('user_id');

        return $this
            ->users
            ->deleteById($userId);
    }

    public function getUsersForShipper(Shipper $shipper): Collection
    {
        return $this
            ->users
            ->getUsersForShipper($shipper);
    }

    public function changeUserPasswordFromRequest(PasswordChangeRequest $request): User
    {
        return $this
            ->users
            ->changeUserPasswordFromRequest($request);
    }

    public function markUserAsConfirmed(): bool
    {
        return $this
            ->users
            ->markUserAsConfirmed();
    }

    public function sendCredentialsFromRequest(SendCredentialsRequest $request): bool
    {
        $credentials = new Credentials(
            $request->input('email'),
            $request->input('password')
        );

        $user = $this
            ->users
            ->findByEmail($request->input('email'));

        $shipper = $this
            ->shippers
            ->findById($request->input('shipper_id'));

        Mail::to($user->email)
            ->send(new CredentialsTemplateMail(
                $shipper,
                $credentials
            ));

        return true;
    }

    public function requestEmailChange(RequestEmailChangeRequest $request): bool
    {
        $oldEmail = $request->input('old_email');
        $user = $this->users->findByEmail($oldEmail);
        $email = $request->input('email');

        $url = URL::temporarySignedRoute(
            'verify-new-email',
            now()->addHour(),
            [
                'user' => $user->id,
                'email' => $email
            ]
        );

        $shipper = $user->getShipper();

        Mail::to($email)
            ->send(new EmailChangeVerificationTemplateMail(
                $shipper,
               $user,
               $email,
               $url
            ));

        return true;
    }

    public function changeEmailFromRequest(ChangeEmailRequest $request): bool
    {
        $user = $this
            ->users
            ->findById($request->input('user_id'));

        // if user goes to link second time or more
        if ($user->email === $request->input('email')) return true;

        $this
            ->users
            ->updateFromRequest($request);

        return true;
    }
}
