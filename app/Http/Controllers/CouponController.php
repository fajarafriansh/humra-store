<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
	public function addCoupon(Request $request) {
		if ($request -> isMethod('post')) {
			$data = $request -> all();
			$coupon = new Coupon;
			$coupon->coupon_code = $data['coupon_code'];
			$coupon->amount_type = $data['amount_type'];
			$coupon->amount = $data['amount'];
			$coupon->expiry_date = $data['expiry_date'];
			$coupon->status = $data['status'];
			$coupon->save();
			return redirect() -> action('CouponController@viewCoupons') -> with('flash_message_success', 'Coupon has been added.');
		}
		return view('admin.coupons.add_coupon');
	}

	public function editCoupon(Request $request, $id = null) {
		if ($request -> isMethod('post')) {
			$data = $request -> all();
			$coupon = Coupon::find($id);
			$coupon->coupon_code = $data['coupon_code'];
			$coupon->amount_type = $data['amount_type'];
			$coupon->amount = $data['amount'];
			$coupon->expiry_date = $data['expiry_date'];
			$coupon->status = $data['status'];
			$coupon->save();
			return redirect() -> action('CouponController@viewCoupons') -> with('flash_message_success', 'Coupon has been updeted.');
		}
		$coupon_details = Coupon::find($id);
		return view('admin.coupons.edit_coupon') -> with(compact('coupon_details'));
	}

	public function viewCoupons() {
		$coupons = Coupon::get();
		return view('admin.coupons.view_coupons') -> with(compact('coupons'));
	}

	public function deleteCoupon($id = null) {
		Coupon::where(['id' => $id]) -> delete();
		return redirect() -> back() -> with('flash_message_success', 'Coupon has been deleted.');
	}
}
