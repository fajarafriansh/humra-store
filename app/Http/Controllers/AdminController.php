<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
Use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    public function login(Request $request) {
    	if ($request -> isMethod('post')) {
    		$data = $request -> input();
    		if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '1'])) {
				// Session::put('adminSession', $data['email']);
    			return redirect('/admin');
    		} else {
    			return redirect('/admin/login') -> with('flash_message_error', 'Invalid Username or Password');
    		}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard() {
        // if (Session::has('adminSession')) {

        // } else {
        //     return redirect('/admin') -> with('flash_message_error', 'Please login to access the dashboard');
        // }
        return view('admin.dashboard');
    }

    public function settings() {
        return view('admin.settings.settings');
    }

    public function securitySettings() {
    	return view('admin.settings.security_settings');
    }

    public function checkPass(Request $request) {
        $data = $request -> all();
        $current_password = $data['current_pass'];
        $check_password = User::where(['admin' => '1']) -> first();
        if (Hash::check($current_password, $check_password -> password)) {
            echo "true"; die;
        } else {
            echo "false"; die;
        }
    }

    public function updatePass(Request $request) {
        if ($request -> isMethod('post')) {
            $data = $request -> all();
            $check_password = User::where(['admin' => '1']) -> first();
            $current_password = $data['current_pass'];
            if (Hash::check($current_password, $check_password -> password)) {
                $password = bcrypt($data['new_pass']);
                User::where('id', '1') -> update(['password' => $password]);
                return redirect('/admin/settings/security') -> with('flash_message_success', 'Password update successfully.');
            } else {
                return redirect('/admin/settings/security') -> with('flash_message_error', 'Incorrect current password.');
            }
        }
    }

    public function logout() {
        Session::flush();
        return redirect('/admin/login') -> with('flash_message_success', 'Logged Out Successfully');
    }
}
