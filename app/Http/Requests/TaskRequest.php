<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
			'client_id' => 'required',
			'persona_contacto' => 'required|string',
			'telefono_contacto' => 'required|string',
			'descripcion' => 'required|string',
			'correo_electronico' => 'required|string',
			'direccion' => 'required|string',
			'poblacion' => 'required|string',
			'codigo_postal' => 'required|string',
			'provincia' => 'required',
			'estado' => 'required',
			'fecha_creacion' => 'required',
			'operario_encargado' => 'required|string',
			'fecha_realizacion' => 'required',
			'anotaciones_anteriores' => 'string',
			'anotaciones_posteriores' => 'string',
			'fichero_resumen' => 'string',
        ];
    }
}
