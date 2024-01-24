<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;

use App\Models\MedicinesStock;

class MedicineController extends Controller
{
    public function medicines(Request $request)
    {
        $data['getRecord'] = Medicine::where('isDeleted', '=', 0)->get();

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

    public function delete_medicines($id)
    {
        $deleteRecord = Medicine::find($id);

        // soft delete
        $deleteRecord->isDeleted = 1;
        $deleteRecord->save();

        // hard delete
        // $deleteRecord->delete();

        return redirect()->back()->with('success', "Record Deleted");
    }

    public function medicines_stock_list()
    {
        $data['getRecord'] = MedicinesStock::get();
        return view('admin.medicines_stock.list', $data);
    }

    public function medicines_stock_add()
    {
        $data['getRecord'] = Medicine::where('isDeleted', '=', 0)->get();
        return view('admin.medicines_stock.add', $data);
    }

    public function medicines_stock_store(Request $request)
    {
        $saveUpdate = new MedicinesStock;

        $saveUpdate->medicines_id = $request->medicines_id;
        $saveUpdate->batch_id = $request->batch_id;
        $saveUpdate->expiry_date = $request->expiry_date;
        $saveUpdate->quantity = $request->quantity;
        $saveUpdate->mrp = $request->mrp;
        $saveUpdate->rate = $request->rate;
        $saveUpdate->save();

        return redirect('admin/medicines_stock')->with('success', 'Medicines Stock successfully saved');
    }

    public function medicines_stock_delete($id, Request $request)
    {
        $deleteRecord = MedicinesStock::find($id);
        $deleteRecord->delete();

        return redirect()->back()->with('success', "Record Deleted!");
    }

    public function medicines_stock_edit($id, Request $request)
    {
        $data['oldRecord'] = MedicinesStock::find($id);
        $data['getRecord'] = Medicine::where('isDeleted', '=', 0)->get();
        return view('admin.medicines_stock.edit', $data);
    }

    public function medicines_stock_edit_update($id, Request $request)
    {
        $saveUpdate = MedicinesStock::find($id);

        $saveUpdate->medicines_id = $request->medicines_id;
        $saveUpdate->batch_id = $request->batch_id;
        $saveUpdate->expiry_date = $request->expiry_date;
        $saveUpdate->quantity = $request->quantity;
        $saveUpdate->mrp = $request->mrp;
        $saveUpdate->rate = $request->rate;
        $saveUpdate->save();

        return redirect('admin/medicines_stock')->with('success', 'Medicines Stock successfully Updated');
    }
}
