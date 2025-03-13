<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $chatData;

    /**
     * Create a new event instance.
     */
    public function __construct( $chatData)
    {
        //
        $this->chatData = $chatData;
        \Log::info('Broadcasting Chat Message: ', ['sender_id' => $chatData->sender_id, 'receiver_id' => $chatData->receiver_id]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

     public function broadcastWith(): array
     {
        return ['chat' => $this->chatData,
        'notification' => [
            'message' => "{$this->chatData->senderData->name} sent a message to you ",
            'sender_id' => $this->chatData->sender_id,
            'receiver_id' => $this->chatData->receiver_id
        ]];
         
     }

    
     public function broadcastAS()
     {
        return 'getChatMessage';
         
     }



    public function broadcastOn()
    {
        return new PrivateChannel('broadcast-message');
        
    }
}
