<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_user = DB::table('users')
			->get();
		return view('Admin/User/list_user', ['list_user' => $list_user, 'user' => Auth::user()]);
	}

	public function insert()
	{
		return view('Admin/User/insert_user', ['user' => Auth::user()]);
	}

	public function view($userId)
	{
		$admin = DB::table('users')
			->where('id', $userId)
			->get();
		return view('Admin/User/view_user', ['admin' => $admin, 'user' => Auth::user()]);
	}

	public function edit($categoryId)
	{
		$admin = DB::table('users')
			->where('id', $categoryId)
			->get();
		return view('Admin/User/edit_user', ['admin' => $admin, 'user' => Auth::user()]);
	}

	public function delete($categoryId)
	{
		$admin = DB::table('users')
			->where('id', $categoryId)
			->get();
		return view('Admin/User/delete_user', ['admin' => $admin, 'user' => Auth::user()]);
	}

	public function postInsert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'username' => 'required',
			'password' => 'required',
			'email' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/user/insert')
				->withErrors($validator)
				->withInput();
		} else {
			$username = $request->input('username');
			$password = bcrypt($request->input('password'));
			$email = $request->input('email');
			DB::table('users')->insert([
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'created' =>  date('Y-m-d h:i:s', time()),
				'status' =>  TRUE
			]);
			return redirect('/admin/user')->with(['title' => 'Added Successfully', 'content' => 'You user was created successfully', 'type' => 'success']);
		}
	}

	public function postEdit(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'id' => 'required',
			'username' => 'required',
			'password' => 'required',
			'email' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/user/edit/' . $request->input('id'))
				->withErrors($validator)
				->withInput();
		} else {
			$id = $request->input('id');
			$username = $request->input('username');
			$password = bcrypt($request->input('password'));
			$email = $request->input('email');
			DB::table('users')
				->where('id', $id)
				->update(['username' => $username, 'password' => $password, 'email' => $email]);
			return redirect('/admin/user')->with(['title' => 'Updated Successfully', 'content' => 'You user was updated successfully', 'type' => 'success']);
		}
	}

	public function postDelete(Request $request)
	{
		$id = $request->input('id');
		try {
			DB::table('users')
				->where('id', $id)
				->delete();
			return redirect('/admin/user')->with(['title' => 'Deleted Successfully', 'content' => 'Your user was deleted successfully', 'type' => 'success']);
		} catch (QueryException $ex) {
			return redirect('/admin/user')->with(['title' => 'Record can not delete', 'content' => 'Your user has constraints in the database', 'type' => 'delete']);
		}
	}
}
