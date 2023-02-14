<?php

namespace App\Http\Requests\Frontsite\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'doctor_id' => 'required|integer|exists:doctors,id',
            'user_id' => 'required|integer|exists:users,id',
            'consultation_id' => 'required|integer|exists:consultations,id',
            'level' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
            'status' => 'required|integer|max:255'
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'user_id' => auth()->id(),
            'status' => 2
        ]);
    }
}
