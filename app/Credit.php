<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    //
    public function shopping_cart_line_items() {
        return $this->hasMany(ShoppingCartLineItem::class);
    }
}
