<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'reception_id' => 'required|integer|exists:receptions,id',
            'service_id' => 'nullable|integer|exists:services,id',
            'sparepart_id' => 'required|integer|exists:spareparts,id',
            'time' => 'nullable|date',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
