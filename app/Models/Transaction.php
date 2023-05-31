<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;



    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',

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
            $transaction->id =
                Str::uuid()->toString();
            $transaction->user_id = auth()->user()->id;
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
        'id' => 'string',
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

    public function project(): HasOne
    {

        return $this->hasOne(Project::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
