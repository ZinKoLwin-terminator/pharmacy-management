<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


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

    public function forgot_post(Request $request)
    {
        // dd($request->all());
        $count = User::where('email', '=', $request->email)->count();
        if ($count > 0) {
            $user = User::where('email', '=', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', "Password has been reset .Please check your spam or junk mail folder");
            // Mail::to($user->email)->send(new ForgotPasswordMail($user));
            // return redirect()->back()->with('success', 'Password has been reset.Please check your SPAM or junk mail folder.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Email not found in the system.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
