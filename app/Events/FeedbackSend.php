<?php

namespace App\Events;

use App\Models\feedback;
use App\Models\FeedbackService;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FeedbackSend
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $feedback;

    /**
     * Create a new event instance.
     */
    public function __construct(FeedbackService $feedback)
    {
        $this->feedback = $feedback;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}