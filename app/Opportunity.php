<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    //
    public function company() {
    	return $this->belongsTo(Company::class);
    }

    public function role() {
    	return $this->belongsTo(Role::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function exercises() {
        return $this->belongsToMany(Exercise::class);
    }
}
