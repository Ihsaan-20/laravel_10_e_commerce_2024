 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="{{route('admin.dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard 
           
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{route('admin.admin.list')}}" class="nav-link @if(Request::segment(3) == 'list') active @endif">
          {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
          <p>
            Admin  
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="#" class="nav-link ">
          {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
          <p>
            Product
          </p>
        </a>
      </li>

      <li class="nav-header">LABELS</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <p class="text">Important</p>
        </a>
      </li>
     
      <li class="nav-item">
        {{-- <form id="logoutForm" action="{{route('admin.logout')}}" method="POST" style="display:none">@csrf</form> --}}
        <a href="{{route('admin.logout')}}" class="nav-link"
          {{-- onclick="document.getElementById('#logoutForm').submit(); return false;" --}}
        >
          <p>Logout</p>
        </a>

       

      </li>

     

    </ul>
  </nav>
  <!-- /.sidebar-menu -->