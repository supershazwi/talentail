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

    public function competencies() {
    	return $this->hasMany(Competency::class);
    }

    public function skills_gained() {
        return $this->hasMany(SkillGained::class);
    }
}
