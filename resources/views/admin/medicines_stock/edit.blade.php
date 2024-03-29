

@extends('admin.layouts.app');

@section('content')
<div class="pagetitle">
    <h1>Edit Medicines</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Medicines</h5>

                    <form action="{{url('admin/medicines_stock/edit/'.$oldRecord->id)}}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                   Medicine Name <span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select name="medicines_id"  class="form-control" required>
                                        <option value="">Select Medicine Name</option>

                                        @foreach ($getRecord as $value)
                                            <option {{($value->id == $oldRecord->medicines_id) ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    Batch ID<span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="batch_id" class="form-control"  value="{{$oldRecord->batch_id}}"required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    Expiry Date  <span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="date" name="expiry_date" class="form-control" value="{{$oldRecord->expiry_date}}"  required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    Quantity<span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="quantity" class="form-control" value="{{$oldRecord->quantity}}"  required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    MRP<span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="mrp" class="form-control" value="{{$oldRecord->mrp}}"  required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    Rate<span style="color: red">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="rate" class="form-control" value="{{$oldRecord->rate}}"  required>
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
