<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillGained extends Model
{
	protected $table = 'skills_gained';

    //
    public function competencies() {
    	return $this->hasMany(Competency::class);
    }

    public function skill() {
    	return $this->belongsTo(Skill::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function competency_scores() {
        return $this->hasMany(CompetencyScore::class);
    }
}
