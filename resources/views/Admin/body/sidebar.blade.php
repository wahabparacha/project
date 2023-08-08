<nav class="sidebar">
    <div class="sidebar-header">
        <a href="www.rawfits.com" class="sidebar-brand">
            RAW<span>FITS</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">
                <a href="{{ route('user.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="table"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>
            <li class="nav-item nav-category">
                <a href="{{ route('driver.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="table"></i>
                    <span class="link-title">Drivers</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
