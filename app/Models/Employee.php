<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @property $id
 * @property $dni
 * @property $nombre
 * @property $correo
 * @property $telefono
 * @property $direccion
 * @property $fecha_alta
 * @property $tipo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['dni', 'nombre', 'correo', 'telefono', 'direccion', 'fecha_alta', 'tipo'];


}
