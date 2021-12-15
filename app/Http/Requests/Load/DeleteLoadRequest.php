<?php

namespace App\Http\Requests\Load;

use App\Repository\LoadRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Repository\ShipperRepository;
use App\Models\Shipper;

class DeleteLoadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $loads = app(LoadRepository::class);
        $load = $loads->findById($this->input('load_id'));
        return $this->user()->can('delete-load', $load);
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
                    $shippers = app(ShipperRepository::class);
                    $loads = app(LoadRepository::class);

                    $load = $loads->findById($value);
                    $shipper = $shippers->findById($this->input('shipper_id'));

                    if ($shipper && $load) {
                        if ($shipper->id !== $load->shipper->id) {
                            $fail($attribute . ' is invalid, ' . ' this load does not belong to this shipper');
                        }
                    }
                },
            ]
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'shipper_id' => $this->route('shipper'),
            'load_id' => $this->route('load')
        ]);
    }
}
