<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveClockRequest extends FormRequest
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
            'start' => 'required',
            'end' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'start.required' => 'La date de début est requise (dd/mm/yyyy, hh:ss)',
            'end.required' => 'La date de fin est requise (dd/mm/yyyy, hh:ss)',
        ];
    }
}
