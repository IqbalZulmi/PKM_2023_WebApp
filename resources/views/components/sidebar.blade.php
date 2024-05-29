<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Section for Superadmin -->
        <li class="nav-heading">Kelola</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboardPage') || request()->routeIs('dashboardDetailPage') ? '' : 'collapsed'}}" href="{{ route('dashboardPage') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{  request()->routeIs('laporanSensorPage') ? '' : 'collapsed' }}" href="{{ route('laporanSensorPage') }}">
                <i class="bi bi-file-earmark-break-fill"></i>
                <span>Sensor Report</span>
            </a>
        </li>
    </ul>
</aside>
