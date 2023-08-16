<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogActivity
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $activity;

    public function __construct($user, $activity)
    {
        $this->user = $user;
        $this->activity = $activity;
    }
}
