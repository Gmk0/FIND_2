<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'content',
        'data',
        'is_read',
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'data' => 'array',
        'user_id' => 'integer',

    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'data->order_id', 'id');
    }
}
