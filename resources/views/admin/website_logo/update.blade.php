
{{-- @dd($invoices) --}}

@extends('admin.layouts.app');

@section('content')
<div class="pagetitle">
    <h1>Website Logo Update</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Website Logo Update</h5>
                    <form action="{{url('admin/website_logo_update')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}



                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">
                               Name<span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="website_name" class="form-control" value="{{$getRecord->website_name}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">
                               Website Logo <span style="color: red;"></span>
                            </label>
                            <div class="col-sm-10">
                               <input type="file" class="form-control" name="logo" id="formFile">

                               @if (!empty($getRecord->logo))
                                   <img src="{{$getRecord->getLogo()}}" height="100px" width="100px">
                               @endif

                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">
                               Role<span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                               <select name="is_role" id="">
                                <option value=""></option>
                               </select>
                            </div>
                        </div> --}}

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