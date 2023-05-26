<?php

namespace App\Models;

use App\Events\OrderCreated;
use App\Notifications\OrderNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Ramsey\Uuid\Uuid;

use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     ,
     * @var array
     */
    protected $fillable = [

        // 'id',
        'user_id',
        'service_id',
        'order_numero',
        // 'freelance_id',
        'transaction_id',
        'status',
        'quantity',
        'type',
        'progress',
        'total_amount',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->id = Str::uuid()->toString();
            // $order->user_id = auth()->user()->id;
            $order->order_numero = 'CMD' . date('YmdH') . rand(10, 99);
        });

        static::created(function ($order) {

            FeedbackService::create(['order_id' => $order->id]);
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
        'freelance_id' => 'integer',
        'quantity' => 'integer',
        'service_id' => 'integer',
        'total_amount' => 'decimal:2',
        'transaction_id' => 'string',
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
