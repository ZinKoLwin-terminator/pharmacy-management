<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;

class MedicineController extends Controller
{
    public function medicines(Request $request)
    {
        $data['getRecord'] = Medicine::get();

        return view('admin.medicines.list', $data);
    }

    public function add_medicines(Request $request)
    {
        return view('admin.medicines.add');
    }

    public function add_update_M(Request $request)
    {


        $SaveUpdate = new Medicine;
        $SaveUpdate->name = $request->name;
        $SaveUpdate->packing = $request->packing;
        $SaveUpdate->generic_name = $request->generic_name;
        $SaveUpdate->supplier_name = $request->supplier_name;

        $SaveUpdate->save();

        return redirect('admin/medicines')->with('success', 'Medicines successfully saved');
    }

    public function edit_medicines($id)
    {
        $data['getRecord'] = Medicine::find($id);

        return view('admin.medicines.edit', $data);
    }

    public function add_update_edit($id = '', Request $request)
    {

        $SaveUpdate = Medicine::find($id);

        $SaveUpdate->name = $request->name;
        $SaveUpdate->packing = $request->packing;
        $SaveUpdate->generic_name = $request->generic_name;
        $SaveUpdate->supplier_name = $request->supplier_name;

        $SaveUpdate->save();

        return redirect('admin/medicines')->with('success', 'Medicines successfully updated');
    }
}
