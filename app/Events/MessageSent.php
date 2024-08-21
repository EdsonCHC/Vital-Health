<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user1;
    public $user2;

    public function __construct($message, $user1, $user2)
    {
        $this->message = $message;
        $this->user1 = $user1;
        $this->user2 = $user2;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('vh-chat.' . $this->user1->id . '.' . $this->user2->id);
    }

    public function broadcastWith()
    {
        return ['message' => $this->message];
    }
}
