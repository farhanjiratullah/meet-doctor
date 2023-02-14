<?php

namespace App\Http\Requests\Frontsite\Payment;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'appointment_id' => 'required|integer|exists:appointments,id',
            'fee_doctor' => 'required|integer',
            'fee_specialist' => 'required|integer',
            'fee_hospital' => 'required|integer',
            'sub_total' => 'required|integer',
            'vat' => 'required|integer',
            'total' => 'required|integer',
        ];
    }
}
