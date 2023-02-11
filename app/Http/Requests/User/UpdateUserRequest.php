<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), 403);

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
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user)
            ],
            'roles' => 'required|array',
            'roles.*' => 'integer',
            'type_user_id' => 'required|integer|exists:type_users,id'
        ];
    }
}
