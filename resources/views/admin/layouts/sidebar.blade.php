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
        <a href="{{route('admin.admin.list')}}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
          <i class="nav-icon fas fa-user-alt"></i>
          <p>
            Admin  
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{route('admin.category.list')}}" class="nav-link 
        @if(Request::segment(2) == 'category') active @endif"
        >
        <i class="nav-icon fas fa-list"></i>
          <p>
            Category
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{route('admin.sub_category.list')}}" class="nav-link 
        @if(Request::segment(2) == 'sub_category') active @endif"
        >
        <i class="nav-icon fas fa-list"></i>
          <p>
            Sub Category
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{route('admin.brand.list')}}" class="nav-link 
        @if(Request::segment(2) == 'brand') active @endif"
        >
        <i class="nav-icon fas fa-list"></i>
          <p>
           Brand
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{route('admin.color.list')}}" class="nav-link 
        @if(Request::segment(2) == 'color') active @endif"
        >
        <i class="nav-icon fas fa-list"></i>
          <p>
           Color
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{route('admin.product.list')}}" class="nav-link 
          @if(Request::segment(2) == 'product') active @endif"
        >
          <i class="nav-icon fas fa-list-alt"></i>
          <p>
            Product
          </p>
        </a>
      </li>

      {{-- <li class="nav-header">LABELS</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <p class="text">Important</p>
        </a>
      </li> --}}
     
      <li class="nav-item">
        {{-- <form id="logoutForm" action="{{route('admin.logout')}}" method="POST" style="display:none">@csrf</form> --}}
        <a href="{{route('admin.logout')}}" class="nav-link"
          {{-- onclick="document.getElementById('#logoutForm').submit(); return false;" --}}
        >
        <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p>
        </a>

       

      </li>

     

    </ul>
  </nav>
  <!-- /.sidebar-menu -->