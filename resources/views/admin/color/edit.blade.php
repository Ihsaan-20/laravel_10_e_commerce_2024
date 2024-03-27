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
            <h3 class="card-title">Update Color</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('admin.color.update', $data['color']->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">

              <div class="form-group">
                <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
                <input type="name" class="form-control" placeholder="Brand name" id="title" name="name" value="{{old('name', $data['color']->name)}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Color Code <span class="text-danger">*</span></label>
                <input type="color" class="form-control" name="color_code" id="color_code" value="{{old('color_code',$data['color']->color_code)}}">
                @error('color_code')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <option disabled selected>Select status</option>
                  <option value="0" {{$data['color']->status == '0' ? 'selected' : ''}}>Inactive</option>
                  <option value="1" {{$data['color']->status == '1' ? 'selected' : ''}}>Active</option>
                </select>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary px-5">Update</button>
              <a href="{{route('admin.category.list')}}" class="btn btn-default px-5" >Go back</a>
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