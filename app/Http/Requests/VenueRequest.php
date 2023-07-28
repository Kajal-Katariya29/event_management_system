<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VenueRequest extends FormRequest
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
            'country_id' => 'required',
            'city_id' => 'required',
            'venue_name' => 'required',
            'address' => 'required',
            'pin_code' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'country_id.required' => 'Please Select this feild !!',
            'city_id.required' => 'Please Select this feild !!'
        ];
    }
}
