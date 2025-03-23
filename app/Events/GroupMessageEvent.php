<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GroupMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $chatData;

    /**
     * Create a new event instance.
     */
    public function __construct($chatData)
    {
        $this->chatData = $chatData;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

    // public function broadcastWith(){
    //     return ['chat' => $this->chatData];
    // }
    public function broadcastWith(){
        return ['chat' => $this->chatData,
        'notification' => [
            'message' => "{$this->chatData->userData->name} sent a message in {$this->chatData->group->name} group",
            'sender_id' => $this->chatData->sender_id,
            'group_id' => $this->chatData->group_id
        ]];
    }

    public function broadcastAs(){
        return 'getGroupChatMessage';
    }

    public function broadcastOn()
    {
        return 
            new PrivateChannel('broadcast-group-message');
    }
}
