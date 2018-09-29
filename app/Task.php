<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function answers() {
    	return $this->hasMany(Answer::class);
    }

    public function project() {
    	return $this->belongsTo(Project::class);
    }

    public function user_answers() {
        return $this->hasMany(UserAnswer::class);
    }
}
