<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_category = DB::table('categories')
			->get();
		return view('Admin/Category/list_category', ['list_category' => $list_category, 'user' => Auth::user()]);
	}

	public function insert()
	{
		return view('Admin/Category/insert_category', ['user' => Auth::user()]);
	}

	public function view($categoryId)
	{
		$category = DB::table('categories')
			->where('id', $categoryId)
			->get();
		return view('Admin/Category/view_category', ['category' => $category, 'user' => Auth::user()]);
	}

	public function edit($categoryId)
	{
		$category = DB::table('categories')
			->where('id', $categoryId)
			->get();
		return view('Admin/Category/edit_category', ['category' => $category, 'user' => Auth::user()]);
	}

	public function delete($categoryId)
	{
		$category = DB::table('categories')
			->where('id', $categoryId)
			->get();
		return view('Admin/Category/delete_category', ['category' => $category, 'user' => Auth::user()]);
	}

	public function postInsert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/category/insert')
				->withErrors($validator)
				->withInput();
		} else {
			$name = $request->input('name');
			DB::table('categories')->insert([
				'name' => $name,
			]);
			return redirect('/admin/category')->with(['title' => 'Added Successfully', 'content' => 'You category was created successfully', 'type' => 'success']);
		}
	}

	public function postEdit(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'id' => 'required',
			'name' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/category/edit/' . $request->input('id'))
				->withErrors($validator)
				->withInput();
		} else {
			$id = $request->input('id');
			$name = $request->input('name');
			DB::table('categories')
				->where('id', $id)
				->update(['name' => $name]);
			return redirect('/admin/category')->with(['title' => 'Updated Successfully', 'content' => 'You category was updated successfully', 'type' => 'success']);
		}
	}

	public function postDelete(Request $request)
	{
		$id = $request->input('id');
		try {
			DB::table('categories')
				->where('id', $id)
				->delete();
			return redirect('/admin/category')->with(['title' => 'Deleted Successfully', 'content' => 'Your category was deleted successfully', 'type' => 'success']);
		} catch (QueryException $ex) {
			return redirect('/admin/category')->with(['title' => 'Record can not delete', 'content' => 'Your category has constraints in the database', 'type' => 'delete']);
		}
	}
}
