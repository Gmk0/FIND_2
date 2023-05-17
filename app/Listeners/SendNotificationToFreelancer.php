<?php

namespace App\Listeners;

use App\Events\ServiceOrdered;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationToFreelancer
{
    use InteractsWithQueue;

    public function handle(ServiceOrdered $event)
    {
        // Récupérer le freelance associé au service commandé
        $freelancerId = $event->order->service->freelance->user->id;

        // dd($freelancerId);
        // Créer une nouvelle notification pour le freelance
        $notification = new Notification([
            'user_id' => $freelancerId,
            'type' => 'service_commande',
            'content' => 'Vous avez une nouvelle commande pour votre service.',
            'data' => [[
                'id' => $event->order->id,
                'user' => $event->order->user->name,
            ]],
            'read_at' => false
        ]);

        // Sauvegarder la notification dans la base de données
        $notification->save();
    }
}
