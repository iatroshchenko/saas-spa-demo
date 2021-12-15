<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\BusinessRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Repository\UserRepository;
use App\Service\ShipperManagementService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private ShipperManagementService $business;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(ShipperManagementService $business)
    {
        $this->middleware('guest');
        $this->business = $business;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  BusinessRegisterRequest $request
     * @return RedirectResponse|JsonResponse
     */
    public function register(BusinessRegisterRequest $request)
    {
        $user = $this->business->registerNewBusinessFromRequest($request);
        event(new Registered($user));

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }
}
