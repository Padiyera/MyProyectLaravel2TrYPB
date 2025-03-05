<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeRequest extends FormRequest
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
            'concept' => 'required|string',
            'issue_date' => 'required|date_format:d/m/Y',
            'amount' => 'required|numeric',
            'paid' => 'required|boolean',
            'payment_date' => 'nullable|date_format:d/m/Y',
            'notes' => 'nullable|string',
            'client_name' => 'required|string', // Añadir esta línea
        ];
    }
}
