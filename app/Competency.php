<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    //
    public function skill() {
    	return $this->belongsTo(Skill::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
