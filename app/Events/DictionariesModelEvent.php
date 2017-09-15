<?php

namespace App\Events;

use App\Models\Backend\DictionariesModel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DictionariesModelEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $dictionaries;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DictionariesModel $dictionariesModel)
    {
        $this->dictionaries=$dictionariesModel;
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
