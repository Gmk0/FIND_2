<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'user_id',
        // 'order_id',
        'amount',
        'payment_method',
        'payment_token',
        'status',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            $transaction->transaction_numero = 'TX' . date('YmdH')
                . rand(10, 99);
        });
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'order_id' => 'integer',
        'amount' => 'decimal:2',
    ];

    // Mutateur pour récupérer le prix formaté avec le dollar direct
    public function getAmountAttribute($value)
    {
        // Formater le prix avec le dollar direct
        return '$' . number_format($value, 2, ',', ' ');
    }



    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function User(){

        return
    }
}