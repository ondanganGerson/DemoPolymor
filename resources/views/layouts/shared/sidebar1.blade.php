 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('image/logo.png')}}" alt="My Blog Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>My Blog</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->profile ? asset('image/'.$user->profile) : asset('image/profile.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">       
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> 
          
          <li class="nav-item">
            <a href="{{route('post.index')}}" class="nav-link">
                <i class="fa fa-book" aria-hidden="true"></i>
              <p>Blogs</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('classs.index')}}" class="nav-link">
                <i class="fa fa-book" aria-hidden="true"></i>
              <p>Student</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('client.index')}}" class="nav-link">
                <i class="fa fa-book" aria-hidden="true"></i>
              <p>Client</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('car.index')}}" class="nav-link">
                <i class="fa fa-book" aria-hidden="true"></i>
              <p>Car</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('name.index')}}" class="nav-link">
                <i class="fa fa-book" aria-hidden="true"></i>
              <p>name</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('room.index')}}" class="nav-link">
                <i class="fa fa-book" aria-hidden="true"></i>
              <p>room</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('roomtables.index')}}" class="nav-link">
                <i class="fa fa-book" aria-hidden="true"></i>
              <p>room tables</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
