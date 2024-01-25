<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Customer;

class InvoiceController extends Controller
{
    public function index()
    {
        $data['getRecord'] = Invoice::get();
        return view('admin.invoices.list', $data);
    }

    public function create(Request $request)
    {
        $data['getRecord'] = Customer::get();
        return view('admin.invoices.add', $data);
    }

    public function store(Request $request)
    {
        // @dd($request->all());

        $save = new Invoice;


        $save->net_total = $request->net_total;
        $save->invoices_date =  $request->invoices_date;
        $save->customers_id = $request->customers_id;
        $save->total_amount = $request->total_amount;
        $save->total_discount = $request->total_discount;

        $save->save();

        return redirect('admin/invoices')->with('success', "Invoices successfully created");
    }

    public function delete($id)
    {
        $delete = Invoice::find($id);
        $delete->delete();

        return redirect('admin/invoices')->with('success', "Record successfully deleted!");
    }

    public function edit($id, Request $request)
    {
        $data['oldRecord'] = Invoice::find($id);
        $data['customers'] = Customer::get();
        return view('admin.invoices.edit', $data);
    }

    public function update($id, Request $request)
    {
        $saveUpdate = Invoice::find($id);


        $saveUpdate->net_total = trim($request->net_total);
        $saveUpdate->invoices_date =  trim($request->invoices_date);
        $saveUpdate->customers_id = trim($request->customers_id);
        $saveUpdate->total_amount = trim($request->total_amount);
        $saveUpdate->total_discount = trim($request->total_discount);

        $saveUpdate->save();

        return redirect('admin/invoices')->with('success', "Invoices successfully updated");
    }
}
