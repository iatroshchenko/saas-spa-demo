<?php

namespace App\Events;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderInitiated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;
    public Quote $quote;

    /**
     * OrderInitiated constructor.
     * @param User $user
     * @param Quote $quote
     */
    public function __construct(User $user, Quote $quote)
    {
        $this->user = $user;
        $this->quote = $quote;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
