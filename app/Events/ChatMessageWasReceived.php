<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatMessageWasReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $user;
    protected $room;
    protected $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $room, $message)
    {
        $this->user = $user;
        $this->room = $room;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('room.' . $this->room->id);
    }
}
