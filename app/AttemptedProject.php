<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttemptedProject extends Model
{
    //
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function creator() {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function competency_and_task_reviews() {
        return $this->hasMany(CompetencyAndTaskReview::class);
    }
}
