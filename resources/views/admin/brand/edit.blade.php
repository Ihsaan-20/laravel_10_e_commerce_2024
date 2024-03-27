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
            <h3 class="card-title">Update Brand</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('admin.brand.update', $data['brand']->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">

              <div class="form-group">
                <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
                <input type="name" class="form-control" placeholder="Brand name" id="title" name="name" value="{{old('name', $data['brand']->name)}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Slug <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Slug Ex.URL" readonly name="slug" id="slug" value="{{old('slug',$data['brand']->slug)}}">
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Meta Title <span class="text-danger">*</span></label>
                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{old('meta_title', $data['brand']->meta_title)}}" placeholder="Meta Title" />
                @error('meta_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description" id="meta_description" class="form-control" cols="30"
                  rows="10" placeholder="Meta Description">{{old('meta_description',$data['brand']->meta_description)}}</textarea>
                @error('meta_description')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Meta Keywords</label>
                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{old('meta_keywords',$data['brand']->meta_keywords)}}" placeholder="Meta keywords"></input>
                @error('meta_keywords')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <option disabled selected>Select status</option>
                  <option value="0" {{$data['brand']->status == '0' ? 'selected' : ''}}>Inactive</option>
                  <option value="1" {{$data['brand']->status == '1' ? 'selected' : ''}}>Active</option>
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