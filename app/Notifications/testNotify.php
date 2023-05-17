<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\PusherPushNotifications\PusherChannel;
use NotificationChannels\PusherPushNotifications\PusherMessage;

use NotificationChannels\PusherPushNotifications\PusherPushNotificationsMessage;
use NotificationChannels\PusherPushNotifications\PusherPushNotificationsPlatform;
use Pusher\PushNotifications\PushNotifications;

class testNotify extends Notification

implements ShouldQueue
{
    use Queueable;




    public function via($notifiable)
    {
        return [PusherChannel::class];
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
                    "title" => "Test 2",
                    "body" => "Vous avez une nouvelle notification",
                    "deep_link" => "https://example.com/notification",
                    "icon" => "https://example.com/icon.png",
                    "data" => array(
                        "foo" => "bar",
                        "baz" => "qux",
                    ),
                ),
            ),
        );

        $beamsClient->publishToInterests(array($interests), $data);
    }




    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle notification')
            ->line('Vous avez une nouvelle notification.')
            ->action('Voir la notification', 'https://example.com/notification')
            ->line('Merci de votre attention !');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Vous avez une nouvelle notification',
            'action_url' => 'https://example.com/notification',
        ];
    }
}
