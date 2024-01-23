<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;

class MedicineController extends Controller
{
    public function medicines(Request $request)
    {

        return view('admin.medicines.list');
    }

    public function add_medicines(Request $request)
    {
        return view('admin.medicines.add');
    }
}
