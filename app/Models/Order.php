<?php

namespace App\Models;

use App\Events\OrderCreated;
use App\Notifications\OrderNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     ,
     * @var array
     */
    protected $fillable = [
        'user_id',
        'service_id',
        'freelance_id',
        'status',
        'quantity',
        'type',
        'progress',
        'total_amount',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($commande) {
            $commande->order_numero = 'CMD' . date('YmdH') . rand(10, 99);
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
        'freelance_id' => 'integer',
        'service_id' => 'integer',
        'total_amount' => 'decimal:2',
    ];

    protected $dispatchesEvents = [
        'created' => OrderCreated::class,
    ];


    public function notifyUser()
    {
        $service = $this->service;

        if ($service) {
            $freelance = $service->freelance;

            if ($freelance) {
                $user = $freelance->user;


                $user->notify(new OrderNotification($this));
            }
        }
    }



    public function getTotalAmountAttribute($value)
    {
        // Formater le prix avec le dollar direct
        return '$' . number_format($value, 2, ',', ' ');
    }

    public function transaction(): belongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function rapports(): HasMany
    {
        return $this->HasMany(rapport::class);
    }


    public function feedback(): HasOne
    {
        return $this->hasOne(FeedbackService::class);
    }
    public function notification()
    {
        return $this->hasOne(Notification::class, 'data->order_id');
    }
}
