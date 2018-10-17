<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatorApplication extends Model
{
    public function user() {
    	return $this->belongsTo(User::class);
    }
}
