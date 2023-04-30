<?php

namespace App\Http\Controllers;

use App\Models\Admin_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{

    public function message()
    {
        return response()->json(["message" => "Unauthenticated"]);
    }

    public function index()
    {
        if ((Session::has('DeveloperUser_type')) && (Session::has('DeveloperUser_id'))) {
            if (Session::get('DeveloperUser_id') > 0 && Session::get('DeveloperUser_type') == "ADMIN") {
                return redirect('/admin/dashboard')->with("info", "You are already logged in.");
            }
        }
        $page_title = 'Sign in';
        return view('login', compact('page_title'));
    }

    public function loginCheck(Request $request)
    {
        $validation =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validation->fails()) {
            Session::flash('error', json_encode($validation->getMessageBag()->all()));
            return redirect('/');
        } else {
            $data = $request->post();
            $user = Admin_model::where('email', '=', $data['email']);

            $user_count = $user->count();
            $user_data = $user->first();
            if (Hash::check($data['password'], $user_data['password'])) {

                if ($user_count == 1 && $user_data->user_type == 'ADMIN' && $user_data->status != "APPROVED") {
                    Session::flash('error', 'Your account is not approved yet.');
                    return redirect('/');
                }

                if ($user_count == 1 && $user_data->status == "APPROVED") {
                    Session::put('DeveloperUsername', $user_data->username);
                    Session::put('DeveloperUser_type', $user_data->user_type);
                    Session::put('DeveloperUser_id', $user_data->id);
                    if ($user_data->user_type == "ADMIN") {
                        return redirect('/admin/events-report')->with('success', 'Login Success');
                    } else {
                        Session::flush();
                        Session::flash('error', 'Unauthorized user role');
                        return redirect('/');
                    }
                } else if ($user_count == 1 && $user_data->status == "BLOCKED") {
                    return redirect('/')->with('error', 'Account Blocked!');
                } else if ($user_count == 1 && $user_data->status == "PENDING") {
                    return redirect('/')->with('info', 'Account Verification Is Pending!');
                } else {
                    return redirect('/')->with('error', 'Invalid Credential!');
                }
            } else {
                return redirect('/')->with('error', 'Incorrect Password');
            }
        }
    }

    public function signOut()
    {
        Session::flush();
        return redirect('/')->with('success', 'You Are Logout!');
    }
}
