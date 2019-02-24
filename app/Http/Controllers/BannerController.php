<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use App\Banner;

class BannerController extends Controller
{
    public function addBanner(Request $request) {
    	if ($request -> isMethod('post')) {
    		$data = $request -> all();

    		$banner = new Banner;
			$banner->title = $data['title'];
			$banner->subtitle = $data['subtitle'];
			$banner->link = $data['link'];
			if (!empty($data['description'])) {
				$banner->description = $data['description'];
			} else {
				$banner->description = '';
			}

			// Upload Image Banner
			if ($request -> hasFile('image')) {
				$image_tmp = Input::file('image');
				if ($image_tmp -> isValid()) {
					$extension = $image_tmp -> getClientOriginalExtension();
					$filename = rand(111,99999).'.'.$extension;
					$banner_path = 'img/frontend/home/banners/'.$filename;
					// Image Resize
					Image::make($image_tmp) -> resize(491,742) -> save($banner_path);

					// Store images in banner table
					$banner->image = $filename;
				}
			}

			$banner->status = $data['status'];
			$banner -> save();

			return redirect('/admin/banners') -> with('flash_message_success', 'Banner has been added.');
    	}
    	return view('admin.banners.add_banner');
    }

    public function editBanner(Request $request, $id = null) {
    	if ($request -> isMethod('post')) {
    		$data = $request -> all();

    		// Upload Image Banner
			if ($request -> hasFile('image')) {
				$image_tmp = Input::file('image');
				if ($image_tmp -> isValid()) {
					$extension = $image_tmp -> getClientOriginalExtension();
					$filename = rand(111,99999).'.'.$extension;
					$banner_path = 'img/frontend/home/banners/'.$filename;
					// Image Resize
					Image::make($image_tmp) -> resize(491,742) -> save($banner_path);

					// Store images in banner table
					//$banner->image = $filename;
				}
			} elseif (empty($data['current_image'])) {
				$data['current_image'] = '';
				$filename = $data['current_image'];
			} else {
				$filename = $data['current_image'];
			}

			if (empty($data['description'])) {
				$data['description'] = '';
			}

			Banner::where('id', $id) -> update(['title' => $data['title'], 'subtitle' => $data['subtitle'], 'link' => $data['link'], 'description' => $data['description'], 'status' => $data['status'], 'image' => $filename]);
			return redirect('/admin/banners') -> with('flash_message_success', 'Banner has been updated.');
    	}
    	$banner_details = Banner::where('id', $id) -> first();
    	return view('admin.banners.edit_banner') -> with(compact('banner_details'));
    }

    public function deleteBannersImage($id = null) {
		$banner_image = Banner::where(['id' => $id]) -> first();
		$banner_path = 'img/frontend/home/banners/';

		if (file_exists($banner_path.$banner_image->image)) {
			unlink($banner_path.$banner_image->image);
		}

		Banner::where(['id' => $id]) -> update(['image' => '']);
		return redirect() -> back() -> with('flash_message_success', 'Image has been removed.');
	}

    public function deleteBanner($id = null) {
    	Banner::where(['id' => $id]) -> delete();
		return redirect() -> back() -> with('flash_message_success', 'Banner has been deleted.');
    }

    public function viewBanners() {
    	$banners = Banner::get();
    	return view('admin.banners.view_banners') -> with(compact('banners'));
    }
}
