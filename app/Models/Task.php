<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'due_date',
        'start_date',
        'completed',
        'completed_at',
        'user_id',
    ];
    
    

    protected $casts = [
        'start_date' => 'datetime',
        'completed_at' => 'datetime',
         // Cast completed_at to a datetime
    ];

    // Define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
