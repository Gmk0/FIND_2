<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Ramsey\Uuid\Uuid;

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
            //$transaction->id = Uuid::uuid4()->toString();
            $transaction->transaction_numero = 'TC' . date('YmdH')
                . rand(10, 99);
        });
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'user_id' => 'integer',
        'payment_method' => 'array',

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
}
