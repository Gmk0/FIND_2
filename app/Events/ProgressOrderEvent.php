<?php

namespace App\Events;

use App\Models\FeedbackService;
use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProgressOrderEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $feedback;
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
    public function broadcastOn()
    {


        $id = $this->feedback->order ? $this->feedback->order->user_id :
            $this->feedback->project->user_id;
        error_log($id);

        return new PrivateChannel('notify.' . $id);
    }
}
