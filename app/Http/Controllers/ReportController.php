<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:users');
	}

	public function appointment()
	{
		$list_appointment = DB::select('SELECT a.id, s.name, u.username AS user, c.username AS customer, a.time_start, a.time_end 
FROM appointments a, services s, users u, customers c WHERE a.service_id = s.id AND a.user_id = u.id AND a.customer_id = c.id');
		$pdf = PDF::loadView('Admin/Report/appointment_report',  ['list_appointment' => $list_appointment, 'user' => Auth::user()]);
		return $pdf->download('appointment_report.pdf');
	}

	public function service()
	{
		$list_service = DB::select('SELECT s.id, s.name, s.amount, s.status, u.username, sc.name AS sub_category, i.directory, i.image
 FROM services s, users u, sub_categories sc, images i WHERE u.id = s.user_id AND sc.id = s.sub_category_id AND i.id = s.image_id');
		$pdf = PDF::loadView('Admin/Report/service_report', ['list_service' => $list_service, 'user' => Auth::user()]);
		return $pdf->download('service_report.pdf');
	}

	public function customer()
	{
		$list_customer = DB::table('customers')
			->get();
		$pdf = PDF::loadView('Admin/Report/customer_report', ['list_customer' => $list_customer, 'user' => Auth::user()]);
		return $pdf->download('customer_report.pdf');
	}

	public function user()
	{
		$list_user = DB::table('users')
			->get();
		$pdf = PDF::loadView('Admin/Report/user_report', ['list_user' => $list_user, 'user' => Auth::user()]);
		return $pdf->download('user_report.pdf');
	}
}
