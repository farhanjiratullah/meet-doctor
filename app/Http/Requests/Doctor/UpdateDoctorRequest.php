<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class UpdateDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('doctor_edit'), 403);

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
            'name' => 'required|string|max:255',
            'specialist_id' => 'required|exists:specialists,id',
            'fee' => 'required|string|max:255',
            'photo' => 'nullable|mimes:jpeg,jpg,svg,png|max:10240',
        ];
    }
}
