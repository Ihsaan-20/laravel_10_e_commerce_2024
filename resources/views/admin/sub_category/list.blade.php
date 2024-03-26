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
                  <h3 class="card-title">Sub Category List</h3>
                  <div class="text-right">
                    <a href="{{route('admin.sub_category.add')}}" class="btn btn-primary">Add New Sub Category</a>
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
                      <th>Category Name</th>
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['sub_categories'] as $key => $sub)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$sub->name}}</td>
                                <td>{{$sub->slug}}</td>
                                <td>{!! $sub->status == 1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>' !!}</td>
                                <td>{{$sub->category_name}}</td>
                                <td>{{$sub->created_by_name}}</td>
                                <td>
                                    <a href="{{route('admin.sub_category.edit', $sub->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('admin.sub_category.delete', $sub->id)}}" class="btn btn-danger">Delete</a>
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