<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function addCategory(Request $request) {
    	if ($request -> isMethod('post')) {
    		$data = $request -> all();
    		$category = new Category;
    		$category->name = $data['category_name'];
    		$category->parent_id = $data['parent_id'];
            $category->status = $data['status'];
    		$category->url = $data['url'];
            if (!empty($data['description'])) {
                $category->description = $data['description'];
            } else {
                $category->description = '';
            }
    		$category->save();

    		return redirect('/admin/categories') -> with('flash_message_success', 'Category added successfully.');
    	}

    	$levels = Category::where(['parent_id' => 0]) -> get();
    	return view('admin.categories.add_category') -> with(compact('levels'));
    }

    public function viewCategories() {
        $categories = Category::with('parent') -> get();
    	return view('admin.categories.view_categories') -> with(compact('categories'));
    }

    public function editCategory(Request $request, $id = null) {
    	if ($request -> isMethod('post')) {
    		$data = $request -> all();

            if (!empty($data['description'])) {
                $description = $data['description'];
            } else {
                $description = '';
            }

    		Category::where(['id' => $id]) -> update(['name' => $data['category_name'], 'parent_id' => $data['parent_id'], 'status' => $data['status'], 'url' => $data['url'], 'description' => $description]);
    		return redirect('/admin/categories') -> with('flash_message_success', 'Category updated successfully.');
    	}

    	$categoryDetail = Category::where(['id' => $id]) -> first();
    	$levels = Category::where(['parent_id' => 0]) -> get();
    	return view('admin.categories.edit_category') -> with(compact('categoryDetail', 'levels'));
    }

    public function deleteCategory($id = null) {
    	if (!empty($id)) {
    		Category::where(['id' => $id]) -> delete();
    		return redirect() -> back() -> with('flash_message_success', 'Category deleted successfully.');
    	}
    }
}
