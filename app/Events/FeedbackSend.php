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

class FeedbackSend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $feedback;
    public $freelance_id;

    /**
     * Create a new event instance.
     */
    public function __construct(FeedbackService $feedback, $id)
    {
        $this->feedback = $feedback;
        $this->freelance_id = $id;


        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {

        $id = $this->freelance_id;

        return new PrivateChannel('notify.' . $id);
    }
}
