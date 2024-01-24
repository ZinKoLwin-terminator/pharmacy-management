@extends('admin.layouts.app')
  @section('content')

  <div class="pagetitle">
    <h1>Medicines Stock List</h1>
  </div>

  <section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{url('admin/medicines_stock/add')}}" class="btn btn-primary">
                        Add New Medicine Stock</a>
                    </h5>

                </div>
            </div>
        </div>
    </div>
  </section>
  @endsection

