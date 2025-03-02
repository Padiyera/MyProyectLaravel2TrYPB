<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
			'cif' => 'required|string',
			'nombre' => 'required|string',
			'telefono' => 'required|string',
			'correo' => 'required|string',
			'cuenta_corriente' => 'required|string',
			'pais' => 'required|string',
			'moneda' => 'required|string',
			'importe_cuota_mensual' => 'required',
        ];
    }
}
