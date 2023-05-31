<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Uuid\Uuid;

class Project extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        //'user_id',
        'category_id',
        // 'sub_category',
        'description',
        'files',
        'bid_amount',
        'begin_project',
        'end_project',
        'status',
        'is_paid',
        ''
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
            $model->user_id = auth()->user()->id;
        });

        static::created(function ($model) {

            FeedbackService::create(['project_id' => $model->id]);
        });

        static::deleted(function ($model) {

            FeedbackService::where('project_id', $model->id)->delete();
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
        'category_id' => 'integer',
        'sub_category' => 'array',
        'files' => 'array',
        'bid_amount' => 'decimal:2',
        'begin_project' => 'datetime',
        'end_project' => 'datetime',
    ];




    public function bidAmount()
    {
        // Formater le prix avec le dollar direct
        return '$' . number_format($this->bid_amount, 2, ',', ' ');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function projectResponses(): HasMany
    {
        return $this->hasMany(ProjectResponse::class);
    }

    public function projectRepsonsesCount()
    {

        $project = $this->projectResponses->count();

        return $project;
    }

    public function transaction(): BelongsTo
    {

        return $this->belongsTo(Transaction::class);
    }

    public function feedbackProjet(): HasOne
    {

        return $this->hasOne(FeedbackService::class, 'project_id');
    }


    public function conversationProjects(): HasMany
    {
        return $this->hasMany(ConversationProject::class);
    }
}
