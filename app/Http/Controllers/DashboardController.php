<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Medicine;
use App\Models\MedicinesStock;
use App\Models\Supplier;
use App\Models\Invoice;
use App\Models\Purchase;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['TotalCustomers'] = Customer::count();
        $data['TotalMedicines'] = Medicine::count();
        $data['TotalMedicineStocks'] = MedicinesStock::count();
        $data['TotalSuppliers'] = Supplier::count();
        $data['TotalInvoices'] = Invoice::count();
        $data['TotalPurchases'] = Purchase::count();
        return view('admin.dashboard.list', $data);
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

        //profile

        // if (!empty($request->file('profile_image'))) {
        //     if (!empty($save->profile_image) && file_exists('
        //     upload/profile/' . $save->profile_image)) {
        //         unlink('upload/profile/' . $save->profile_image);
        //     }

        //     $file = $request->file('profile_image');
        //     $randomStr = Str::random(30);
        //     $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        //     $file->move('upload/profile/', $filename);
        //     $save->profile_image = $filename;
        // }

        if (!empty($request->file('profile_image'))) {
            if (!empty($save->profile_image) && file_exists('upload/profile/' . $save->profile_image)) {
                unlink('upload/profile/' . $save->profile_image);
            }

            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/profile/', $filename);
            $save->profile_image = $filename;
        }


        $save->save();

        return redirect('admin/my_account')->with('success', "Profile successfully update");
    }
}
