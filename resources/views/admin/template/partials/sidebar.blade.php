<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('admin.dashboard')}}">
      <a class="nav-link" href="/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>

    

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Nav::isResource('city')}}">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseTwo"
        aria-expanded="true"
        aria-controls="collapseTwo"
      >
        <i class="fas fa-city"></i>
        <span>City</span>
      </a>
      <div
        id="collapseTwo"
        class="collapse"
        aria-labelledby="headingTwo"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">City Components:</h6>
          <a class="collapse-item" href="{{route('city.index')}}">CRUD City</a>
          <a class="collapse-item" href="{{route('city.recyle')}}">Recycle</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Nav::isResource('team')}}">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseTree"
        aria-expanded="true"
        aria-controls="collapseTree"
      >
        <i class="fas fa-user-friends"></i>
        <span>Team</span>
      </a>
      <div
        id="collapseTree"
        class="collapse"
        aria-labelledby="headingTree"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Team Components:</h6>
          <a class="collapse-item" href="{{route('team.index')}}">CRUD Team</a>
          <a class="collapse-item" href="{{route('team.recyle')}}">Recycle</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Nav::isResource('player')}}">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseFour"
        aria-expanded="true"
        aria-controls="collapseFour"
      >
        <i class="fas fa-users"></i>
        <span>Player</span>
      </a>
      <div
        id="collapseFour"
        class="collapse"
        aria-labelledby="headingTree"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Player Components:</h6>
          <a class="collapse-item" href="{{route('player.index')}}">CRUD Player</a>
          <a class="collapse-item" href="{{route('player.recyle')}}">Recycle</a>
        </div>
      </div>
    </li>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item {{ Nav::isResource('competition')}}">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseFive"
        aria-expanded="true"
        aria-controls="collapseFive"
      >
        <i class="fas fa-futbol"></i>
        <span>Competition</span>
      </a>
      <div
        id="collapseFive"
        class="collapse"
        aria-labelledby="headingTree"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Competition Components:</h6>
          <a class="collapse-item" href="{{route('competition.index')}}">CRUD Competition</a>
          <a class="collapse-item" href="">Recycle</a>
        </div>
      </div>
    </li>


    <!-- Nav Item - Charts -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>