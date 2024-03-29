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

        <div class="col-12 mt-3">
          @include('admin.layouts.alerts')
        </div>

        <div class="col-lg-12">
          <div class="mt-3">
            <h3 class="card-title">Add Product</h3>
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
                  value="{{old('title')}}">
                @error('title')
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
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                      @endforeach
                    </select>
                    @error('brand_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>SKU</label>
                    <input type="text" name="sku" id="sku" maxlength="10" readonly class="form-control only-number"
                      value="{{old('sku')}}" placeholder="SKU" />
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
                      value="{{old('new_price')}}" placeholder="Price" />
                    @error('new_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Old Price ($)</label>
                    <input type="text" name="old_price" id="old_price" class="form-control only-number"
                      value="{{old('old_price')}}" placeholder="Old Price" />
                    @error('old_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <label>Size</label>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price ($)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="NamePriceTableBody">
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
                <textarea name="short_description" id="summernote" class="form-control" cols="30" rows="2"
                  placeholder="Short Description">{{old('short_description')}}</textarea>
                @error('short_description')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Description <span class="text-danger">*</span></label>
                <textarea name="description" id="summernote" class="form-control" cols="30" rows="3"
                  placeholder="Description">{{old('description')}}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Additional Infomation <span class="text-danger">*</span></label>
                <textarea name="additional_info" id="summernote" class="form-control" cols="30" rows="3"
                  placeholder="Additional Infomation">{{old('additional_info')}}</textarea>
                @error('additional_info')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Shipping & Returns <span class="text-danger">*</span></label>
                <textarea name="shipping_returns" id="summernote" class="form-control" cols="30" rows="3"
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
                <input type="text" name="meta_title" id="meta_title" class="form-control"
                  value="{{old('meta_title')}}" placeholder="Meta Title" />
                @error('meta_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description" id="summernote" class="form-control" cols="30" rows="10"
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
                <select class="form-control" required name="category_id" id="category_id">
                  <option disabled selected>Select Category Name</option>
                  @foreach ($data['categories'] as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
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
                  <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                  @endforeach
                </select>
                @error('sub_category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Colors</label>
        
                            @foreach ($data['colors'] as $color)
                            <div>
                              <label for="">
                                <input type="checkbox" name="color_id[]" value="{{$color->id}}" />
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
                </div>
              </div>


              <div class="form-group">
                <label>Status <span class="text-danger">*</span></label>
                <select class="form-control" name="status">
                  <option disabled selected>Select status</option>
                  <option value="0">Draft</option>
                  <option value="1">Publish</option>
                </select>
                @error('status')
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
              <h3 class="card-title">Product Images</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div class="form-group">
                <label>Gallary Images</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_images" name="product_images[]"
                    accept="image/*" multiple>
                  <label class="custom-file-label" for="product_images">Choose files</label>
                </div>
                @error('product_images')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              
             
             

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="text-right">
            <button type="submit" class="btn btn-success px-5">Add Product</button>
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


      //sortable
      $( "#sortable" ).sortable({
      Add: function(event, ui)
      {
        var image_id = new Array();
        $('.sortable_img').each(function (){
          var id = $(this).attr('id');
          image_id.push(id);
        });

        $.ajax({
          type: "POST",
          url: "{{route('admin.product_image.sort')}}",
          data: {
            "image_id" : image_id,
            "_token" : "{{ csrf_token() }}"
          },
          dataType: "json",
          success: function(data)
          {
            console.log(data)
          },
          error: function (data)
          {
            console.log(data);
          }
        })
      }
    });

  });//main document end here

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