<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function industries()
    {
        return $this->belongsToMany(Industry::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function shopping_cart_line_items() {
        return $this->hasMany(ShoppingCartLineItem::class);
    }
}
