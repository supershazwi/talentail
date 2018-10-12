<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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

    public function roles_gained() {
        return $this->hasMany(RoleGained::class);
    }
}
