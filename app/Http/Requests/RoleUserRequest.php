<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUserRequest extends FormRequest
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
            'role_id' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'role_id.required' => 'Please select this feild !!',
            'user_id.required' => 'Please select this feild !!'
        ];
    }
}
