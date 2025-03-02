<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;


    protected $fillable = [
        'sender_id',
        'receiver_id',
         'message',
         'attachment'
        ];

        public function senderData(){
            return $this->hasOne(User::class, 'id', 'sender_id');
        }
        
        public function receiverData(){
            return $this->hasOne(User::class, 'id', 'receiver_id');
        }
         
}
