<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $data['getRecord'] = Supplier::get();
        $data['meta_title'] = "Suppliers List";
        return view('admin.suppliers.list', $data);
    }

    public function create(Request $request)
    {
        $data['meta_title'] = "Add Supplier";
        return view('admin.suppliers.add', $data);
    }

    public function store(Request $request)
    {
        // @dd($request->all());
        $save = new Supplier;
        $save->suppliers_name = trim($request->suppliers_name);
        $save->suppliers_email = trim($request->suppliers_email);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->save();

        return redirect('admin/suppliers')->with('success', 'Supplier successfully created.');
    }

    public function edit($id, Request $request)
    {
        $data['getRecord'] = Supplier::find($id);
        $data['meta_title'] = "Edit Supplier";
        return view('admin.suppliers.edit', $data);
    }

    public function update($id, Request $request)
    {
        $save = Supplier::find($id);
        $save->suppliers_name = trim($request->suppliers_name);
        $save->suppliers_email = trim($request->suppliers_email);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->save();

        return redirect('admin/suppliers')->with('success', 'Supplier successfully updated.');
    }

    public function delete($id)
    {
        $delete = Supplier::find($id);
        $delete->delete();

        return redirect('admin/suppliers')->with('success', "Supplier successfully deleted");
    }
}
