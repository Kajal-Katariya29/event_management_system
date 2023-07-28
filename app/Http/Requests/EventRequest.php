<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required',
            'event_category_id' => 'required',
            'organizer_id' => 'required',
            'venue_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'event_category_id.required' => 'Please select this feild !!',
            'venue_id.required' => 'Please select this feild !!',
            'status.required' => 'Please select this feild !!',
        ];
    }
}
