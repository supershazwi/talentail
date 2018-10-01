<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetencyScore extends Model
{
	protected $table = 'competency_scores';

    public function skill_gained() {
    	return $this->belongsTo(SkillGained::class);
    }

    public function competency() {
    	return $this->belongsTo(Competency::class);
    }
}
