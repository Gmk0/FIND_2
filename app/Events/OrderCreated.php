<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    /**
     * Create a new event instance.
     */
    public function __construct(Order $order)
    {
        //
        $this->order = $order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

    public function  broadcastWith()
    {

        return [

            'service' => $this->order->service->title,

        ];
        # code..
    }

    public function broadcastOn()
    {

        error_log($this->order->service->title);

        $id = $this->order->service->freelance->user->id;
        error_log($id);

        return new PrivateChannel('notify.' . $id);
    }
}
