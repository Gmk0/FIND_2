<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'basic_price',
        'basic_support',
        'basic_revision',
        'basic_delivery_time',
        'premium_price',
        'premium_support',
        'premium_revision',
        'premium_delivery_time',
        'sub_categorie',
        'extra_price',
        'extra_support',
        'extra_revision',
        'extra_delivery_time',
        'samples',
        'files',
        'format',
        'video_url',
        'view_count',
        'like',
        'is_publish',
        'freelance_id',
        'category_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'basic_price' => 'decimal:2',
        'premium_price' => 'decimal:2',
        'extra_price' => 'decimal:2',
        'view_count' => 'integer',
        'like' => 'integer',
        'files'=>'array',
        'Sub_categorie'=>'array',
        'freelance_id' => 'integer',
        'category_id' => 'integer',
    ];

    
    public function favoris(): BelongsTo
    {
        return $this->belongsTo(Favoris::class);
    }

    public function freelance(): BelongsTo
    {
        return $this->belongsTo(Freelance::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
