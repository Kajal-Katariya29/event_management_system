<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SponserRequest extends FormRequest
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
            'sponser_name' => 'required|string|max:128',
            'sponser_level' => 'required',
        ];
    }
}
