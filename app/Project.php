<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function topic() {
    	return $this->belongsTo(Topic::class);
    }
}
