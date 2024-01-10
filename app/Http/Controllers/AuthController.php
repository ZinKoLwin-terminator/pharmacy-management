<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function forgot(Request $request)
    {
        return view('auth.forgot');
    }

    public function login_post(Request $request)
    {
        // $password = Hash::make('12345678');
        // dd($password);
        // $2y$12$.4tqEWzVsn4Mj5GNkZg2huuwbqEMNsKvWClgoyaqnwQCOmKvdfISq

        // dd($request->all());
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], true)) {
            if (Auth::User()->is_role == '1') {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->back()->with('error', 'Please
                enter the correct credentials');
            }
        } else {
            return redirect()->back()->with('error', 'Please
            enter the correct credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
