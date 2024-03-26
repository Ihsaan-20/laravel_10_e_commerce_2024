@extends('admin.layouts.app')
@section('customStyles')
{{-- //custom style here --}}
@endsection

@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- form start -->
    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">Add New Product</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputName1">Product Name <span class="text-danger">*</span></label>
                <input type="name" class="form-control" placeholder="Product name" id="title" name="name"
                  value="{{old('name')}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Slug <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Slug Ex.URL" readonly name="slug" id="slug"
                  value="{{old('slug')}}">
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Meta Title <span class="text-danger">*</span></label>
                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{old('meta_title')}}"
                  placeholder="Meta Title" />
                @error('meta_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="10"
                  placeholder="Meta Description">{{old('meta_description')}}</textarea>
                @error('meta_description')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Meta Keywords</label>
                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                  value="{{old('meta_keywords')}}" placeholder="Meta keywords"></input>
                @error('meta_keywords')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->

        <div class="col-md-4">
          <!-- general form elements -->
          <div class="card card-primary mt-3">

            <!-- /.card-header -->
            <div class="card-body">

              <div class="form-group">
                <label>Category Name <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id">
                  <option disabled selected>Select Category Name</option>
                  @forelse ($data['categories'] as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @empty
                  <option value="1">Dummy Category 1</option>
                  <option value="2">Dummy Category 2</option>
                  <option value="3">Dummy Category 3</option>
                  @endforelse
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Sub Category Name <span class="text-danger">*</span></label>
                <select class="form-control" name="sub_category_id">
                  <option disabled selected>Select Sub Category Name</option>
                  @forelse ($data['sub_categories'] as $subCategory)
                  <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                  @empty
                  <option value="1">Dummy Sub Category 1</option>
                  <option value="2">Dummy Sub Category 2</option>
                  <option value="3">Dummy Sub Category 3</option>
                  @endforelse
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

             

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <option disabled selected>Select status</option>
                  <option value="0">Draft</option>
                  <option value="1">Publish</option>
                </select>
              </div>


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary px-5">Add</button>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </form>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('customJs')

@endsection