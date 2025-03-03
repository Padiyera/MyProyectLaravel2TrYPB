<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['concept', 'issue_date', 'amount', 'paid', 'payment_date', 'notes'];


}
