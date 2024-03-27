@extends('admin.layouts.app')
@section('customStyles')

@endsection

@section('content')
     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-12 mt-3">
                @include('admin.layouts.alerts')
            </div>

            <div class="col-12">
              <div class="card mt-3">
                <div class="card-header">
                  <h3 class="card-title">Product List</h3>
                  <div class="text-right">
                    <a href="{{route('admin.product.add')}}" class="btn btn-primary">Add New Product</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Slug</th>
                      <th>Status</th>
                      <th>Category Name</th>
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['products'] as $key => $product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->slug}}</td>
                                <td>{!! $product->status == 1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>' !!}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->created_by_name}}</td>
                                <td>
                                    <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('admin.product.delete', $product->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                                
                            </tr>
                        @endforeach
                   
                    
                    
                    </tbody>
                   
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection

@section('customJs')

@endsection