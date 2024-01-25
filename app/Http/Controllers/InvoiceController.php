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
}
