<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customers');
    }

    public function account()
    {
        $list_appointment = DB::select('SELECT a.id, s.name, u.username AS user, c.username AS customer, a.time_start, a.time_end
FROM appointments a, services s, users u, customers c WHERE a.customer_id = ' . Auth::user()->id . ' AND a.service_id = s.id AND a.user_id = u.id AND a.customer_id = c.id');
        return view('Admin/Shop/account', ['list_appointment' => $list_appointment, 'user' => Auth::user()]);
    }

    public function insert()
    {
        $list_services = DB::table('services')->get();
        $list_users = DB::table('users')->get();
        $list_customers = DB::table('customers')->get();
        return view('Admin/Shop/insert_appointment',
            ['user' => Auth::user(),
                'list_services' => $list_services,
                'list_users' => $list_users,
                'list_customers' => $list_customers]);
    }

    public function view($appointmentId)
    {
        $appointment = DB::select('SELECT a.id, s.name, u.username AS user, c.username AS customer, a.time_start, a.time_end
FROM appointments a, services s, users u, customers c WHERE a.id = ' . $appointmentId . ' AND a.service_id = s.id AND a.user_id = u.id AND a.customer_id = c.id');
        return view('Admin/Shop/view_appointment', ['appointment' => $appointment, 'user' => Auth::user()]);
    }

    public function edit($appointmentId)
    {
        $list_services = DB::table('services')->get();
        $list_users = DB::table('users')->get();
        $list_customers = DB::table('customers')->get();
        $appointment = DB::table('appointments')
            ->where('id', $appointmentId)
            ->get();
        return view('Admin/Shop/edit_appointment',
            ['appointment' => $appointment,
                'user' => Auth::user(),
                'list_services' => $list_services,
                'list_users' => $list_users,
                'list_customers' => $list_customers]);
    }

    public function delete($appointmentId)
    {
        $appointment = DB::select('SELECT a.id, s.name AS service, u.username AS user, c.username AS customer, a.time_start, a.time_end
FROM appointments a, services s, users u, customers c WHERE a.id = ' . $appointmentId . ' AND a.service_id = s.id AND a.user_id = u.id AND a.customer_id = c.id');
        return view('Admin/Shop/delete_appointment', ['appointment' => $appointment, 'user' => Auth::user()]);
    }

    public function postInsert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_id' => 'required',
            'user_id' => 'required',
            'time_end' => 'required',
            'time_start' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('shop/appointment/insert')
                ->withErrors($validator)
                ->withInput();
        } else {
            $service_id = $request->input('service_id');
            $user_id = $request->input('user_id');
            $customer_id = Auth::user()->id;
            $time_start = $request->input('time_start');
            $time_end = $request->input('time_end');
            DB::table('appointments')->insert([
                'service_id' => $service_id,
                'user_id' => $user_id,
                'customer_id' => $customer_id,
                'time_start' => $time_start,
                'time_end' => $time_end
            ]);
            return redirect('/shop/account')->with(['title' => 'Added Successfully', 'content' => 'You appointment was created successfully', 'type' => 'success']);
        }
    }

    public function postEdit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'service_id' => 'required',
            'user_id' => 'required',
            'time_end' => 'required',
            'time_start' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('shop/account/edit/' . $request->input('id'))
                ->withErrors($validator)
                ->withInput();
        } else {
            $id = $request->input('id');
            $service_id = $request->input('service_id');
            $user_id = $request->input('user_id');
            $customer_id = Auth::user()->id;
            $time_start = $request->input('time_start');
            $time_end = $request->input('time_end');
            DB::table('appointments')
                ->where('id', $id)
                ->update(['service_id' => $service_id, 'user_id' => $user_id, 'customer_id' => $customer_id, 'time_start' => $time_start, 'time_end' => $time_end]);
            return redirect('/shop/account')->with(['title' => 'Updated Successfully', 'content' => 'You appointment was updated successfully', 'type' => 'success']);
        }
    }

    public function postDelete(Request $request)
    {
        $id = $request->input('id');
        try {
            DB::table('appointments')
                ->where('id', $id)
                ->delete();
            return redirect('/shop/account')->with(['title' => 'Deleted Successfully', 'content' => 'Your appointment was deleted successfully', 'type' => 'success']);
        } catch (QueryException $ex) {
            return redirect('/shop/account')->with(['title' => 'Record can not delete', 'content' => 'Your appointment has constraints in the database', 'type' => 'delete']);
        }
    }
}
