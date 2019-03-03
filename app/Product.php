<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function attributes() {
    	return $this -> hasMany('App\ProductsAttribute', 'product_id');
    }

    public function category() {
    	return $this -> belongsTo('App\Category', 'category_id');
    }
}
