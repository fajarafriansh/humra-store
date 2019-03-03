<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	public function categories() {
		return $this -> hasMany('App\Category', 'parent_id');
	}

	public function parent() {
		return $this -> belongsTo('App\Category', 'parent_id');
	}

	public function get_parent_name() {
		return $this->name;
	}

	public function parent_name() {
		if ($this->parent) {
			return $this->parent->get_parent_name();
		} else {
			return "Main Category";
		}
	}

	public function products() {
		return $this -> hasMany('App\Product', 'category_id');
	}
}
