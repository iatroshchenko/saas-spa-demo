<?php

namespace App\Http\Requests\Shipper;

use App\Http\Requests\FormRequest;
use App\Models\User;
use App\Repository\LoadRepository;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use App\Models\Shipper;

class AssignDriverToLoadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $shippers = app(ShipperRepository::class);
        $shipper = $shippers->findById($this->input('shipper_id'));
        return $this->user()->can('assign-loads-to-drivers-for-shipper', $shipper);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shipper_id' => [
                'required',
                'exists:shippers,' . Shipper::publicKey(),
                function ($attribute, $value, $fail) {
                    $shippers = app(ShipperRepository::class);
                    $shipper = $shippers->findById($value);

                    if ($shipper) {
                        if (!$this->user()->isMemberOf($shipper)) {
                            $fail($attribute . ' is invalid, ' . ' this user does not belong to this shipper');
                        }
                    }
                }
            ],

            'load_id' => [
                'required',
                'exists:loads,id',
                function ($attribute, $value, $fail) {
                    $shippers = app()->make(ShipperRepository::class);
                    $loads = app(LoadRepository::class);

                    $shipper = $shippers->findById($this->input('shipper_id'));
                    $load = $loads->findById($value);

                    if ($load && $shipper) {
                        if ($shipper->id !== $load->shipper->id) {
                            $fail($attribute . ' is invalid, ' . ' this load does not belong to this shipper');
                        }
                    }
                }
            ],
            'driver_id' => [
                'required',
                'exists:users,' . User::publicKey(),
                function ($attribute, $value, $fail) {
                    $shippers = app()->make(ShipperRepository::class);
                    $users = app(UserRepository::class);

                    $shipper = $shippers->findById($this->input('shipper_id'));
                    $driver = $users->findById($value);

                    if ($driver && $shipper) {
                        if (!$driver->isMemberOf($shipper)) {
                            $fail($attribute . ' is invalid, ' . ' this driver does not belong to this shipper');
                        }
                    }
                }
            ]
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'shipper_id' => $this->route('shipper')
        ]);
    }
}
