<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalleStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'place' => 'required|integer|min:1',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de la salle est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères valide.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',

            'place.required' => 'Nombre de place est obligatoire.',
            'place.integer' => 'Nombre de place doit être un nombre entier.',
            'place.min' => 'Nombre de place doit être au minimum de 1 personne.',
        ];
    }
}
