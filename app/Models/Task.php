<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Task extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'title',
//         'description',
//         'priority',
//         'due_date',
//         'start_date',
//         'completed',
//         'completed_at',
//         'user_id',
//     ];
    
    

//     protected $casts = [
//         'start_date' => 'datetime',
//         'completed_at' => 'datetime',
//          // Cast completed_at to a datetime
//     ];

//     // Define the relationship with User model
//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
// }


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
        'assigned_users', // Add this field to store assigned users
    ];
    
    protected $casts = [
        'start_date' => 'datetime',
        'completed_at' => 'datetime',
        'assigned_users' => 'array', // Cast to array since we'll store multiple user IDs
    ];

    // Define the relationship with User model (creator)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Define the relationship with assigned users
    public function assignedUsers()
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');
    }
}