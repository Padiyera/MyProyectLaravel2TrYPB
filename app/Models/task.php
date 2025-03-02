<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 *
 * @property $id
 * @property $client_id
 * @property $persona_contacto
 * @property $telefono_contacto
 * @property $descripcion
 * @property $correo_electronico
 * @property $direccion
 * @property $poblacion
 * @property $codigo_postal
 * @property $provincia
 * @property $estado
 * @property $fecha_creacion
 * @property $operario_encargado
 * @property $fecha_realizacion
 * @property $anotaciones_anteriores
 * @property $anotaciones_posteriores
 * @property $fichero_resumen
 * @property $created_at
 * @property $updated_at
 *
 * @property Client $client
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Task extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id', 
        'persona_contacto', 
        'telefono_contacto', 
        'descripcion', 
        'correo_electronico', 
        'direccion', 
        'poblacion', 
        'codigo_postal', 
        'provincia', 
        'estado', 
        'fecha_creacion', 
        'operario_encargado', 
        'fecha_realizacion', 
        'anotaciones_anteriores', 
        'anotaciones_posteriores', 
        'fichero_resumen'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class, 'client_id', 'nombre');
    }
    
}
