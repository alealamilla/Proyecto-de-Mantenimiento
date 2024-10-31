<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'color_id' => 'required|integer|exists:colors,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'type_id' => 'required|integer|exists:types,id',
			'placas' => 'required|string',
			'year' => 'nullable|string',
        ];
    }
}
