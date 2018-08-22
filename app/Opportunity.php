<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    //
    public function skill() {
    	return $this->belongsTo(Skill::class);
    }

    public function company() {
    	return $this->belongsTo(Company::class);
    }
}
