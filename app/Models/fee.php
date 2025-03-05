<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * Class Fee
 *
 * @property $id
 * @property $concept
 * @property $issue_date
 * @property $amount
 * @property $paid
 * @property $payment_date
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fee extends Model
{
    use HasFactory;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['concept', 'issue_date', 'amount', 'paid', 'payment_date', 'notes', 'client_name'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'issue_date' => 'date:Y-m-d',
        'payment_date' => 'date:Y-m-d',
    ];

    /**
     * Get the issue date in the desired format.
     *
     * @param  string  $value
     * @return string
     */
    public function getIssueDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Get the payment date in the desired format.
     *
     * @param  string  $value
     * @return string
     */
    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    /**
     * Get the client that owns the fee.
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_name', 'nombre');
    }
}
