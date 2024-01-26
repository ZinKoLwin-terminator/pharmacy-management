<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.list');
    }

    public function my_account(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.my_account.update', $data);
    }

    public function my_account_update(Request $request)
    {

        $save = request()->validate([
            "email" => 'required|unique:users,email,' . Auth::user()->id
        ]);

        $save = User::find(Auth::user()->id);
        $save->name = trim($request->name);
        $save->email = trim($request->email);

        if (!empty($request->password)) {
            $save->password = Hash::make($request->password);
        }

        $save->save();

        return redirect('admin/my_account')->with('success', "Profile successfully update");
    }
}
