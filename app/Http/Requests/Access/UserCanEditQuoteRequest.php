<?php

namespace App\Http\Requests\Access;

use App\Models\Quote;
use App\Repository\QuoteRepository;
use Illuminate\Foundation\Http\FormRequest;

class UserCanEditQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'quote_id' => [
                'required',
                'integer',
                'exists:quotes,id',
                function ($attr, $value, $fail) {
                    $quotes = app(QuoteRepository::class);
                    $quote = $quotes->findById($value);

                    if ($quote && $quote->isDeleted()) {
                        $fail('This order is deleted');
                    }
                }
            ]
        ];
    }
}
