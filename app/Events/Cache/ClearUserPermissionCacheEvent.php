<?php

namespace App\Events\Cache;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ClearUserPermissionCacheEvent extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
