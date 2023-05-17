<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\PusherPushNotifications\PusherChannel;
use Pusher\PushNotifications\PushNotifications;
use NotificationChannels\PusherPushNotifications\PusherMessage;

class OrderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return [PusherChannel::class, "database"];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Nouvelle commande de ' . $this->order->total_amount . ' pour le service ' . $this->order->service->title . ' a été passée.',
            'url' => '/orders/' . $this->order->id,
            'icon' => '/img/notification-icon.png',
        ];
    }
    /*
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
                    "body" => 'Vous avez une nouvelle commande de ' . $this->order->total_amount . ' pour le service ' . $this->order->service->title . '.',
                    "deep_link" => '/freelance/commande/view' . $this->order->id,
                    "icon" => "/images/logo/find_01.png",
                    "data" => array(
                        "client" => "bar",
                        "service" => "qux",
                    ),
                ),
            ),
        );

        $beamsClient->publishToInterests(array($interests), $data);
    }
*/
    public function toPushNotification($notifiable)
    {
        $beamsClient = new PushNotifications(array(
            "instanceId" => config('services.pusher.beams_instance_id'),
            "secretKey" => config('services.pusher.beams_secret_key'),
        ));

        $interests = "App.Models.User.{$notifiable->id}";
        $url = 'http://localhost:8000/freelance/commande/view/' . $this->order;

        $data = array(
            "web" => array(
                "notification" => array(
                    "title" => "Nouvelle commande !",
                    "body" =>
                    'Vous avez une nouvelle commande de ' . $this->order->total_amount . ' pour le service ' . $this->order->service->title . '.',
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
