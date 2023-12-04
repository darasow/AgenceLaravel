<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactProprieteRequest extends FormRequest
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
            'nom' => ['required', 'min:3', 'string'],
            'prenom' => ['required', 'min:3', 'string'],
            'telephone' => ['required', 'min:9', 'string'],
            'email' => ['required', 'min:4', 'email'],
            'message' => ['required', 'min:4', 'string'],
        ];
    }
}
