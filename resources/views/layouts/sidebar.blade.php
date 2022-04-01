  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <!-- <li class="nav-heading">Pages</li> -->

     <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('profile') }}">
          <i class="bi bi-person"></i>
          <span>Edit Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('resetpassword') }}">
          <i class="bi bi-person"></i>
          <span>Reset Password</span>
        </a>
      </li>


      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('register')}}">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>                     
          <i class="bi bi-box-arrow-in-right"></i>
          {{ __('Logout') }}
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
