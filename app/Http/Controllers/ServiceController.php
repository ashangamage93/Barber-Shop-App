<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ServiceController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_service = DB::select('SELECT s.id, s.name, s.amount, s.status, u.username, sc.name AS sub_category, i.directory, i.image
 FROM services s, users u, sub_categories sc, images i WHERE u.id = s.user_id AND sc.id = s.sub_category_id AND i.id = s.image_id');
		return view('Admin/Service/list_service', ['list_service' => $list_service, 'user' => Auth::user()]);
	}

	public function insert()
	{
		$list_users = DB::table('users')->get();
		$list_sub_categories = DB::table('sub_categories')->get();
		$list_images = DB::table('images')->where('directory', 'service')->get();
		return view('Admin/Service/insert_service',
			['user' => Auth::user(),
				'list_users' => $list_users,
				'list_sub_categories' => $list_sub_categories,
				'list_images' => $list_images]);
	}

	public function view($serviceId)
	{
		$service = DB::select('SELECT s.id, s.name, s.amount, s.status, u.username, sc.name AS sub_category, i.directory, i.image
 FROM services s, users u, sub_categories sc, images i WHERE s.id = ' . $serviceId . ' AND u.id = s.user_id AND sc.id = s.sub_category_id AND i.id = s.image_id');
		return view('Admin/Service/view_service', ['service' => $service, 'user' => Auth::user()]);
	}

	public function edit($serviceId)
	{
		$list_users = DB::table('users')->get();
		$list_sub_categories = DB::table('sub_categories')->get();
		$list_images = DB::table('images')->where('directory', 'service')->get();
		$service = DB::table('services')
			->where('id', $serviceId)
			->get();
		return view('Admin/Service/edit_service',
			['service' => $service,
				'user' => Auth::user(),
				'list_users' => $list_users,
				'list_sub_categories' => $list_sub_categories,
				'list_images' => $list_images]);
	}

	public function delete($serviceId)
	{
		$service = DB::select('SELECT s.id, s.name, s.amount, s.status, u.username, sc.name AS sub_category, i.directory, i.image
 FROM services s, users u, sub_categories sc, images i WHERE s.id = ' . $serviceId . ' AND u.id = s.user_id AND sc.id = s.sub_category_id AND i.id = s.image_id');
		return view('Admin/Service/delete_service', ['service' => $service, 'user' => Auth::user()]);
	}

	public function postInsert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'amount' => 'required',
			'status' => 'required',
			'user_id' => 'required',
			'sub_category_id' => 'required',
			'image_id' => 'required',
		]);

		if ($validator->fails()) {
			return redirect('admin/service/insert')
				->withErrors($validator)
				->withInput();
		} else {
			$name = $request->input('name');
			$amount = $request->input('amount');
			$status = $request->input('status');
			$user_id = $request->input('user_id');
			$sub_category_id = $request->input('sub_category_id');
			$image_id = $request->input('image_id');
			DB::table('services')->insert([
				'name' => $name,
				'amount' => $amount,
				'status' => $status,
				'user_id' => $user_id,
				'sub_category_id' => $sub_category_id,
				'image_id' => $image_id
			]);
			return redirect('/admin/service')->with(['title' => 'Added Successfully', 'content' => 'You service was created successfully', 'type' => 'success']);
		}
	}

	public function postEdit(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'id' => 'required',
			'name' => 'required',
			'amount' => 'required',
			'status' => 'required',
			'user_id' => 'required',
			'sub_category_id' => 'required',
			'image_id' => 'required',
		]);

		if ($validator->fails()) {
			return redirect('admin/service/edit/' . $request->input('id'))
				->withErrors($validator)
				->withInput();
		} else {
			$id = $request->input('id');
			$name = $request->input('name');
			$amount = $request->input('amount');
			$status = $request->input('status');
			$user_id = $request->input('user_id');
			$sub_category_id = $request->input('sub_category_id');
			$image_id = $request->input('image_id');
			DB::table('services')
				->where('id', $id)
				->update(['name' => $name, 'amount' => $amount, 'status' => $status, 'user_id' => $user_id, 'sub_category_id' => $sub_category_id, 'image_id' => $image_id]);
			return redirect('/admin/service')->with(['title' => 'Updated Successfully', 'content' => 'You service was updated successfully', 'type' => 'success']);
		}
	}

	public function postDelete(Request $request)
	{
		try {
			$id = $request->input('id');
			DB::table('services')
				->where('id', $id)
				->delete();
			return redirect('/admin/service')->with(['title' => 'Deleted Successfully', 'content' => 'Your service was deleted successfully', 'type' => 'success']);
		} catch (QueryException $ex) {
			return redirect('/admin/service')->with(['title' => 'Record can not delete', 'content' => 'Your service has constraints in the database', 'type' => 'delete']);
		}
	}
}
