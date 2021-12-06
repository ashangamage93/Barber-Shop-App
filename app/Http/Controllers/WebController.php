<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index()
    {
        $list_event = DB::table('events')
            ->get();
        return view('Web/index', ['list_event' => $list_event]);
    }

    public function about() {
        return view('Web/about');
    }

    public function gallery()
    {
        $list_image = DB::table('images')
            ->where('directory', 'gallery')
            ->get();
	    return view('Web/gallery', ['list_image' => $list_image]);
    }

	public function contact()
	{
		return view('Web/contact');
	}

	public function blog()
	{
		$list_post= DB::table('posts')
			->get();
		return view('Web/blog', ['list_post' => $list_post]);
	}

	public function services()
	{
		$list_service = DB::select('SELECT s.id, s.name, s.amount, s.status, u.username, sc.name AS sub_category, i.directory, i.image
 FROM services s, users u, sub_categories sc, images i WHERE u.id = s.user_id AND sc.id = s.sub_category_id AND i.id = s.image_id');
		return view('Web/services', ['list_service' => $list_service]);
	}

    public function contact_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('contact')
                ->withErrors($validator)
                ->withInput();
        } else {
            $name = $request->input('name');
            $email = $request->input('email');
            $telephone = $request->input('telephone');
            $message = $request->input('message');

            DB::table('contacts')->insert([
                'name' => $name,
                'email' => $email,
                'telephone' => $telephone,
                'message' => $message,
                'created' =>  date('Y-m-d h:i:s', time())
            ]);
            return redirect('contact')->with(['title' => 'Added Successfully', 'content' => 'You category was created successfully', 'type' => 'success']);
        }
    }
}
