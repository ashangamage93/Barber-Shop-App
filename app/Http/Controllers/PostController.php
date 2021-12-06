<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_post= DB::table('posts')
			->get();
		return view('Admin/Post/list_post', ['list_post' => $list_post, 'user' => Auth::user()]);
	}

	public function insert()
	{
		return view('Admin/Post/insert_post', ['user' => Auth::user()]);
	}

	public function view($postId)
	{
		$post = DB::table('posts')
			->where('id', $postId)
			->get();
		return view('Admin/Post/view_post', ['post' => $post, 'user' => Auth::user()]);
	}

	public function edit($postId)
	{
		$post = DB::table('posts')
			->where('id', $postId)
			->get();
		return view('Admin/Post/edit_post', ['post' => $post, 'user' => Auth::user()]);
	}

	public function delete($postId)
	{
		$post = DB::table('posts')
			->where('id', $postId)
			->get();
		return view('Admin/post/delete_post', ['post' => $post, 'user' => Auth::user()]);
	}

	public function postInsert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'description' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/post/insert')
				->withErrors($validator)
				->withInput();
		} else {
			$title = $request->input('title');
			$description = $request->input('description');
			DB::table('posts')->insert([
				'title' => $title,
				'description' => $description,
			]);
			return redirect('/admin/post')->with(['title' => 'Added Successfully', 'content' => 'You post was created successfully', 'type' => 'success']);
		}
	}

	public function postEdit(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'id' => 'required',
			'title' => 'required',
			'description' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/post/edit/' . $request->input('id'))
				->withErrors($validator)
				->withInput();
		} else {
			$id = $request->input('id');
			$title = $request->input('title');
			$description = $request->input('description');
			DB::table('posts')
				->where('id', $id)
				->update(['title' => $title, 'description' => $description]);
			return redirect('/admin/post')->with(['title' => 'Updated Successfully', 'content' => 'You post was updated successfully', 'type' => 'success']);
		}
	}

	public function postDelete(Request $request)
	{
		$id = $request->input('id');
		try {
			DB::table('posts')
				->where('id', $id)
				->delete();
			return redirect('/admin/post')->with(['title' => 'Deleted Successfully', 'content' => 'Your post was deleted successfully', 'type' => 'success']);
		} catch (QueryException $ex) {
			return redirect('/admin/post')->with(['title' => 'Record can not delete', 'content' => 'Your post has constraints in the database', 'type' => 'delete']);
		}
	}
}
