<?php

namespace App\Http\Requests\Shipper;

use App\Http\Requests\FormRequest;
use App\Models\Shipper;
use App\Repository\ShipperRepository;
use Illuminate\Validation\Rule;

class GetShipperEmailTemplatesRequest extends FormRequest
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
        return $this->user()->can('get-shipper-email-templates', $shipper);
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
            ]
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'shipper_id' => $this->route('shipper')
        ]);
    }
}
