<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ContactController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$list_category = DB::table('contacts')
			->get();
		return view('Admin/Contact/list_contact', ['list_contact' => $list_category, 'user' => Auth::user()]);
	}


	public function view($contactId)
	{
		$contact = DB::table('contacts')
			->where('id', $contactId)
			->get();
		return view('Admin/Contact/view_contact', ['contact' => $contact, 'user' => Auth::user()]);
	}

	public function delete($contactId)
	{
		$contact = DB::table('contacts')
			->where('id', $contactId)
			->get();
		return view('Admin/Contact/delete_contact', ['contact' => $contact, 'user' => Auth::user()]);
	}

	public function postDelete(Request $request)
	{
		$id = $request->input('id');
		try {
			DB::table('contacts')
				->where('id', $id)
				->delete();
			return redirect('/admin/contact')->with(['title' => 'Deleted Successfully', 'content' => 'Your contact was deleted successfully', 'type' => 'success']);
		} catch (QueryException $ex) {
			return redirect('/admin/contact')->with(['title' => 'Record can not delete', 'content' => 'Your contact has constraints in the database', 'type' => 'delete']);
		}
	}
}
