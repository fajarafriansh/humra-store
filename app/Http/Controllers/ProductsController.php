<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Coupon;
use App\User;
use App\Country;
use App\DeliveryAddress;
use App\Order;
use App\OrdersProduct;
use DB;

class ProductsController extends Controller {
	public function addProduct(Request $request) {
		if ($request -> isMethod('post')) {
			$data = $request -> all();
			if (empty($data['category_id'])) {
				return redirect() -> back() -> with('flash_message_error', 'Product category is missing.');
			}
			$product = new Product;
			$product -> category_id = $data['category_id'];
			$product -> product_name = $data['product_name'];
			$product -> product_code = $data['product_code'];
			$product -> product_color = $data['product_color'];
			if (!empty($data['description'])) {
				$product -> description = $data['description'];
			} else {
				$product -> description = '';
			}
			if (!empty($data['care'])) {
				$product -> care = $data['care'];
			} else {
				$product -> care = '';
			}
			$product -> price = $data['price'];

			// Upload Image
			if ($request -> hasFile('image')) {
				$image_tmp = Input::file('image');
				if ($image_tmp -> isValid()) {
					$extension = $image_tmp -> getClientOriginalExtension();
					$filename = rand(111,99999).'.'.$extension;
					$large_image_path = 'img/backend/products/large/'.$filename;
					$medium_image_path = 'img/backend/products/medium/'.$filename;
					$small_image_path = 'img/backend/products/small/'.$filename;
					$tiny_image_path = 'img/backend/products/tiny/'.$filename;

					// Image Resize
					Image::make($image_tmp) -> save($large_image_path);
					Image::make($image_tmp) -> resize(600,600) -> save($medium_image_path);
					Image::make($image_tmp) -> resize(300,300) -> save($small_image_path);
					Image::make($image_tmp) -> resize(60,60) -> save($tiny_image_path);

					// Store images in product table
					$product -> image = $filename;
				}
			}

			$product -> status = $data['status'];

			$product -> save();
			return redirect('/admin/products') -> with('flash_message_success', 'Product added.');
		}

		$categories = Category::where(['parent_id' => 0]) -> get();
		$categories_dropdown = "<option value='' selected disabled>Select Category</option>";
		foreach($categories as $cat) {
			$categories_dropdown .= "<option value='".$cat -> id."'>".$cat -> name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat -> id]) -> get();
			foreach ($sub_categories as $sub_cat) {
				$categories_dropdown .= "<option value='".$sub_cat -> id."'>&nbsp;&mdash;&nbsp;".$sub_cat -> name."</option>";
			}
		}
		return view('admin.products.add_product') -> with(compact('categories', 'categories_dropdown'));
	}

	public function editProducts(Request $request, $id = null) {
		if ($request -> isMethod('post')) {
			$data = $request -> all();

			// Upload Image
			if ($request -> hasFile('image')) {
				$image_tmp = Input::file('image');
				if ($image_tmp -> isValid()) {
					$extension = $image_tmp -> getClientOriginalExtension();
					$filename = rand(111,99999).'.'.$extension;
					$large_image_path = 'img/backend/products/large/'.$filename;
					$medium_image_path = 'img/backend/products/medium/'.$filename;
					$small_image_path = 'img/backend/products/small/'.$filename;
					$tiny_image_path = 'img/backend/products/tiny/' .$filename;

					// Image Resize
					Image::make($image_tmp) -> save($large_image_path);
					Image::make($image_tmp) -> resize(600,600) -> save($medium_image_path);
					Image::make($image_tmp) -> resize(300,300) -> save($small_image_path);
					Image::make($image_tmp) -> resize(60,60) -> save($tiny_image_path);

					// Store images in product table
					//$product -> image = $filename;
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

			if (empty($data['care'])) {
				$data['care'] = '';
			}

			Product::where(['id' => $id]) -> update(['product_name' => $data['product_name'], 'category_id' => $data['category_id'], 'product_code' => $data['product_code'], 'product_color' => $data['product_color'], 'price' => $data['price'], 'description' => $data['description'], 'care' => $data['care'], 'status' => $data['status'], 'image' => $filename]);
			return redirect('/admin/products') -> with('flash_message_success', 'Product updated.');
		}

		$product_details = Product::where(['id' => $id]) -> first();

		$categories = Category::where(['parent_id' => 0]) -> get();
		$categories_dropdown = "<option value='' selected disabled>Select Category</option>";
		foreach($categories as $cat) {
			if ($cat -> id == $product_details -> category_id) {
				$selected = "selected";
			} else {
				$selected = "";
			}
			$categories_dropdown .= "<option value='".$cat -> id."' ".$selected.">".$cat -> name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat -> id]) -> get();
			foreach ($sub_categories as $sub_cat) {
				if ($sub_cat -> id == $product_details -> category_id) {
					$selected = "selected";
				} else {
					$selected = "";
				}
				$categories_dropdown .= "<option value='".$sub_cat -> id."' ".$selected.">&nbsp;&mdash;&nbsp;".$sub_cat -> name."</option>";
			}
		}
		return view('admin.products.edit_product') -> with(compact('product_details', 'categories_dropdown'));
	}

	public function deleteProductsImage($id = null) {
		$product_image = Product::where(['id' => $id]) -> first();
		$large_image_path = 'img/backend/products/large/';
		$medium_image_path = 'img/backend/products/medium/';
		$small_image_path = 'img/backend/products/small/';
		$tiny_image_path = 'img/backend/products/tiny/';

		if (file_exists($large_image_path.$product_image->image)) {
			unlink($large_image_path.$product_image->image);
		}
		if (file_exists($medium_image_path.$product_image->image)) {
			unlink($medium_image_path.$product_image->image);
		}
		if (file_exists($small_image_path.$product_image->image)) {
			unlink($small_image_path.$product_image->image);
		}
		if (file_exists($tiny_image_path.$product_image->image)) {
			unlink($tiny_image_path.$product_image->image);
		}

		Product::where(['id' => $id]) -> update(['image' => '']);
		return redirect() -> back() -> with('flash_message_success', 'Image has been removed.');
	}

	public function deleteProducts($id = null) {
		Product::where(['id' => $id]) -> delete();
		return redirect() -> back() -> with('flash_message_success', 'Product has been deleted.');
	}

	public function viewProducts() {
		$products = Product::orderBy('id', 'DESC') -> get();
		foreach ($products as $key => $value) {
			$category_name = Category::where(['id' => $value -> category_id]) -> first();
			$products[$key] -> category_name = $category_name -> name;
		}
		return view('admin.products.view_products') -> with(compact('products'));
	}

	public function addAttributes(Request $request, $id = null) {
		$product_details = Product::with('attributes') -> where(['id' => $id]) -> first();

		if ($request -> isMethod('post')) {
			$data = $request -> all();
			foreach ($data['sku'] as $key => $value) {
				if (!empty($value)) {
					// SKU check
					$count_sku = ProductsAttribute::where('sku', $value) -> count();
					if ($count_sku > 0) {
						return redirect('/admin/add-attributes/'. $id) -> with('flash_message_error', 'SKU already exists! Please add another SKU.');
					}

					// Size check
					$count_size = ProductsAttribute::where(['product_id' => $id, 'size' => $data['size'][$key]]) -> count();
					if ($count_size > 0) {
						return redirect('/admin/add-attributes/'. $id) -> with('flash_message_error', '"'.$data['size'][$key]. '" size already exists! Please add another Size.');
					}

					$attributes = new ProductsAttribute;
					$attributes -> product_id = $id;
					$attributes -> sku = $value;
					$attributes -> size = $data['size'][$key];
					$attributes -> price = $data['price'][$key];
					$attributes -> stock = $data['stock'][$key];
					$attributes -> save();
				}
			}
			return redirect('/admin/add-attributes/'. $id) -> with('flash_message_success', 'Product attributes added.');
		}
		return view('admin.products.add_attributes') -> with(compact('product_details'));
	}

	public function editAttributes(Request $request, $id = null) {
		if ($request -> isMethod('post')) {
			$data = $request -> all();

			foreach ($data['idAttr'] as $key => $value) {
				ProductsAttribute::where(['id' => $data['idAttr'][$key]]) -> update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
			}

			return redirect() -> back() -> with('flash_message_success', 'Product attributes updated.');
		}
	}

	public function deleteAttributes($id = null) {
		ProductsAttribute::where(['id' => $id]) -> delete();
		return redirect() -> back() -> with('flash_message_success', 'Product attributes deleted.');
	}

	public function addImages(Request $request, $id = null) {
		$product_details = Product::with('attributes') -> where(['id' => $id]) -> first();

		if ($request -> isMethod('post')) {
			$data = $request -> all();

			if ($request -> hasFile('image')) {
				$files = $request -> file('image');
				foreach($files as $file) {
					$images = new ProductsImage;
					$extension = $file -> getClientOriginalExtension();
					$filename = rand(111,99999).'.'.$extension;
					$large_image_path = 'img/backend/products/large/'.$filename;
					$medium_image_path = 'img/backend/products/medium/'.$filename;
					$small_image_path = 'img/backend/products/small/'.$filename;
					$tiny_image_path = 'img/backend/products/tiny/'.$filename;

					// Image Resize
					Image::make($file) -> save($large_image_path);
					Image::make($file) -> resize(600,600) -> save($medium_image_path);
					Image::make($file) -> resize(300,300) -> save($small_image_path);
					Image::make($file) -> resize(60,60) -> save($tiny_image_path);

					$images->image = $filename;
					$images->product_id = $data['product_id'];
					$images->save();
				}
				return redirect('admin/add-images/'.$id) -> with('flash_message_success', 'Product alternate images added.');
			}
		}

		$products_images = ProductsImage::where(['product_id' => $id]) -> get();

		return view('admin.products.add_images') -> with(compact('product_details', 'products_images'));
	}

	public function deleteAltImage($id = null) {
		$product_image = ProductsImage::where(['id' => $id]) -> first();
		$large_image_path = 'img/backend/products/large/';
		$medium_image_path = 'img/backend/products/medium/';
		$small_image_path = 'img/backend/products/small/';
		$tiny_image_path = 'img/backend/products/tiny/';

		if (file_exists($large_image_path.$product_image->image)) {
			unlink($large_image_path.$product_image->image);
		}
		if (file_exists($medium_image_path.$product_image->image)) {
			unlink($medium_image_path.$product_image->image);
		}
		if (file_exists($small_image_path.$product_image->image)) {
			unlink($small_image_path.$product_image->image);
		}
		if (file_exists($tiny_image_path.$product_image->image)) {
			unlink($tiny_image_path.$product_image->image);
		}

		ProductsImage::where(['id' => $id]) -> delete();
		return redirect() -> back() -> with('flash_message_success', 'Product Alternate Image has been removed.');
	}

	public function products($url = null) {
		// Show error 404
		$count_category = Category::where(['url' => $url, 'status' => 1]) -> count();
		if ($count_category == 0) {
			abort(404);
		}

		$categories = Category::with('categories') -> where(['parent_id' => 0]) -> get();
		$category_details = Category::where(['url' => $url]) -> first();

		if ($category_details->parent_id == 0) {
			$sub_categories = Category::where(['parent_id' => $category_details->id]) -> get();
			foreach ($sub_categories as $sub_cat) {
				$category_ids[] = $sub_cat->id;
			}
			$products_all = Product::orderBy('id', 'DESC') -> with('category') -> whereIn('category_id', $category_ids) -> where('status', 1) -> get();
		} else {
			$products_all = Product::orderBy('id', 'DESC') -> with('category') -> where(['category_id' => $category_details->id]) -> where('status', 1) -> get();
		}

		return view('products.products') -> with(compact('category_details', 'products_all', 'categories'));
	}

	public function productDetail($id = null) {
		// Show 404 if product disable
		$product_count = Product::where(['id' => $id, 'status' => 1]) -> count();
		if ($product_count == 0) {
			abort(404);
		}

		$product_details = Product::with('attributes', 'category') -> where('id', $id) -> first();
		$related_products = Product::where('id', '!=', $id) -> where(['category_id' => $product_details->category_id]) -> get();
		// foreach ($related_products -> chunk(4) as $chunk) {
		// 	foreach ($chunk as $item) {
		// 		echo $item; echo "<br>";
		// 	}
		// 	echo "<br><br><br><br>";
		// }

		$categories = Category::with('categories') -> where(['parent_id' => 0]) -> get();
		$product_alt_images = ProductsImage::where('product_id', $id) -> get();
		$total_stock = ProductsAttribute::where('product_id', $id) -> sum('stock');

		return view('products.product_detail') -> with(compact('product_details', 'categories', 'product_alt_images', 'total_stock', 'related_products', 'category_name'));
	}

	public function getProductPrice(Request $request) {
		$data = $request -> all();
		$product_array = explode("-", $data['product_size']);
		$product_attrib = ProductsAttribute::where(['product_id' => $product_array[0], 'size' => $product_array[1]]) -> first();
		echo $product_attrib->price;
		echo "#";
		echo $product_attrib->stock;
	}

	public function addtoCart(Request $request) {
		Session::forget('coupon_amount');
		Session::forget('coupon_code');

		$data = $request ->all();

		if (empty(Auth::User()->email)) {
			$user_email = "";
		} else {
			$user_email = Auth::User()->email;
		}

		$session_id = Session::get('session_id');
		if (empty($session_id)) {
			$session_id = str_random(40);
			Session::put('session_id', $session_id);
		}

		$size = explode("-", $data['size']);

		$count_products = DB::table('cart') -> where(['product_id' => $data['product_id'], 'product_color' => $data['product_color'], 'size' => $size[1], 'session_id' => $session_id]) -> count();

		if ($count_products > 0) {
			return redirect() -> back() -> with('flash_message_error', 'Product already exists in cart.');
		} else {
			$get_sku = ProductsAttribute::select('sku') -> where(['product_id' => $data['product_id'], 'size' => $size[1]]) -> first();
			DB::table('cart') -> insert(['product_id' => $data['product_id'], 'product_name' => $data['product_name'], 'product_code' => $get_sku->sku, 'product_color' => $data['product_color'], 'price' => $data['price'], 'quantity' => $data['quantity'], 'size' => $size[1], 'user_email' => $user_email, 'session_id' => $session_id]);
		}

		return redirect('/cart') -> with('flash_message_success', 'Product has been added in cart.');
	}

	public function cart() {
		if (Auth::check()) {
			$user_email = Auth::User()->email;
			$user_cart = DB::table('cart') -> where(['user_email' => $user_email]) -> get();
		} else {
			$session_id = Session::get('session_id');
			$user_cart = DB::table('cart') -> where(['session_id' => $session_id]) -> get();
		}

		foreach($user_cart as $key => $product) {
			$product_details = Product::where('id', $product->product_id) -> first();
			$user_cart[$key]->image = $product_details->image;
		}

		return view('products.cart') -> with(compact('user_cart'));
	}

	public function updateCart($id = null, $quantity = null) {
		Session::forget('coupon_amount');
		Session::forget('coupon_code');

		$get_cart_details = DB::table('cart') -> where('id', $id) -> first();
		$get_attrib_stock = ProductsAttribute::where('sku', $get_cart_details->product_code) -> first();
		$updated_quantity = $get_cart_details->quantity+$quantity;

		if ($get_attrib_stock->stock >= $updated_quantity) {
			DB::table('cart') -> where('id', $id) -> increment('quantity', $quantity);
			return redirect() -> back() -> with('flash_message_success', 'Product quantity has been updated.');
		} else {
			return redirect() -> back() -> with('flash_message_error', 'Required quantity is not available.');
		}
	}

	public function deleteCartProduct($id = null) {
		Session::forget('coupon_amount');
		Session::forget('coupon_code');

		DB::table('cart')->where('id', $id) -> delete();
		return redirect() -> back() -> with('flash_message_success', 'Cart has been updated.');
	}

	public function applyCoupon(Request $request) {
		Session::forget('coupon_amount');
		Session::forget('coupon_code');

		$data = $request -> all();
		$coupon_count = Coupon::where('coupon_code', $data['coupon_code']) -> count();

		if ($coupon_count == 0) {
			return redirect() -> back() -> with('flash_message_error', 'The Coupon code is not valid.');
		} else {
			$coupon_details = Coupon::where('coupon_code', $data['coupon_code']) -> first();
			if ($coupon_details->status == 0) {
				return redirect() -> back() -> with('flash_message_error', 'The Coupon is not active.');
			}

			$expiry_date = $coupon_details->expiry_date;
			$current_date = date('Y-m-d');
			if ($expiry_date < $current_date) {
				return redirect() -> back() -> with('flash_message_error', 'The Coupon is expired.');
			}

			$session_id = Session::get('session_id');

			if (Auth::check()) {
				$user_email = Auth::User() -> email;
				$user_cart = DB::table('cart') -> where(['user_email' => $user_email]) -> get();
			} else {
				$session_id = Session::get('session_id');
				$user_cart = DB::table('cart') -> where(['session_id' => $session_id]) -> get();
			}

			$total_amount = 0;
			foreach($user_cart as $item) {
				$total_amount = $total_amount + ($item->price * $item->quantity);
			}

			if ($coupon_details->amount_type != "Fixed") {
				$coupon_amount = $total_amount * ($coupon_details->amount/100);
			} else {
				$coupon_amount = $coupon_details->amount;
			}

			Session::put('coupon_amount', $coupon_amount);
			Session::put('coupon_code', $data['coupon_code']);

			return redirect() -> back() -> with('flash_message_success', 'You got a discount.');
		}
	}

	public function checkout(Request $request) {
		$user_id = Auth::User() -> id;
		$user_email = Auth::User() -> email;
		$user_details = User::find($user_id);
		$countries = Country::get();
		$shipping_count = DeliveryAddress::where('user_id', $user_id) -> count();

		if ($shipping_count > 0) {
			$shipping_details = DeliveryAddress::where('user_id', $user_id) -> first();
		}

		$session_id = Session::get('session_id');
		DB::table('cart') -> where(['session_id' => $session_id]) -> update(['user_email' => $user_email]);

		if ($request -> isMethod('POST')) {
			$data = $request -> all();

			if (empty($data['billing_name']) || empty($data['billing_address']) || empty($data['billing_city']) || empty($data['billing_state']) || empty($data['billing_country']) || empty($data['billing_zipcode']) || empty($data['billing_mobile']) || empty($data['shipping_name']) || empty($data['shipping_address']) || empty($data['shipping_city']) || empty($data['shipping_state']) || empty($data['shipping_country']) || empty($data['shipping_zipcode']) || empty($data['shipping_mobile'])) {
			return redirect() -> back() -> with('flash_message_error', 'Please fill all field to continue!');
			}

			User::where('id', $user_id) -> update(['name' => $data['billing_name'], 'address' => $data['billing_address'], 'city' => $data['billing_city'], 'state' => $data['billing_state'], 'country' => $data['billing_country'], 'zipcode' => $data['billing_zipcode'], 'mobile' => $data['billing_mobile']]);

			if (empty($data['shipping_notes'])) {
				$shipping_notes = "";
			} else {
				$shipping_notes = $data['shipping_notes'];
			}

			if ($shipping_count > 0) {
				DeliveryAddress::where('user_id', $user_id) -> update(['name' => $data['shipping_name'], 'address' => $data['shipping_address'], 'city' => $data['shipping_city'], 'state' => $data['shipping_state'], 'country' => $data['shipping_country'], 'zipcode' => $data['shipping_zipcode'], 'mobile' => $data['shipping_mobile'], 'notes' => $shipping_notes]);
			} else {
				$shipping = new DeliveryAddress;
				$shipping->user_id = $user_id;
				$shipping->user_email = $user_email;
				$shipping->name = $data['shipping_name'];
				$shipping->address = $data['shipping_address'];
				$shipping->city = $data['shipping_city'];
				$shipping->state = $data['shipping_state'];
				$shipping->country = $data['shipping_country'];
				$shipping->zipcode = $data['shipping_zipcode'];
				$shipping->mobile = $data['shipping_mobile'];
				$shipping->notes = $shipping_notes;
				$shipping->save();
			}
			return redirect('/order-review');
		}

		return view('products.checkout') -> with(compact('user_details', 'countries', 'shipping_details'));
	}

	public function orderReview() {
		$user_id = Auth::User()->id;
		$user_email = Auth::User()->email;
		$user_details = User::where('id', $user_id) -> first();
		$shipping_details = DeliveryAddress::where('user_id', $user_id) -> first();
		$user_cart = DB::table('cart') -> where(['user_email' => $user_email]) -> get();

		return view('products.order_review') -> with(compact('user_details', 'shipping_details', 'user_cart'));
	}

	public function placeOrder(Request $request) {
		if ($request -> isMethod('POST')) {
			$data = $request -> all();
			$user_id = Auth::User()->id;
			$user_email = Auth::User()->email;
			$shipping_details =  DeliveryAddress::where(['user_email' => $user_email]) -> first();
			// echo "<pre>"; print_r($shipping_details); die;

			if (empty(Session::get('coupon_code'))) {
				$coupon_code = '';
			} else {
				$coupon_code = Session::get('coupon_code');
			}

			if (empty(Session::get('coupon_amount'))) {
				$coupon_amount = '0';
			} else {
				$coupon_amount = Session::get('coupon_amount');
			}

			$order = new Order;
			$order->user_id = $user_id;
			$order->user_email = $user_email;
			$order->name = $shipping_details->name;
			$order->address = $shipping_details->address;
			$order->city = $shipping_details->city;
			$order->state = $shipping_details->state;
			$order->country = $shipping_details->country;
			$order->zipcode = $shipping_details->zipcode;
			$order->mobile = $shipping_details->mobile;
			if (empty($shipping_details->notes)) {
				$order->notes = "";
			} else {
				$order->notes = $shipping_details->notes;
			}
			$order->coupon_code = $coupon_code;
			$order->coupon_amount = $coupon_amount;
			$order->order_status = "New";
			$order->payment_method = $data['payment_method'];
			$order->total = $data['total'];
			$order->save();

			$order_id = DB::getPdo() -> lastInsertId();
			$cart_products = DB::table('cart') -> where(['user_email' => $user_email]) -> get();

			foreach ($cart_products as $product) {
				$cart_product = New OrdersProduct;
				$cart_product->order_id = $order_id;
				$cart_product->user_id = $user_id;
				$cart_product->product_id = $product->product_id;
				$cart_product->product_code = $product->product_code;
				$cart_product->product_name = $product->product_name;
				$cart_product->product_color = $product->product_color;
				$cart_product->product_size = $product->size;
				$cart_product->product_price = $product->price;
				$cart_product->product_quant = $product->quantity;
				$cart_product->save();
			}

			Session::put('order_id', $order_id);
			Session::put('total', $data['total']);
			Session::put('payment_method', $data['payment_method']);
			return redirect('/confirmation');
		}
	}

	public function confirmation(Request $request) {
		$user_id = Auth::User()->id;
		$user_email = Auth::User()->email;
		DB::table('cart')->where('user_email', $user_email) -> delete();
		$user_details = User::where('id', $user_id) -> first();
		$shipping_details = DeliveryAddress::where('user_id', $user_id) -> first();
		return view('products.confirmation')->with(compact('user_details', 'shipping_details'));
	}

	public function userOrders() {
		$user_id = Auth::User()->id;
		$orders = Order::with('orders')->where('user_id', $user_id)->orderBy('id', 'DESC')->get();

		return view('orders.user_orders')->with(compact('orders'));
	}

	public function userOrderDetails($order_id) {
		$user_id = Auth::User()->id;
		$order_details = Order::with('orders')->where('id', $order_id)->first();

		return view('orders.order_details')->with(compact('order_details'));
	}
}
