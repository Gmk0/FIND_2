<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'etat',
        'delai_livraison_estimee',
        'commentaires',
        'satisfaction',
        'problemes',
        'actions_correctives',
        'remarques_internes',
        'is_publish',
    ];


    public function order(): BelongsTo
    {
        return $this->belongsTo(order::class);
    }
}
