<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function pendingTasks(){
        return $this->tasks()->where('status', '=', Task::STATUS_TODO );
    }

    public function inProgressTasks(){
        return $this->tasks()->where('status', '=', Task::STATUS_IN_PROGRESS );

    }

    public function doneTasks(){
        return $this->tasks()->where('status', '=', Task::STATUS_DONE );
    }

}
