<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- profile -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.show', auth()->user()) }}">
            <i class="fas fa-user fa-fw"></i>
            <span>My Profile</span>
        </a>
    </li>
    <!-- Change Password -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.show', auth()->user()) }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Change Password</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->routeIs('subscriptions.*') || request()->routeIs('users.subscriptions.*') ? 'active' : '' }}">
        <a class="nav-link"
            href="@admin {{ route('subscriptions.index') }} @else {{ route('users.subscriptions.index', auth()->user()) }} @endadmin"
        >
            <i class="fas fa-fw fa-folder"></i>
            <span>Subscriptions</span>
        </a>
    </li>
    <!-- Nav Item - Tables -->
    @admin
        <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Users</span></a>
        </li>
    @endadmin
    <!-- Logout -->
    <li class="nav-item">
    <a class="nav-link" href="{{ url('logout') }}">
        <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
        <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<script>
    $('.nav-link[href="{{ url()->current() }}"]').parent().addClass('active');
</script>
