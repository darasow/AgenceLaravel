<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProprieteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'surface' => ['required', 'integer', 'min:10'],
            'nombreDePiece' => ['required', 'integer', 'min:1'],
            'nombreDeChambre' => ['required', 'integer', 'min:0'],
            'etage' => ['required', 'integer', 'min:0'],
            'prix' => ['required', 'integer', 'min:0'],
            'ville' => ['required', 'min:3'],
            'codePostale' => ['required',  'min:3'],
            'adresse' => ['required',  'min:3'],
            'vendu' => ['required', 'boolean'],
            'options' => ['array', 'exists:options,id', 'required'],
        ];

        // https://tailwindcomponents.com/components/inputs
    }
}
