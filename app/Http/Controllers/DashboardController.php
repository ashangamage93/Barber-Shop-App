<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function index()
	{
		$count_appointment = DB::table('appointments')->count();
		$count_service = DB::table('services')->count();
		$count_category = DB::table('categories')->count();
		$count_sub_category = DB::table('sub_categories')->count();
		return view('Admin/Dashboard/list_summary',
			['count_appointment' => $count_appointment,
				'count_service' => $count_service,
				'count_category' => $count_category,
				'count_sub_category' => $count_sub_category,
				'user' => Auth::user()]);
	}
}
