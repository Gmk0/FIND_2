<?php

namespace App\Models;

use App\Events\ProjectResponse as EventsProjectResponse;
use App\Notifications\ProjetConfirmation;
use App\Notifications\ProjetStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class ProjectResponse extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        'freelance_id',
        'project_id',
        'content',
        'bid_amount',
        'status',

    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }

    protected $dispatchesEvents = [
        'created' => EventsProjectResponse::class,
    ];

    public function notifyUser()
    {
        $user = $this->project->user;



        if ($user) {

            $user->notify(new ProjetStatus($this));
        }
    }

    public function notifyFreelance()
    {
        $user = $this->freelance->user;



        if ($user) {

            $user->notify(new ProjetConfirmation($this));
        }
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'freelance_id' => 'integer',
        'project_id' => 'string',
        'bid_amount' => 'decimal:2',
    ];

    public function getBudget()
    {

        return $this->bid_amount * 100;
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function freelance(): BelongsTo
    {
        return $this->belongsTo(Freelance::class);
    }


    public function messageForProjects(): HasMany
    {
        return $this->hasMany(MessageForProject::class);
    }
}
