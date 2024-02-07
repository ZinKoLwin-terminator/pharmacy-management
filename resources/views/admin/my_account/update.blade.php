{{-- @dd($invoices) --}}

@extends('admin.layouts.app');

@section('content')
<div class="pagetitle">
    <h1>Profile Update</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Update</h5>
                    <form action="{{url('admin/my_account')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}



                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">
                               Name<span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{$getRecord->name}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">
                               Email<span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" value="{{$getRecord->email}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">
                               Profile Image <span style="color: red;"></span>
                            </label>
                            <div class="col-sm-10">
                               <input type="file" class="form-control" name="profile_image" id="formFile">
                               @if (!empty($getRecord->profile_image))
                               <img src="{{$getRecord->getProfileImage()}}" height="100px" width="100px" alt="">

                               @endif
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">
                               Password<span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" >
                                (leave blank if you are not changing the password)
                                <span style="color: red;">{{
                                    $errors->first('password')
                                }}

                                </span>
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
