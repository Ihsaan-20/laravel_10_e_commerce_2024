@extends('admin.layouts.app')
@section('customStyles')
{{-- //custom style here --}}
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<section class="content">
  <div class="container-fluid">
    <!-- form start -->
    <form action="{{route('admin.product.update',$data['product']->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="row">

        <div class="col-12 mt-3">
          @include('admin.layouts.alerts')
        </div>

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
                      @foreach ($data['brands'] as $brand)
                      <option value="{{$brand->id}}" {{$brand->id == $data['product']->brand_id ? 'selected' :
                        ''}}>{{$brand->name}}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>SKU</label>
                    <input type="text" name="sku" id="sku" maxlength="10" class="form-control only-number"
                      value="{{old('sku',$data['product']->sku)}}" placeholder="SKU" />
                    @error('sku')
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
                    <input type="text" name="new_price" id="new_price" class="form-control only-number"
                      value="{{old('new_price',$data['product']->new_price)}}" placeholder="Price" />
                    @error('new_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Old Price ($) <span class="text-danger">*</span></label>
                    <input type="text" name="old_price" id="old_price" class="form-control only-number"
                      value="{{old('old_price',$data['product']->old_price)}}" placeholder="Old Price" />
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
                <tbody id="NamePriceTableBody">
                  @foreach ($data['product']->getProductSize as $key => $size )
                    <tr id="deleteSize{{$key}}">
                      <td><input type="text" class="form-control" name="size[{{$key}}][name]" value="{{$size['name']}}" placeholder="Name"></td>
                      <td><input type="text" class="form-control" name="size[{{$key}}][price]" value="{{$size['price']}}" placeholder="Price"></td>
                      <td><button type="button" id="{{$key}}" class="btn btn-danger deleteNewNamePrice">Delete</button></td>
                    </tr>
                  @endforeach

                  <tr>
                    <td>
                      <input type="text" class="form-control removeSizeInput" name="size[100][name]" placeholder="Name">
                    </td>
                    <td>
                      <input type="text" class="form-control removeSizeInput" name="size[100][price]" placeholder="Price">
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary addNewNamePrice">Add</button>
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
                  placeholder="Short Description">{{old('short_description',$data['product']->short_description)}}</textarea>
                @error('short_description')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Description <span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="3"
                  placeholder="Description">{{old('description',$data['product']->description)}}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Additional Infomation <span class="text-danger">*</span></label>
                <textarea name="additional_info" id="additional_info" class="form-control" cols="30" rows="3"
                  placeholder="Additional Infomation">{{old('additional_info',$data['product']->additional_info)}}</textarea>
                @error('additional_info')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Shipping & Returns <span class="text-danger">*</span></label>
                <textarea name="shipping_returns" id="shipping_returns" class="form-control" cols="30" rows="3"
                  placeholder="Shipping & Returns">{{old('shipping_returns',$data['product']->shipping_returns)}}</textarea>
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
                <input type="text" name="meta_title" id="meta_title" class="form-control"
                  value="{{old('meta_title',$data['product']->meta_title)}}" placeholder="Meta Title" />
                @error('meta_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="10"
                  placeholder="Meta Description">{{old('meta_description',$data['product']->meta_description)}}</textarea>
                @error('meta_description')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Meta Keywords</label>
                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                  value="{{old('meta_keywords',$data['product']->meta_keywords)}}" placeholder="Meta keywords"></input>
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
                <select class="form-control" required name="category_id" id="category_id">
                  <option disabled selected>Select Category Name</option>
                  @foreach ($data['categories'] as $category)
                  <option value="{{$category->id}}" {{$category->id == $data['product']->category_id ? 'selected' :
                    ''}}>{{$category->name}}</option>
                  @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Sub Category Name <span class="text-danger">*</span></label>
                <select class="form-control" required name="sub_category_id" id="sub_category_id">
                  <option disabled selected>Select Sub Category Name</option>
                  @foreach ($data['getSubCategoies'] as $sub_category)
                  <option value="{{$sub_category->id}}" {{$sub_category->id == $data['product']->sub_category_id ?
                    'selected' : ''}}>{{$sub_category->name}}</option>
                  @endforeach
                </select>
                @error('sub_category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Colors<span class="text-danger">*</span></label>

                    @foreach ($data['colors'] as $color)
                    @php
                    $checked = '';
                    @endphp
                    @foreach ($data['product']->getProductColor as $oldColor )
                    @if($oldColor->color_id == $color->id)
                    @php
                    $checked = 'checked';
                    @endphp
                    @endif
                    @endforeach

                    <div>
                      <label for="">
                        <input type="checkbox" {{$checked}} name="color_id[]" value="{{$color->id}}" />
                        {{$color->name}}
                      </label>
                    </div>

                    @endforeach

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
                  <option value="0" {{$data['product']->status == '0' ? 'selected' : ''}}>Draft</option>
                  <option value="1" {{$data['product']->status == '1' ? 'selected' : ''}}>Publish</option>
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
                  <input type="file" class="custom-file-input" id="gallary_images" name="gallary_images[]"
                    accept="image/*" multiple>
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
            <button type="submit" class="btn btn-success px-5">Update Product</button>
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
      $('#category_id').on('change', function() {
        var categoryId = $(this).val();
        $.ajax({
          type: "POST",
          url: "{{route('admin.get.sub_categories')}}",
          data: {
            "id" : categoryId,
            "_token" : "{{ csrf_token() }}"
          },
          dataType: "json",
          success: function (data) {
            $('#sub_category_id').html(data.html);
          }
        });

      });//end here

      let count = 101;
      $(document).on('click', '.addNewNamePrice', function(e) {
          e.preventDefault();
          
          let newRow = `
              <tr id="deleteSize${count}">
                  <td><input type="text" class="form-control" name="size[${count}][name]" placeholder="Name"></td>
                  <td><input type="text" class="form-control" name="size[${count}][price]" placeholder="Price"></td>
                  <td><button type="button" id="${count}" class="btn btn-danger deleteNewNamePrice">Delete</button></td>
              </tr>`;
              count++;
          $(newRow).insertBefore('#NamePriceTableBody tr:first');
      });


      $(document).on('click', '.deleteNewNamePrice', function(e) {
          e.preventDefault();
          var id = $(this).attr('id');
          $('#' + id).closest('tr').remove();
      });

        $("#sku").val(generateRandomSKU());

  });

  function generateRandomSKU(length=8) {
      var charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      var sku = "";
      for (var i = 0; i < length; i++) {
          sku += charset.charAt(Math.floor(Math.random() * charset.length));
      }
      return sku;
  }


</script>
@endsection