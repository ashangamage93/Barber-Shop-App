<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class EventController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_event= DB::table('events')
			->get();
		return view('Admin/Event/list_event', ['list_event' => $list_event, 'user' => Auth::user()]);
	}

	public function insert()
	{
		return view('Admin/Event/insert_event', ['user' => Auth::user()]);
	}

	public function view($eventId)
	{
		$event = DB::table('events')
			->where('id', $eventId)
			->get();
		return view('Admin/Event/view_event', ['event' => $event, 'user' => Auth::user()]);
	}

	public function edit($eventId)
	{
		$event = DB::table('events')
			->where('id', $eventId)
			->get();
		return view('Admin/Event/edit_event', ['event' => $event, 'user' => Auth::user()]);
	}

	public function delete($categoryId)
	{
		$event= DB::table('events')
			->where('id', $categoryId)
			->get();
		return view('Admin/Event/delete_event', ['event' => $event, 'user' => Auth::user()]);
	}

	public function postInsert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'content' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/event/insert')
				->withErrors($validator)
				->withInput();
		} else {
			$title = $request->input('title');
			$content = $request->input('content');
			DB::table('events')->insert([
				'title' => $title,
				'content' => $content,
			]);
			return redirect('/admin/event')->with(['title' => 'Added Successfully', 'content' => 'You event was created successfully', 'type' => 'success']);
		}
	}

	public function postEdit(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'id' => 'required',
			'title' => 'required',
			'content' => 'required'
		]);

		if ($validator->fails()) {
			return redirect('admin/event/edit/' . $request->input('id'))
				->withErrors($validator)
				->withInput();
		} else {
			$id = $request->input('id');
			$title = $request->input('title');
			$content = $request->input('content');
			DB::table('events')
				->where('id', $id)
				->update(['title' => $title, 'content' => $content]);
			return redirect('/admin/event')->with(['title' => 'Updated Successfully', 'content' => 'You event was updated successfully', 'type' => 'success']);
		}
	}

	public function postDelete(Request $request)
	{
		$id = $request->input('id');
		try {
			DB::table('events')
				->where('id', $id)
				->delete();
			return redirect('/admin/event')->with(['title' => 'Deleted Successfully', 'content' => 'Your event was deleted successfully', 'type' => 'success']);
		} catch (QueryException $ex) {
			return redirect('/admin/event')->with(['title' => 'Record can not delete', 'content' => 'Your event has constraints in the database', 'type' => 'delete']);
		}
	}
}
