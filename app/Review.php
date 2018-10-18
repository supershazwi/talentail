<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function receiver() {
	    return $this->belongsTo('App\User', 'receiver_id');
	}

	public function sender() {
	    return $this->belongsTo('App\User', 'sender_id');
	}

	public function project() {
	    return $this->belongsTo('App\Project');
	}
}
