<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    //
    public function role() {
    	return $this->belongsTo(Role::class);
    }

    public function company() {
    	return $this->belongsTo(Company::class);
    }
}
