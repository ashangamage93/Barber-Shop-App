<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_customer = DB::table('customers')
			->get();
		return view('Admin/Customer/list_customer', ['list_customer' => $list_customer, 'user' => Auth::user()]);
	}

	public function insert()
	{
		return view('Admin/Customer/insert_customer', ['user' => Auth::user()]);
	}

	public function view($customerId)
	{
		$customer = DB::table('customers')
			->where('id', $customerId)
			->get();
		return view('Admin/Customer/view_customer', ['customer' => $customer, 'user' => Auth::user()]);
	}

	public function delete($categoryId)
	{
		$customer = DB::table('customers')
			->where('id', $categoryId)
			->get();
		return view('Admin/Customer/delete_customer', ['customer' => $customer, 'user' => Auth::user()]);
	}

	public function postInsert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'username' => 'required',
			'password' => 'required',
			'email' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/customer/insert')
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
			return redirect('/admin/customer')->with(['title' => 'Added Successfully', 'content' => 'You customer was created successfully', 'type' => 'success']);
		}
	}

	public function postDelete(Request $request)
	{
		$id = $request->input('id');
		try {
			DB::table('customers')
				->where('id', $id)
				->delete();
			return redirect('/admin/customer')->with(['title' => 'Deleted Successfully', 'content' => 'Your customer was deleted successfully', 'type' => 'success']);
		} catch (QueryException $ex) {
			return redirect('/admin/customer')->with(['title' => 'Record can not delete', 'content' => 'Your customer has constraints in the database', 'type' => 'delete']);
		}
	}
}
