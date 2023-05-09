<?php

namespace App\Listeners;

use App\Events\FeedbackSend;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FeedbackNotifaction
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
    public function handle(FeedbackSend $event): void
    {
        // Récupérer le freelance associé au service commandé

        dd($event);
        $freelancerId = $event->feedback->order->service->freelance->user->id;

        // dd($freelancerId);
        // Créer une nouvelle notification pour le freelance
        $notification = new Notification([
            'user_id' => $freelancerId,
            'type' => 'feedback',
            'content' => 'Vous un recu un notes pour votre commande.',
            'data' => [[
                'id' => $event->feedback->order->id,
                'user' => $event->feedback->order->user->name,


            ]],
            'is_read' => false
        ]);

        // Sauvegarder la notification dans la base de données
        $notification->save();
        //
    }
}