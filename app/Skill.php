<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    public function projects() {
    	return $this->hasMany(Project::class);
    }

    public function opportunities() {
    	return $this->hasMany(Opportunity::class);
    }
}
