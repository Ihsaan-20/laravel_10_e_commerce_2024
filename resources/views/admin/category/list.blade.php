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
                  <h3 class="card-title">Category List</h3>
                  <div class="text-right">
                    <a href="{{route('admin.category.add')}}" class="btn btn-primary">Add New Category</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['categories'] as $key => $category)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{!! $category->status == 1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>' !!}</td>
                                <td>{{$category->created_by_name}}</td>
                                <td>
                                    <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('admin.category.delete', $category->id)}}" class="btn btn-danger">Delete</a>
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