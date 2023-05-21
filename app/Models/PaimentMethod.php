<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaimentMethod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     ,
     * @var array
     */

    protected $fillable = ['mobile', 'carte', 'virement', 'addresse'];



    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });
    }

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'mobile' => AsArrayObject::class,
        'addresse' => AsArrayObject::class,

    ];
}