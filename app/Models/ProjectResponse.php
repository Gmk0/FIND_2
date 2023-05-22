<?php

namespace App\Models;

use App\Events\ProjectResponse as EventsProjectResponse;
use App\Notifications\ProjetStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectResponse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'freelance_id',
        'project_id',
        'content',
        'bid_amount',
        'status',

    ];

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'freelance_id' => 'integer',
        'project_id' => 'integer',
        'bid_amount' => 'decimal:2',
    ];

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