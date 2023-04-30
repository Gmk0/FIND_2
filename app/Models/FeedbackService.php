<?php

namespace App\Models;

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


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}