
@extends('admin.layouts.app')
@section('customStyles')
{{-- //custom style here --}}
@endsection

@section('content')
<div class="text-center">
    <h1>Page Not Found</h1>
    <a href="{{route('admin.dashboard')}}">Go Back</a>
</div>
@endsection

@section('customJs')
{{-- //js here --}}
@endsection