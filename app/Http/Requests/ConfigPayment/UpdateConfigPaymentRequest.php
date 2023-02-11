<?php

namespace App\Http\Requests\ConfigPayment;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class UpdateConfigPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('config_payment_edit'), 403);
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fee' => 'required|string|max:255',
            'vat' => 'required|string|max:255'
        ];
    }
}
