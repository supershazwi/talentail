<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UseCase extends Model
{
    //
    public function topic() {
    	return $this->belongsTo(Topic::class);
    }
}
