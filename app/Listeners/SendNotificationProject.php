<?php

namespace App\Listeners;

use App\Events\ProjectResponseFreelance;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationProject
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProjectResponseFreelance $event): void
    {


        $user = $event->response->project->user_id;




        try {

            // Créer une nouvelle notification pour le freelance
            $notification = new Notification([
                'user_id' => $user,
                'type' => 'Proposition',
                'content' => 'Vous avez recu une proposition. pour votre mission',
                'data' => [[
                    'id' => $event->response->project->id,
                    'user' => $event->response->project->user->name,
                ]],
                'is_read' => false
            ]);

            // Sauvegarder la notification dans la base de données
            $notification->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        // dd($freelancerId);

        //

        //
    }
}