<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_sub_category = DB::select('SELECT sc.id, sc.name, c.name AS category FROM sub_categories sc, categories c WHERE sc.category_id = c.id');
		return view('Admin/SubCategory/list_sub_category', ['list_sub_category' => $list_sub_category, 'user' => Auth::user()]);
	}

	public function insert()
	{
		$list_categories = DB::table('categories')->get();
		return view('Admin/SubCategory/insert_sub_category', ['user' => Auth::user(), 'list_categories' => $list_categories]);
	}

	public function view($subCategoryId)
	{
		$sub_category = DB::select('SELECT sc.id, sc.name, c.name AS category
 FROM sub_categories sc, categories c WHERE sc.id = ' . $subCategoryId . ' AND sc.category_id = c.id');
		return view('Admin/SubCategory/view_sub_category', ['sub_category' => $sub_category, 'user' => Auth::user()]);
	}

	public function edit($subCategoryId)
	{
		$list_categories = DB::table('categories')->get();
		$sub_category = DB::table('sub_categories')
			->where('id', $subCategoryId)
			->get();
		return view('Admin/SubCategory/edit_sub_category',
			['sub_category' => $sub_category,
				'user' => Auth::user(),
				'list_categories' => $list_categories]);
	}

	public function delete($subCategoryId)
	{
		$sub_category = DB::select('SELECT sc.id, sc.name, c.name AS category
 FROM sub_categories sc, categories c WHERE sc.id = ' . $subCategoryId . ' AND sc.category_id = c.id');
		return view('Admin/SubCategory/delete_sub_category', ['sub_category' => $sub_category, 'user' => Auth::user()]);
	}

	public function postInsert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'category_id' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/sub_category/insert')
				->withErrors($validator)
				->withInput();
		} else {
			$name = $request->input('name');
			$category_id = $request->input('category_id');
			DB::table('sub_categories')->insert([
				'name' => $name,
				'category_id' => $category_id
			]);
			return redirect('/admin/sub_category')->with(['title' => 'Added Successfully', 'content' => 'You sub category was created successfully', 'type' => 'success']);
		}
	}

	public function postEdit(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'id' => 'required',
			'name' => 'required',
			'category_id' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/sub_category/edit/' . $request->input('id'))
				->withErrors($validator)
				->withInput();
		} else {
			$id = $request->input('id');
			$name = $request->input('name');
			$category_id = $request->input('category_id');
			DB::table('sub_categories')
				->where('id', $id)
				->update(['name' => $name, 'category_id' => $category_id]);
			return redirect('/admin/sub_category')->with(['title' => 'Updated Successfully', 'content' => 'You sub category was updated successfully', 'type' => 'success']);
		}
	}

	public function postDelete(Request $request)
	{
		try {
			$id = $request->input('id');
			DB::table('sub_categories')
				->where('id', $id)
				->delete();
			return redirect('/admin/sub_category')->with(['title' => 'Deleted Successfully', 'content' => 'Your sub category was deleted successfully', 'type' => 'success']);
		} catch (QueryException $ex) {
			return redirect('/admin/service')->with(['title' => 'Record can not delete', 'content' => 'Your sub category has constraints in the database', 'type' => 'delete']);
		}
	}
}
