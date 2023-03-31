<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageProject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'projectResponse_id',
        'body',
        'is_read',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sender_id' => 'integer',
        'receiver_id' => 'integer',
        'projectResponse_id' => 'integer',
    ];

    public function projectResponse(): BelongsTo
    {
        return $this->belongsTo(ProjectResponse::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function freelance(): BelongsTo
    {
        return $this->belongsTo(Freelance::class);
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function projectResponse(): BelongsTo
    {
        return $this->belongsTo(ProjectResponse::class);
    }
}
