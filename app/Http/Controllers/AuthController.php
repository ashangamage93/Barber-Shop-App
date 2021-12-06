<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
	public function profile()
	{
		return view('Admin/Auth/profile_auth', ['user' => Auth::user()]);
	}

	public function sign_in()
	{
		return view('Admin/Auth/sign_in_auth');
	}

	public function sign_up()
	{
		return view('Admin/Auth/sign_up_auth');
	}

	public function sign_in_post(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'username' => 'required',
			'password' => 'required',
			'role' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('auth/sign_in')
				->withErrors($validator)
				->withInput();
		} else {
			$user_data = array(
				'username' => $request->input('username'),
				'password' => $request->input('password')
			);
			if ($request->input('role') === 'admin') {

					if (Auth::guard('users')->attempt($user_data)) {
						return redirect('/admin/index');
					} else {
						return Redirect::to('auth/sign_in')->withErrors(['Error', 'Please enter correct username and password']);
					}

			} else {
				if (Auth::guard('customers')->attempt($user_data)) {
					return redirect('shop/account');
				} else {
					return Redirect::to('auth/sign_in')->withErrors(['Please enter correct username and password ']);
				}
			}
		}
	}

	public function sign_out_post(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/auth/sign_in');
	}

	public function sign_up_post(Request $request)
	{
	    $validator = Validator::make($request->all(), [
		    'username' => 'required',
		    'email' => 'required',
		    'password' => 'required'
	    ]);

	    if ($validator->fails()) {
		    return redirect('auth/sign_up')
			    ->withErrors($validator)
			    ->withInput();
	    } else {
		    $username = $request->input('username');
		    $password = bcrypt($request->input('password'));
		    $email = $request->input('email');
		    DB::table('customers')->insert([
			    'username' => $username,
			    'password' => $password,
			    'email' => $email,
			    'created' =>  date('Y-m-d h:i:s', time())
		    ]);
		    return redirect('/auth/sign_in');
	    }
	}
}
