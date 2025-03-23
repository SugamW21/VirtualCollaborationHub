<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'group_id',
        'message',
        'attachment'
    ];

    public function userData(){
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
    public function group(){
        return $this->belongsTo(group::class, 'group_id', 'id');
    }
}
