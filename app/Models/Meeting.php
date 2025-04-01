<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['room_name', 'creator_id', 'status', 'ended_at'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function invitations()
    {
        return $this->hasMany(MeetingInvitation::class);
    }
}

