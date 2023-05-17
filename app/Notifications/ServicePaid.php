<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use NotificationChannels\PusherPushNotifications\PusherChannel;
use NotificationChannels\PusherPushNotifications\PusherMessage;
use Pusher\PushNotifications\PushNotifications;

class ServicePaid extends Notification
{
    public function via($notifiable): array
    {
        return [PusherChannel::class];
    }
    public function toPushNotification($notifiable): PusherMessage
    {
        return PusherMessage::create()
            ->web()
            ->link('http://localhost')
            ->title('New blog post ðŸŽ‰')
            ->body('Felix Schmid has just published a new blog post. Go check it out!');
    }
}
