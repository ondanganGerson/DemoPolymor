  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
 
    <ul class="navbar-nav ml-auto">
       @if(Auth::check())
       <li class="nav-item">
        <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button class="nav-link"  role="button">
                <i title="logout" class="fas fa-angle-right"> {{Auth::user()->name}}</i>
            </button>
        </form> 
       </li>
      @endif 
   </ul>

   <!--navbar logout not working-->
    {{-- <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown no-arrow">
         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" area-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}          
              </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" area-labelledby="userDropdown">
            <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> 
                    <i class="fas-fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{__('Logout')}}
           </a>
              
            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
              @csrf            
            </form>

          </div>

       </li>
      
    </ul> --}}
  </nav>
  <!-- /.navbar -->
  
  