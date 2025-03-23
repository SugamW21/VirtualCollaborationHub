<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'name',
        'image',
        'join_limit',
        
    ];

    public function group()
    {
        return $this->belongsTo(GroupChat::class, 'group_id');
    }
}
