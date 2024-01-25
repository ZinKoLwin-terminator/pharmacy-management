
@extends('admin.layouts.app');

@section('content')
<div class="pagetitle">
    <h1>Edit Invoices</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Invoices</h5>

                    <form action="{{url('admin/invoices/edit/'.$oldRecord->id)}}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                   Customers Name <span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select name="customers_id"  class="form-control " required>
                                        <option value="">Select Customer Name</option>

                                        @foreach ($customers as $value)
                                            <option  {{($value->id == $oldRecord->customers_id) ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    Net Total<span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="net_total" class="form-control"  value="{{$oldRecord->net_total}}"required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    Invoices Date  <span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="date" name="invoices_date" class="form-control" value="{{$oldRecord->invoices_date}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    Total Amount<span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_amount" class="form-control" value="{{$oldRecord->total_amount}}"  required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    Total Discount<span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_discount" class="form-control" value="{{$oldRecord->total_discount}}"  required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>


                </div>
            </div>
        </div>
    </div>
</section>

   @endsection
