@if(!empty(session('incorrect_password')))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p class="m-0"><i class="icon fas fa-ban"></i> {{session('incorrect_password')}}</p>
</div>
@endif

@if(!empty(session('success')))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p class="m-0"><i class="icon fas fa-check"></i> {{session('success')}}</p>
    </div>
@endif

@if(!empty(session('logout_success')))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p class="m-0"><i class="icon fas fa-check"></i> {{session('logout_success')}}</p>
</div>
@endif


@if(!empty(session('deleted')))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p class="m-0"><i class="icon fas fa-check"></i></i> {{session('deleted')}}</p>
    </div>
@endif

@if(!empty(session('deleted')))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p class="m-0"><i class="icon fas fa-ban"></i> {{session('deleted')}}</p>
</div>
@endif
{{-- 
<i class="icon fas fa-exclamation-triangle"></i> //warning icon
<i class="icon fas fa-info"></i>  //info icon
<i class="icon fas fa-ban"></i> // danger icon
<i class="icon fas fa-check"></i> // success icon 
--}}
  {{-- <div class="alert alert-success bg-success" role="alert"></div> --}}

