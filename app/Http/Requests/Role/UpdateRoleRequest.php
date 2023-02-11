<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('role_edit'), 403);
        // dd($this->all());
        
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
            'name' => [
                'required',
                'string',
                'max:255', 
                Rule::unique('roles')->ignore($this->role)
            ],
            'permissions' => 'nullable|array',
            'permissions.*' => 'integer'
         ];
    }
}
