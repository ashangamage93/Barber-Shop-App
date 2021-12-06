<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdPostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_adpost = DB::table('adposts')->orderBy('id')->get();
		return view('Admin/AdPost/list_adpost', ['list_adpost' => $list_adpost, 'user' => Auth::user()]);
	}

	public function insert()
	{
		return view('Admin/AdPost/insert_adpost', ['user' => Auth::user()]);
	}

	public function view($adPostId)
	{
		$adpost = DB::table('adposts')->where('id', $adPostId)->get();
		return view('Admin/AdPost/view_adpost', ['adpost' => $adpost, 'user' => Auth::user()]);
	}

	public function edit($adPostId)
	{
		$adpost = DB::table('adposts')->where('id', $adPostId)->get();
		return view('Admin/AdPost/edit_adpost', ['adpost' => $adpost, 'user' => Auth::user()]);
	}

	public function delete($adPostId)
	{
		$adpost = DB::table('adposts')->where('id', $adPostId)->get();
		return view('Admin/AdPost/delete_adpost', ['adpost' => $adpost, 'user' => Auth::user()]);
	}

	public function postInsert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'content' => 'required|max:255',
			'time_start' => 'required',
			'time_end' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/adpost/insert')
				->withErrors($validator)
				->withInput();
		} else {
			$content = $request->input('content');
			$time_start = $request->input('time_start');
			$time_end = $request->input('time_end');
			DB::table('adposts')->insert([
				'content' => $content,
				'time_start' => $time_start,
				'time_end' => $time_end
			]);
			return redirect('/admin/adpost')->with(['title' => 'Added Successfully', 'content' => 'You ad post was created successfully', 'type' => 'success']);
		}
	}

	public function postEdit(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'id' => 'required',
			'content' => 'required|max:255',
			'time_start' => 'required',
			'time_end' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/adpost/edit/'.$request->input('id'))
				->withErrors($validator)
				->withInput();
		} else {
			$id = $request->input('id');
			$content = $request->input('content');
			$time_start = $request->input('time_start');
			$time_end = $request->input('time_end');
			DB::table('adposts')
				->where('id', $id)
				->update(['content' => $content, 'time_start' => $time_start, 'time_end' => $time_end]);
			return redirect('/admin/adpost')->with(['title' => 'Updated Successfully', 'content' => 'You ad post was updated successfully', 'type' => 'success']);
		}
	}

	public function postDelete(Request $request)
	{
		$id = $request->input('id');
		DB::table('adposts')
			->where('id', $id)
			->delete();
		return redirect('/admin/adpost')->with(['title' => 'Deleted Successfully', 'content' => 'Your ad post was deleted successfully', 'type' => 'delete']);
	}
}
