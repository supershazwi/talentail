<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function skill() {
    	return $this->belongsTo(Skill::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
