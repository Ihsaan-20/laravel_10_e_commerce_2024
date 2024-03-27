@extends('admin.layouts.app')
@section('customStyles')
{{-- //custom style here --}}
@endsection

@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- form start -->
    <form action="{{route('admin.product.update',$data['product']->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="row">
        <div class="col-lg-12">
          <div class="mt-3">
            <h3 class="card-title">Edit Product</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">Product Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputName1">Product Title <span class="text-danger">*</span></label>
                <input type="name" class="form-control" placeholder="Product title" id="title" name="title"
                  value="{{old('name', $data['product']->title)}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Brand Name <span class="text-danger">*</span></label>
                    <select class="form-control" name="brand_id">
                      <option disabled selected>Select Brand Name</option>
                      @forelse ($data['brands'] as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                      @empty
                      <option value="1">Dummy Brand 1</option>
                      <option value="2">Dummy Brand 2</option>
                      <option value="3">Dummy Brand 3</option>
                      @endforelse
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>SKU<span class="text-danger">*</span></label>
                    <input type="text" name="sku" id="sku" class="form-control" value="{{old('sku')}}"
                      placeholder="SKU" />
                    @error('meta_title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Price ($) <span class="text-danger">*</span></label>
                    <input type="text" name="new_price" id="new_price" class="form-control only-number" value="{{old('new_price')}}"
                      placeholder="Price" />
                    @error('new_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Old Price ($) <span class="text-danger">*</span></label>
                    <input type="text" name="old_price" id="old_price" class="form-control only-number" value="{{old('old_price')}}"
                      placeholder="Old Price" />
                    @error('old_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <label>Size <span class="text-danger">*</span></label>
              <table class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th>Name</th>
                  <th>Price ($)</th>
                  <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input type="text" class="form-control" placeholder="Name">
                    </td>
                    <td>
                      <input type="text" class="form-control" placeholder="Size">
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary">Add</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <input type="text" class="form-control" placeholder="Name">
                    </td>
                    <td>
                      <input type="text" class="form-control" placeholder="Size">
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <input type="text" class="form-control" placeholder="Name">
                    </td>
                    <td>
                      <input type="text" class="form-control" placeholder="Size">
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>

                </tbody>
              </table>
              <hr>
              
              <hr>

              

            </div>
          </div>
          <!-- /.card -->

          <!-- general form elements -->
          <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">Product Descriptions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label>Short Description <span class="text-danger">*</span></label>
                <textarea name="short_description" id="short_description" class="form-control" cols="30" rows="2"
                  placeholder="Short Description">{{old('short_description')}}</textarea>
                @error('short_description')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Description <span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="3"
                  placeholder="Description">{{old('description')}}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Additional Infomation <span class="text-danger">*</span></label>
                <textarea name="additional_info" id="additional_info" class="form-control" cols="30" rows="3"
                  placeholder="Additional Infomation">{{old('additional_info')}}</textarea>
                @error('additional_info')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Shipping & Returns <span class="text-danger">*</span></label>
                <textarea name="shipping_returns" id="shipping_returns" class="form-control" cols="30" rows="3"
                  placeholder="Shipping & Returns">{{old('shipping_returns')}}</textarea>
                @error('shipping_returns')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- general form elements -->
          <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">SEO Meta Tags</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->

        <div class="col-md-4">
          <!-- general form elements -->
          <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">Product Category</h3>
            </div>
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

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Colors<span class="text-danger">*</span></label>
                    <div>
                      <label for=""><input type="checkbox" name="color_id[]" id="color" class="" /> Color name </label>
                    </div>
                    <div>
                      <label for=""><input type="checkbox" name="color_id[]" id="color" class="" /> Color name </label>
                    </div>
                    <div>
                      <label for=""><input type="checkbox" name="color_id[]" id="color" class="" /> Color name </label>
                    </div>
                    @error('color_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
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
          </div>
          <!-- /.card -->

           <!-- general form elements -->
           <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">Product Images</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div class="form-group">
                <label>Gallary Images</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gallary_images" name="gallary_images[]" accept="image/*"  multiple>
                  <label class="custom-file-label" for="gallary_images">Choose files</label>
                </div>
                @error('gallary_images')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Thumbnail Image <span class="text-muted">(290x300)</span></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="thumbnail_img" name="thumbnail_img" accept="image/*">
                  <label class="custom-file-label" for="thumbnail_img">Choose file</label>
                </div>
                @error('gallary_images')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="row">
            <div class="col-sm-3" id="show_images">
              <p>image</p>
            </div>
          </div>
         <div class="text-right">
            <button type="submit" class="btn btn-success px-5">Upload Product</button>
         </div>

        </div>
        
        <!--/.col (left) -->
      </div>
      
      <!-- /.row -->
    </form>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('customJs')
<script>
  $(document).ready(function() {
      $('.only-number').keypress(function(event) {
          var charCode = (event.which) ? event.which : event.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              event.preventDefault();
          }
      });
  });
  </script>
@endsection