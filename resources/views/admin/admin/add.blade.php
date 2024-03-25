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
              <h3 class="card-title">Add New Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.admin.add.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="exampleInputName1">Name</label>
                  <input type="name" class="form-control"  placeholder="Name" name="name" value="{{old('name')}}">
                  @error('name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{old('email')}}">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control"  placeholder="Password" name="password" value="{{old('password')}}">
                  @error('password')
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
{{-- //js here --}}
@endsection