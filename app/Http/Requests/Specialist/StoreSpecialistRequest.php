<?php

namespace App\Http\Requests\Specialist;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class StoreSpecialistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('specialist_create'), 403);

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
            'name' => 'required|string|max:255|unique:specialists',
            'price' => 'required|string|max:255'
        ];
    }
}
