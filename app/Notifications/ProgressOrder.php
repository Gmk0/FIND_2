<?php

namespace App\Notifications;

use App\Models\FeedbackService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


use NotificationChannels\PusherPushNotifications\PusherChannel;
use Pusher\PushNotifications\PushNotifications;
use NotificationChannels\PusherPushNotifications\PusherMessage;

class ProgressOrder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $feedback;
    public function __construct(FeedbackService $feedback)
    {
        //

        $this->feedback = $feedback;
    }

    public function via($notifiable)
    {
        return [PusherChannel::class, "database", "mail"];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Nouvelle progression de ' . $this->feedback->order->progress . ' pour le service ' . $this->feedback->order->service->title,
            'url' => '/feedbacks/' . $this->feedback->id,
            'icon' => '/img/notification-icon.png',
        ];
    }


    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Nouvelle Commande de.')
            ->action('Notification Action', url('/feedbacks/' . $this->feedback->id))
            ->line('Thank you for using our application!');
    }

    public function toPushNotification($notifiable)
    {
        $beamsClient = new PushNotifications(array(
            "instanceId" => config('services.pusher.beams_instance_id'),
            "secretKey" => config('services.pusher.beams_secret_key'),
        ));

        $interests = "App.Models.User.{$notifiable->id}";

        $data = array(
            "web" => array(
                "notification" => array(
                    "title" => "Nouvelle commande !",
                    "body" => 'Nouvelle progression de ' . $this->feedback->order->progress . ' pour le service ' . $this->feedback->order->service->title,
                    "deep_link" => "http://localhost:8000/freelance/commande",
                    "icon" => "http://localhost:8000/images/logo/find_01.png",
                    "data" => array(
                        "foo" => "bar",
                        "baz" => "qux",
                    ),
                ),
            ),
        );

        $beamsClient->publishToInterests(array($interests), $data);
    }
}