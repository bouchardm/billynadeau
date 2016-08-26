<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCarRequest extends FormRequest
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
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required|numeric',
            'customer_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'marque.required' => 'La marque est requise.',
            'modele.required' => 'Le modèle est requis.',
            'annee.required' => "L'année est requise.",
            'annee.numeric' => "L'année doit être un chiffre.",
            'customer_id.required' => 'Le client est requis.'
        ];
    }


}
