<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Banner;

class IndexController extends Controller
{
	public function index() {
		$products_all = Product::with('category') -> orderBy('id', 'DESC') -> where('status', 1) -> get();
		$categories = Category::with('categories') -> where(['parent_id' => 0]) -> get();
		// $categories = json_decode(json_encode($categories));
		// echo "<prev>"; print_r($categories); die;

		$banners = Banner::where('status', 1) -> get();
		return view('index') -> with(compact('products_all', 'categories', 'banners'));
	}
}
