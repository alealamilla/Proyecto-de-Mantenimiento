<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceptionRequest extends FormRequest
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
            'owner_id' => 'required|integer|exists:owners,id',
            'car_id' => 'required|integer|exists:cars,id',
			'reason' => 'nullable|string',
            'status_id' => 'required|integer|exists:statuses,id',
			'reception_date' => 'required|date',
			'next_reception' => 'nullable|date',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
