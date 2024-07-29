
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <a class="nav-link " href="{{route('admin.dashboard')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li> 
    
    <li class="nav-item {{ request()->routeIs('slider.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('slider.index')}}" aria-expanded="false" aria-controls="tables">
        <i class="mdi mdi-animation menu-icon"></i>
        <span class="menu-title">Slider</span>
      </a>
      
    </li>

    <li class="nav-item {{ request()->routeIs('aboutexp.about') ? 'active' : '' }}">
      <a class="nav-link"  href="{{route('aboutexp.about')}}" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Experience</span>
      </a>
      
    </li>    
    @php 
      $appoinmentNotification = \App\Models\Appointment::where('appointment_view','unseen')->count();
    @endphp
    <li class="nav-item ">
      <a class="nav-link" href="{{route('appoinment.users')}}"  >
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Appointment Notification</span> 
          @if($appoinmentNotification > 0)
            <span class="ms-2 badge text-white bg-danger"><livewire:admin.appointment.apointment-count/></span>  
          @endif
      </a>
    </li>
   
    <li class="nav-item {{ request()->routeIs('about.index') ? 'active' : '' }}">
      <a class="nav-link " href="{{route('about.index')}}">
        <i class="mdi mdi-chart-pie menu-icon"></i>
        <span class="menu-title">About</span>
      </a>
    </li>

    <li class="nav-item {{ request()->routeIs('post.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('post.index')}}" aria-expanded="false" aria-controls="charts">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Post</span>
      </a>
    </li>
    <li class="nav-item {{ request()->routeIs('service.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('service.index')}}" aria-expanded="false" aria-controls="charts">
        <i class="mdi mdi-book-multiple menu-icon"></i>
        <span class="menu-title">Service</span>
      </a>
    </li>

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