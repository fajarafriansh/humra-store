<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Country;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {
    public function register(Request $request) {
    	if ($request -> isMethod('post')) {
    		$data = $request -> all();
    		$users_count = User::where('email', $data['email']) -> count();
    		if ($users_count > 0) {
    			return redirect() -> back() -> with('flash_message_error', 'Email already exists.');
    		} else {
    			$user = new User;
    			$user->name = $data['name'];
    			$user->email = $data['email'];
    			$user->password = bcrypt($data['password']);
    			$user->save();

    			if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
    				Session::put('frontSession', $data['email']);
    				return redirect('/cart');
    			}
    		}
    	}
    	return view('users.register');
    }

    public function checkEmail(Request $request) {
    	$data = $request -> all();
    	$users_count = User::where('email', $data['email']) -> count();
		if ($users_count > 0) {
			echo "false";
		} else {
			echo "true"; die;
		}
    }

    public function login(Request $request) {
    	if ($request -> isMethod('POST')) {
    		$data = $request -> all();

    		if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
    			Session::put('frontSession', $data['email']);
				return redirect('/cart');
			} else {
				return redirect() -> back() -> with('flash_message_error', 'Invalid user or password.');
			}
    	}
    	return view('users.login');
    }

    public function account(Request $request) {
        $user_id = Auth::user() -> id;
        $user_details = User::find($user_id);
        $countries = Country::get();

        if ($request -> isMethod('POST')) {
            $data = $request -> all();
            $user = User::find($user_id);

            if (empty($data['country'])) {
                $data['country'] = '';
            }

            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->zipcode = $data['zipcode'];
            $user->mobile = $data['mobile'];
            $user->save();

            return redirect() -> back() -> with('flash_message_success', 'You account details has been updated.');
        }
    	return view('users.profile') -> with(compact('user_details', 'countries'));
    }

    public function checkPassword(Request $request) {
        $data = $request -> all();
        $current_password = $data['current_password'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id', $user_id) -> first();

        if (Hash::check($current_password, $check_password->password)) {
            echo "true"; die;
        } else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request) {
        if ($request -> isMethod('POST')) {
            $data = $request -> all();
            $old_password = User::where('id', Auth::User()->id) -> first();
            $current_password = $data['current_password'];

            if (Hash::check($current_password, $old_password->password)) {
            	$new_password = bcrypt($data['new_password']);
            	User::where('id', Auth::User()->id) -> update(['password' => $new_password]);
            	return redirect() -> back() -> with('flash_message_success', 'Password has been updated.');
            } else {
            	return redirect() -> back() -> with('flash_message_error', 'Current password is incorrect.');
            }
        }
    }

    public function logout() {
    	Auth::logout();
    	Session::forget('frontSession');
    	return redirect('/');
    }
}
