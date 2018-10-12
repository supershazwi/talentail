<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnsweredTask extends Model
{
    protected $table = 'answered_tasks';
    
    //
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function task() {
    	return $this->belongsTo(Task::class);
    }

    public function answered_task_files() {
        return $this->hasMany(AnsweredTaskFile::class);
    }

    public function reviewed_answered_task_files() {
        return $this->hasMany(ReviewedAnsweredTaskFile::class);
    }
}
