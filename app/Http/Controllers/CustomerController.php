<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;



class CustomerController extends Controller
{

    public function customers(Request $request)
    {
        $data['getRecord'] = Customer::getAllRecord();

        return view('admin.customers.list', $data);
    }

    public function add_customers(Request $request)
    {
        return view('admin.customers.add');
    }

    public function insert_add_customers(Request $request)
    {
        //@dd($request->all());

        $save = new Customer;
        $save->name = trim($request->name);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->doctor_name = trim($request->doctor_name);
        $save->doctor_address = trim($request->doctor_address);
        $save->save();

        return redirect('admin/customers')->with('success', 'Customer successfully created.');
    }

    public function edit_customers($id, Request $request)
    {
        $data['getRecord'] = Customer::getSingle($id);
        return view('admin.customers.edit', $data);
    }

    public function update_customers($id, Request $request)
    {
        // $save =  Customer::find($id);
        $save =  Customer::getSingle($id);
        $save->name = trim($request->name);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->doctor_name = trim($request->doctor_name);
        $save->doctor_address = trim($request->doctor_address);
        $save->save();

        return redirect('admin/customers')->with('success', 'Customer successfully updated.');
    }

    public function delete_customers($id)
    {
        $delete_record = Customer::getSingle($id);
        $delete_record->delete();

        return redirect('admin/customers')->with('success', 'Customers successfully delete');
    }
}
