<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property $id
 * @property $cif
 * @property $nombre
 * @property $telefono
 * @property $correo
 * @property $cuenta_corriente
 * @property $pais
 * @property $moneda
 * @property $importe_cuota_mensual
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cif', 'nombre', 'telefono', 'correo', 'cuenta_corriente', 'pais', 'moneda', 'importe_cuota_mensual'];

    public function fees()
    {
        return $this->hasMany(Fee::class, 'client_name', 'nombre');
    }

}
