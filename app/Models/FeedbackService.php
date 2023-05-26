<?php

namespace App\Models;

use App\Events\ProgressOrderEvent;

use App\Notifications\ProgressOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedbackService extends Model
{
    use HasFactory;


    use HasFactory;

    protected $fillable = [
        'order_id',
        'etat',
        'delai_livraison_estimee',
        'commentaires',
        'satisfaction',
        'problemes',
        'actions_correctives',
        'is_publish',
    ];


    protected $dispatchesEvents = [

        'updated' => ProgressOrderEvent::class,
        'created' => ProgressOrderEvent::class,
    ];


    protected $casts = [

        'id' => 'integer',
        'order_id' => 'string',

    ];

    public function notifyUser()
    {
        $order = $this->order;



        if ($order) {
            $user = $order->user;

            if ($user) {

                $user->notify(new ProgressOrder($this));
            }
        }
    }


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
