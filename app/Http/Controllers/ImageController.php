<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ImageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_image = DB::table('images')
			->get();
		return view('Admin/Image/list_image', ['list_image' => $list_image, 'user' => Auth::user()]);
	}

	public function insert()
	{
		return view('Admin/Image/insert_image', ['user' => Auth::user()]);
	}

	public function postInsert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'directory' => 'required',
			'name' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/images/insert')
				->withErrors($validator)
				->withInput();
		} else {
			$name = $request->input('name');
			$directory = $request->input('directory');
			$imageName = $name.'.'.$request->image->extension();
			$request->image->move(public_path('image/'.$directory), $imageName);

			DB::table('images')->insert([
				'image' => $imageName,
				'directory' => $directory,
			]);
			return redirect('/admin/images')->with(['title' => 'Added Successfully', 'content' => 'You image was uploaded successfully', 'type' => 'success']);
		}
	}

	public function view($imageId)
	{
		$image = DB::table('images')
			->where('id', $imageId)
			->get();
		return view('Admin/Image/view_image', ['image' => $image, 'user' => Auth::user()]);
	}

	public function delete($imageId)
	{
		$image = DB::table('images')
			->where('id', $imageId)
			->get();
		return view('Admin/Image/delete_image', ['image' => $image, 'user' => Auth::user()]);
	}

	public function postDelete(Request $request)
	{
		$id = $request->input('id');
		$directory = $request->input('directory');
		$image = $request->input('image');
		$file_path = "/image/".$directory."/".$image;

		try{
			File::delete($file_path);
			DB::table('images')
				->where('id', $id)
				->delete();
			return redirect('/admin/images')->with(['title' => 'Deleted Successfully', 'content' => 'Your image was deleted successfully', 'type' => 'success']);
		} catch (QueryException $ex) {
			return redirect('/admin/images')->with(['title' => 'File can not delete', 'content' => 'Your image has constraints ', 'type' => 'delete']);
		}
	}
}
