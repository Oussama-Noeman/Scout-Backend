<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => [
                'required',
                'email'
            ],
            'password' => [
                'required'
            ]
        ]);
        if($validation)
        {
            $creadentials = $request->only('email', 'password');
            if(Auth::attempt($creadentials))
            {
                return redirect('admin/dashboard');
            }else
            {
                return redirect('login')->with('message', 'Login Details are not valid');
            }
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }
}
