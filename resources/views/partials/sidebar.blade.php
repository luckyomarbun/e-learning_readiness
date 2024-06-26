<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/ahp.png') }}" alt="E - Learning" width="auto" height="70px">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">E-Learning Readiness</div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if(auth()->user()->role !== 'user')    
    <li class="nav-item {{ Request::is('survey') ? 'active' : '' }}">
        <a class="nav-link" href="/survey/index">
            <i class="fas fa-user-friends"></i>
            <span>Survey</span></a>
    </li>
    @endif

    @if(auth()->user()->role !== 'user')   
    <li class="nav-item {{ Request::is('respondents') ? 'active' : '' }}">
        <a class="nav-link" href="/respondents">
            <i class="fas fa-balance-scale"></i>
            <span>Respondents</span></a>
    </li>
    @endif

    <!-- <li class="nav-item  {{ Request::is('criteria') ? 'active' : '' }}">
        <a class="nav-link" href="/criteria">
            <i class="fas fa-splotch"></i>
            <span>Kriteria</span></a>
    </li> -->

    <!-- <li class="nav-item {{ (Request::is('calculate/result') || Request::is('calculate/criteria-comparison') || Request::is('calculate/alternative-comparison')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-calculator"></i>
            <span>Kalkulasi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/calculate/criteria-comparison">Perbandingan Kriteria</a>
                <a class="collapse-item" href="/calculate/alternative-comparison">Perbandingan Alternatif</a>
                <a class="collapse-item" href="/calculate/result">Hasil</a>
            </div>
        </div>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
