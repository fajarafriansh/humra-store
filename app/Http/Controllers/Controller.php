<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function mainCategories() {
    	$main_categories = Category::where(['parent_id' => 0]) -> get();
    	// $main_categories = json_decode(json_encode($main_categories));
    	// echo "<prev>"; print_r($main_categories); die;
    	return $main_categories;
    }
}
