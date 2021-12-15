<?php


namespace App\Repository;


use App\DTO\Credentials;
use App\DTO\UserWithCredentials;
use App\Http\Requests\ClientManagement\CreateClientRequest;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Http\Requests\Load\CreateLoadRequest;
use App\Http\Requests\Quote\CreateQuoteRequest;
use App\Http\Requests\Register\BusinessRegisterRequest;
use App\Http\Requests\User\PasswordChangeRequest;
use App\Http\Requests\UserManagement\UpdateStaffUserRequest;
use App\Http\Requests\UserManagement\CreateStaffUserRequest;
use App\Models\ClientMeta;
use App\Models\OwnerMeta;
use App\Models\Setting;
use App\Models\User;
use App\Models\Shipper;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository
{
    public function createOwnerMetaFromRequest(BusinessRegisterRequest $request, User $user): OwnerMeta
    {
        $ownerMetaData = $request->only((new OwnerMeta())->getFillable());
        $ownerMetaData = array_merge($ownerMetaData, [
            'owner_id' => $user->id
        ]);

        return OwnerMeta::create($ownerMetaData);
    }

    public function createBusinessUserFromRequest(BusinessRegisterRequest $request): User
    {
        $user = $this
            ->createBusinessUser($request->all());

        $this->createOwnerMetaFromRequest($request, $user);

        $this->generateTokens($user);

        return $user;
    }

    public function createBusinessUser(array $data): User
    {
        $data['role'] = User::ROLE_BUSINESS;
        $data['status'] = User::STATUS_ACTIVE;
        return $this->createFromArray($data);
    }

    public function createStaffUserFromRequest(CreateStaffUserRequest $request): User
    {
        $data = $request->all();
        $data['shipper_id'] = $request->getShipper()->id;

        $user = $this
            ->createStaffUser($data);
        $user
            ->markEmailAsVerified();

        $user
            ->shippers()
            ->attach($request->getShipper());

        return $user;
    }

    public function createStaffUser(array $data): User
    {
        $data['status'] = User::STATUS_INACTIVE;
        return $this->createFromArray($data);
    }

    public function createFromArrayWithoutPassword(array $data): User
    {
        $fillable = (new User())->getFillable();
        $userData = collect($data)->only($fillable)->all();
        return User::create($userData);
    }

    /* Here we should pass all fillable user fields */
    public function createFromArray(array $data): User
    {
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        }
        $fillable = (new User())->getFillable();
        $userData = collect($data)->only($fillable)->all();
        return User::create($userData);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)
            ->first();
    }

    public function findById(string $id): ?User
    {
        return User::findByPublicId($id);
    }

    public function findByIdAndShipper(string $id, Shipper $shipper)
    {
        return $shipper->users()
            ->where('users.id', $id)
            ->first();
    }

    public function delete(User $user)
    {
        return $user->delete();
    }

    public function deleteById(string $id)
    {
        return $this->delete(
            $this->findById($id)
        );
    }

    public function updateFromRequest(Request $request): User
    {
        $user = $this->findById($request->input('user_id'));
        $fields = collect($request->validated());

        $user->update(
            $fields
                ->only((new User())->getFillable())
                ->all()
        );

        return $user;
    }

    public function getUsersForShipper(Shipper $shipper): Collection
    {
        $users = $shipper
            ->users()
            ->orderByDesc('created_at')
            ->whereNotIn('role', [User::ROLE_CLIENT]);

        if (auth()->user()->isManager()) {
            $users->whereIn('role', [
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER
            ]);
        }

        if (auth()->user()->isAdmin()) {
            $users->whereIn('role', [
                User::ROLE_DRIVER,
                User::ROLE_DISPATCHER,
                User::ROLE_MANAGER
            ]);
        }

        return $users->get();
    }

    public function changeUserPasswordFromRequest(PasswordChangeRequest $request): User
    {
        $password = $request->input('password');
        $user = auth()->user();

        $user->update([
            'password' => Hash::make($password),
            'ask_password_change_next_login' => false
        ]);

        return $user;
    }

    public function markUserAsConfirmed(): bool
    {
        $user = auth()->user();

        if ($user->status === User::STATUS_INACTIVE) {
            $user->update([
                'status' => User::STATUS_ACTIVE
            ]);
        }

        return true;
    }

    /* Clients Block */
    public function getClientsWithLeadsForShipper(Shipper $shipper): Collection
    {
        $users = $shipper
            ->users()
            ->whereIn('role', [
                User::ROLE_CLIENT
            ])
            ->orderByDesc('created_at');

        return $users->get();
    }

    public function getClientsForShipper(Shipper $shipper): Collection
    {
        $users = $shipper
            ->users()
            ->whereIn('role', [
                User::ROLE_CLIENT
            ])
            ->whereNotNull('password')
            ->orderByDesc('created_at');

        return $users->get();
    }

    public function getLeadsForShipper(Shipper $shipper): Collection
    {
        $users = $shipper
            ->users()
            ->whereIn('role', [
                User::ROLE_CLIENT
            ])
            ->whereNull('password')
            ->orderByDesc('created_at');

        return $users->get();
    }

    /* From Contact Request */
    public function createClientFromContactRequestWithCredentials(
        CreateContactRequest $request
    ): UserWithCredentials
    {
        $password = Str::random(10);
        $credentials = new Credentials(
            $request->input('email'),
            $password
        );

        $client = $this
            ->createClientFromContactRequest(
                $request,
                $password
            );

        return new UserWithCredentials(
            $client,
            $credentials
        );
    }

    public function createClientFromContactRequest(
        CreateContactRequest $request,
        string $password
    ): User
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $password,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'ask_password_change_next_login' => true
        ];

        return $this
            ->createClient($data);
    }
    /* From Contact Request */

    /* From Customer Request With Credentials */
    public function createClientFromCustomerRequestWithCredentials(
        CreateCustomerRequest $request
    ): UserWithCredentials
    {
        $password = Str::random(10);
        $credentials = new Credentials(
            $request->input('primary_contact_email'),
            $password
        );

        $client = $this
            ->createClientFromCustomerRequest(
                $request,
                $password
            );

        return new UserWithCredentials(
            $client,
            $credentials
        );
    }

    public function createClientFromCustomerRequest(
        CreateCustomerRequest $request,
        string $password
    ): User
    {
        $data = [
            'email' => $request->input('primary_contact_email'),
            'password' => $password,
            'first_name' => $request->input('primary_contact_first_name'),
            'last_name' => $request->input('primary_contact_last_name'),
            'phone' => $request->input('primary_contact_phone'),
            'ask_password_change_next_login' => true
        ];

        return $this
            ->createClient($data);
    }
    /* From Customer Request With Credentials */

    public function createClientFromQuoteRequestWithCredentials(CreateQuoteRequest $request, bool $isQuote = true): UserWithCredentials
    {
        $password = $isQuote ? null : Str::random(10);
        $credentials = $password ?
            new Credentials($request->input('email'), $password) :
            new Credentials($request->input('email'));

        $client = $password ?
            $this->createClientFromQuoteRequest($request, $password) :
            $this->createClientFromQuoteRequest($request);

        return new UserWithCredentials(
            $client,
            $credentials
        );
    }

    public function createClientFromQuoteRequest(CreateQuoteRequest $request, string $password = null): User
    {
        $request->merge([
            'password' => $password,
            'ask_password_change_next_login' => true
        ]);

        $user = $this
            ->createClient($request->all());

        //        $user
        //            ->markEmailAsVerified();

        $user
            ->shippers()
            ->attach($request->getShipper());

        return $user;
    }

    public function createClientMetaFromQuoteRequest(User $client, CreateQuoteRequest $request): ClientMeta
    {
        return $this
            ->createClientMeta($client, $request->all());
    }

    public function createClientFromLoadRequestWithCredentials(CreateLoadRequest $request): UserWithCredentials
    {
        $password = Str::random(10);
        $credentials = new Credentials($request->input('email'), $password);

        $client = $this->createClientFromLoadRequest($request, $password);

        return new UserWithCredentials(
            $client,
            $credentials
        );
    }

    public function createClientFromLoadRequest(CreateLoadRequest $request, string $password): User
    {
        $request->merge([
            'password' => $password,
            'ask_password_change_next_login' => true
        ]);

        $user = $this
            ->createClient($request->all());

        //        $user
        //            ->markEmailAsVerified();

        $user
            ->shippers()
            ->attach($request->getShipper());

        return $user;
    }

    public function createLead(array $data): User
    {
        $data['status'] = User::STATUS_INACTIVE;
        $data['role'] = User::ROLE_CLIENT;
        return $this->createFromArrayWithoutPassword($data);
    }

    public function createLeadFromRequest(CreateClientRequest $request): User
    {
        $user = $this
            ->createLead($request->all());

        $user
            ->shippers()
            ->attach($request->getShipper());

        return $user;
    }

    public function createClientMetaFromLoadRequest(User $client, CreateLoadRequest $request): ClientMeta
    {
        return $this
            ->createClientMeta($client, $request->all());
    }


    public function createClientFromRequest(CreateClientRequest $request): User
    {
        $user = $this
            ->createClient($request->all());

        //        $user
        //            ->markEmailAsVerified();

        $user
            ->shippers()
            ->attach($request->getShipper());

        return $user;
    }

    public function createClient(array $data): User
    {
        $data['status'] = User::STATUS_INACTIVE;
        $data['role'] = User::ROLE_CLIENT;
        return $this->createFromArray($data);
    }

    public function createClientMetaFromRequest(User $client, CreateClientRequest $request): ClientMeta
    {
        return $this
            ->createClientMeta($client, $request->all());
    }

    public function createClientMeta(User $client, array $data): ClientMeta
    {
        $fillable = (new ClientMeta())->getFillable();
        $clientMetaData = collect($data)->only($fillable)->all();
        $clientMetaData['client_id'] = $client->id;
        return ClientMeta::create($clientMetaData);
    }


    /**
     * @param User $user
     */
    public function generateTokens(User $user)
    {
        foreach (PersonalAccessTokenRepository::$memberTokens as $name => $accessRules) {
            $token = $user->createToken($name, $accessRules);

            $keyParts = explode('|', $token->plainTextToken);
            $value = array_pop($keyParts);

            Setting::create([
                'entity_id' => $user->id,
                'entity_type' => $user->getMorphClass(),
                'key' => SettingRepository::$tokenToKeyMap[$name],
                'value' => $value
            ]);
        }
    }
}
