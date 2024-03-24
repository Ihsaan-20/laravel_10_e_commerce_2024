@if(!empty(session('incorrect_password')))
<div class="alert alert-error bg-danger" role="alert">
    {{session('incorrect_password')}}
</div>
@endif

@if(!empty(session('success')))
<div class="alert alert-success bg-success" role="alert">
    {{session('success')}}
</div>
@endif

@if(!empty(session('logout_success')))
<div class="alert alert-success bg-success" role="alert">
    {{session('logout_success')}}
</div>
@endif