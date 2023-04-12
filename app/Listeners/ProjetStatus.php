<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Notification;
use App\Events\ProjectResponse as Response;

class ProjetStatus
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */


    /**
     * Handle the event.
     */
    public function handle(Response $event): void
    {
        $freelancerId = $event->response->freelance->user->id;

        //dd($event->response->id);

        // dd($freelancerId);
        // Créer une nouvelle notification pour le freelance
        $notification = new Notification([
            'user_id' => $freelancerId,
            'type' => 'Proposition',
            'content' => 'Vous avez recu la reponse a votre proposition.',
            'data' => [
                'ProjectResponse_id' => $event->response->id,
                'status' => $event->response->status,
                'client' => $event->response->project->user->name,
            ],
            'is_read' => false
        ]);

        // Sauvegarder la notification dans la base de données
        $notification->save();
        //
    }
}
