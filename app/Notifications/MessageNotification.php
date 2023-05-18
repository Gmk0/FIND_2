<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\PusherPushNotifications\PusherChannel;
use Pusher\PushNotifications\PushNotifications;
use NotificationChannels\PusherPushNotifications\PusherMessage;

class MessageNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return [PusherChannel::class, "database"];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' =>
            'Vous avez un nouveau message de ' . $this->message->senderUser->name,
            'url' => '/user/messages' . $this->message->id,
            'icon' => '/img/notification-icon.png',
            'user'
        ];
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
                    "title" => "Nouveau Message !",
                    "body" =>
                    'Vous avez une nouveau message de ' . $this->message->senderUser->name,
                    "deep_link" => "http://localhost:8000/freelance/commande",
                    "icon" => "http://localhost:8000/images/logo/find_01.png",
                    "data" => array(
                        "message" => "salut",
                        "user" => "gmk",
                    ),
                ),
            ),
        );

        $beamsClient->publishToInterests(array($interests), $data);
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
