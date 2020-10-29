<aside class="main-sidebar sidebar-dark-primary elevation-4">
 <!-- Brand Logo -->
 <a href="{{ url('dashboard') }}" class="brand-link">
   <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
   <span class="brand-text font-weight-light">Article Posting</span>
 </a>

 <!-- Sidebar -->
 <div class="sidebar">
   <!-- Sidebar user panel (optional) -->
   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     <div class="image">
       <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
     </div>
     <div class="info">
       <a href="#" class="d-block">
        @if(Auth::user()->role_id == 1)
            <span>Super Admin</span>
        @else
            <span>User</span>
        @endif
       </a>
     </div>
   </div>

   <!-- Sidebar Menu -->
   <nav class="mt-2">
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
       <li class="nav-item has-treeview menu-open">
         <a href="{{ url('dashboard') }}" class="nav-link active">
           <i class="nav-icon fas fa-tachometer-alt"></i>
           <p>
             Dashboard
           </p>
         </a>
       </li>
       {{-- <li class="nav-item">
         <a href="pages/widgets.html" class="nav-link">
           <i class="nav-icon fas fa-th"></i>
           <p>
             Widgets
             <span class="right badge badge-danger">New</span>
           </p>
         </a>
       </li> --}}
       <li class="nav-item has-treeview">
         <a href="#" class="nav-link">
           <i class="nav-icon fas fa-chart-pie"></i>
           <p>
             Articles
             <i class="right fas fa-angle-left"></i>
           </p>
          </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
            <a class="nav-link" href="{{url('admin/articles')}}">
               <i class="far fa-circle nav-icon"></i>
               <p>Acticles List</p>
             </a>
           </li>
           <li class="nav-item">
            <a class="nav-link" href="{{url('admin/articles/published')}}">
               <i class="far fa-circle nav-icon"></i>
               <p>Published Acticles List</p>
             </a>
           </li>
           <li class="nav-item">
            <a class="nav-link" href="{{url('admin/articles/create')}}">
               <i class="far fa-circle nav-icon"></i>
               <p>Create Acticle</p>
             </a>
           </li>
         </ul>
       </li>
       <li class="nav-item has-treeview">
         <a href="#" class="nav-link">
           <i class="nav-icon fas fa-table"></i>
           <p>
             Categories
             <i class="fas fa-angle-left right"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{url('admin/category')}}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Categories List</p>
             </a>
           </li>
           <li class="nav-item">
            <a href="{{url('admin/category')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Create Category</p>
            </a>
          </li>
         </ul>
       </li>
       <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Users
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('admin/users/lists')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Users List</p>
            </a>
          </li>
          <li class="nav-item">
           <a href="{{url('admin/users/create')}}" class="nav-link">
             <i class="far fa-circle nav-icon"></i>
             <p>Create User</p>
           </a>
         </li>
        </ul>
      </li>
       </li>
       <li class="nav-item">
        <a href="{{ url('admin/role/lists') }}" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            User Role
          </p>
        </a>
      </li>
       <li class="nav-header">MISCELLANEOUS</li>
       <li class="nav-item">
         <a href="https://adminlte.io/docs/3.0" class="nav-link">
           <i class="nav-icon fas fa-file"></i>
           <p>Documentation</p>
         </a>
       </li>
     </ul>
   </nav>
   <!-- /.sidebar-menu -->
 </div>
 <!-- /.sidebar -->
</aside>
