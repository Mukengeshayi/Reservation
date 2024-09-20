<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationStoreRequest extends FormRequest
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
            'salle_id' => 'required|exists:salles,id',
            'reservation_date' => 'required|date|after_or_equal:today',
            'start_time_reservation' => 'required|date_format:H:i',
            'end_time_reservation' => [
                'required',
                'date_format:H:i',
                'after:start_time_reservation',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'salle_id.required' => 'La salle est obligatoire.',
            'salle_id.exists' => 'La salle sélectionnée n\'existe pas.',

            'reservation_date.required' => 'La date de réservation est obligatoire.',
            'reservation_date.date' => 'Veuillez entrer une date valide.',
            'reservation_date.after_or_equal' => 'La date de réservation ne peut pas être antérieure à aujourd\'hui.',

            'start_time_reservation.required' => 'L\'heure de début est obligatoire.',
            'start_time_reservation.date_format' => 'L\'heure de début doit être au format HH:MM.',

            'end_time_reservation.required' => 'L\'heure de fin est obligatoire.',
            'end_time_reservation.date_format' => 'L\'heure de fin doit être au format HH:MM.',
            'end_time_reservation.after' => 'L\'heure de fin doit être après l\'heure de début.',

        ];
    }
}
