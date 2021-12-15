<?php

namespace App\Http\Requests\Shipper\MailTemplate;

use App\Models\Shipper;
use App\Repository\ShipperRepository;
use App\Http\Requests\FormRequest;

class DeleteSelectedMailTemplatesRequest extends FormRequest
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
            ],
            'templates.*' => [
                'required',
                'string',
                'exists:shipper_mail_templates,' . Shipper\ShipperMailTemplate::publicKey(),
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
