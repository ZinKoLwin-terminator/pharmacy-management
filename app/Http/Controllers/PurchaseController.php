<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;

use App\Models\Invoice;

use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {

        $data['getRecord'] = Purchase::get();


        return view('admin.purchases.list', $data);
    }

    public function  create()
    {
        $data['suppliers'] = Supplier::get();

        $data['invoices'] = Invoice::get();


        return view('admin.purchases.add', $data);
    }

    public function store(Request $request)
    {
        // @dd($request->all());

        $save = new Purchase;

        $save->suppliers_id = $request->suppliers_id;
        $save->invoices_id = $request->invoices_id;
        $save->voucher_number = $request->voucher_number;
        $save->purchase_date = $request->purchase_date;
        $save->total_amount = $request->total_amount;
        $save->payment_status = $request->payment_status;

        $save->save();

        return redirect('admin/purchases')->with('success', "Purchases successfully created");
    }

    public function edit($id)
    {
        $data['oldRecord'] = Purchase::find($id);
        $data['suppliers'] = Supplier::get();
        $data['invoices'] = Invoice::get();
        return view('admin.purchases.edit', $data);
    }

    public function update($id, Request $request)
    {
        $saveUpdate = Purchase::find($id);
        $saveUpdate->suppliers_id = $request->suppliers_id;
        $saveUpdate->invoices_id = $request->invoices_id;
        $saveUpdate->voucher_number = $request->voucher_number;
        $saveUpdate->purchase_date = $request->purchase_date;
        $saveUpdate->total_amount = $request->total_amount;
        $saveUpdate->payment_status = $request->payment_status;

        $saveUpdate->save();

        return redirect('admin/purchases')->with('success', "Purchases successfully updated");
    }

    public function delete($id)
    {
        $deleteRecord = Purchase::find($id);
        $deleteRecord->delete();

        return redirect('admin/purchases')->with('success', "Purchases successfully deleted!");
    }
}
