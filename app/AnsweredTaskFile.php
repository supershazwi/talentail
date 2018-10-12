<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnsweredTaskFile extends Model
{
	protected $table = 'answered_task_files';

    //
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function answered_task() {
        return $this->belongsTo(AnsweredTask::class);
    }
}
