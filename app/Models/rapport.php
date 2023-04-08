<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rapport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'order_id',
        'description',
        'is_finish',
    ];



    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
