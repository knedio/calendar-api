<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class AddMultipleEventRequest extends FormRequest
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
     * Customize Attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'description'   => 'Event',
            'dates'        => 'Dates',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        \Log::info(request());
        return [
            'description'   => 'required',
            'dates'        => 'required|array',
        ];
    }
}
