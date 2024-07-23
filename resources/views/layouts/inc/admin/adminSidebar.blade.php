
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <a class="nav-link " href="{{route('admin.dashboard')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li> 
    
    <li class="nav-item {{ request()->routeIs('slider.index') ? 'active' : '' }}">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="mdi mdi-animation menu-icon"></i>
        <span class="menu-title">Slider</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ request()->routeIs('slider.index') ? 'active' : '' }}"> <a class="nav-link" href="{{route('slider.index')}}">View All Slider</a></li>
          </li>
        </ul> 

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Experience</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">          
          <li class="nav-item"> <a class="nav-link" href="{{route('aboutexp.about')}}">view Experience</a></li>        
        </ul>
      </div>
    </li>    
    @php 
      $appoinmentNotification = \App\Models\Appointment::where('appointment_view','unseen')->count();
    @endphp
    <li class="nav-item">
      <a class="nav-link" href="{{route('appoinment.users')}}"  >
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Appointment Notification</span> 
          @if($appoinmentNotification > 0)
            <span class="ms-2 badge text-white bg-danger"><livewire:admin.appointment.apointment-count/></span>  
          @endif
      </a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="mdi mdi-chart-pie menu-icon"></i>
        <span class="menu-title">About</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('about.index')}}">View About</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Color</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="">View All Colours</a></li>
          </li>
        </ul> 

    <li class="nav-item"> 
      <form action="" method="POST" class="d-flex:none" id="logout"> 
        @csrf 
      </form>
      <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">
        <i class="mdi mdi-logout-variant menu-icon"></i>
        <span class="menu-title">Log Out</span>
      </a>
    </li>
  </ul>
</nav>