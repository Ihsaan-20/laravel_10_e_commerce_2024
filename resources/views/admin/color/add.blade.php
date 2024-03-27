@extends('admin.layouts.app')
@section('customStyles')
{{-- //custom style here --}}
@endsection

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
        <div class="card card-primary mt-3">
          <div class="card-header">
            <h3 class="card-title">Add New Color</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('admin.color.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

              <div class="form-group">
                <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
                <input type="name" class="form-control" placeholder="Color name" id="title" name="name" value="{{old('name')}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Color Code <span class="text-danger">*</span></label>
                <input type="color" class="form-control" name="color_code" id="color_code" value="{{old('color_code')}}">
                @error('color_code')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <option disabled selected>Select status</option>
                  <option value="0">Inactive</option>
                  <option value="1">Active</option>
                </select>
              </div>
             

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary px-5">Add</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('customJs')

@endsection