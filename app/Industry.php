<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    //
    public function project() {
    	return $this->belongsTo(Project::class);
    }

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class);
    }
}
