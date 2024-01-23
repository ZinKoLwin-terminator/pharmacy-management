<form action="{{url('admin/medicines/add')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">
           Medicine Name <span style="color: red">*</span>
        </label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">
            Packing <span style="color: red">*</span>
        </label>
        <div class="col-sm-10">
            <input type="text" name="packing" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">
            Generic_Name  <span style="color: red">*</span>
        </label>
        <div class="col-sm-10">
            <input type="text" name="generic_name" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">
            Supplier_Name  <span style="color: red">*</span>
        </label>
        <div class="col-sm-10">
            <input type="text" name="supplier_name" class="form-control" required>
        </div>
    </div>







    <div class="row mb-3">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
