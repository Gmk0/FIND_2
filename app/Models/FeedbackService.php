<?php

namespace App\Models;

use App\Events\ProgressOrderEvent;
use App\Notifications\feedbackNotification;
use App\Notifications\ProgressOrder;
use App\Notifications\progressProjet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedbackService extends Model
{
    use HasFactory;


    use HasFactory;

    protected $fillable = [
        'order_id',
        'project_id',
        'etat',
        'delai_livraison_estimee',
        'commentaires',
        'satisfaction',
        'problemes',
        'actions_correctives',
        'is_publish',
    ];





    protected $casts = [

        'id' => 'integer',
        'order_id' => 'string',
        'project_id' => 'string',

    ];

    public function notifyUser()
    {
        $order = $this->order;



        if ($order) {
            $user = $order->user;

            if ($user) {

                $user->notify(new ProgressOrder($this));
            }
        }
    }

    public function notifyUserProjet()
    {
        $project = $this->project;




        if ($project) {
            $user = $project->user;



            if ($user) {

                $user->notify(new progressProjet($this));
            }
        }
    }

    public function notifyFreelance()
    {
        $user = $this->order->service->freelance->user;





        if ($user) {

            $user->notify(new feedbackNotification($this));
        }
    }

    public function notifyFreelanceProjet(User $user)
    {






        if ($user) {

            $user->notify(new feedbackNotification($this));
        }
    }


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}