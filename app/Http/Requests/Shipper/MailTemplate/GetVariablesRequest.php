<?php

namespace App\Http\Requests\Shipper\MailTemplate;

use App\Http\Requests\FormRequest;
use App\Repository\ShipperRepository;

class GetVariablesRequest extends FormRequest
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
            //
        ];
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'shipper_id' => $this->route('shipper')
        ]);
    }
}
