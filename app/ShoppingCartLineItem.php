<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartLineItem extends Model
{
	protected $table = 'shopping_cart_line_items';

    //
    public function project() {
    	return $this->belongsTo(Project::class);
    }

    public function shopping_cart() {
    	return $this->belongsTo(ShoppingCart::class);
    }
}
