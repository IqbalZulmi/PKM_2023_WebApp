<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Section for Superadmin -->
        <li class="nav-heading">Pages</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboardPage') || request()->routeIs('dashboardDetailPage') ? '' : 'collapsed' }}"
                href="{{ route('dashboardPage') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('laporanSensorPage') ? '' : 'collapsed' }}"
                href="{{ route('laporanSensorPage') }}">
                <i class="bi bi-file-earmark-break-fill"></i>
                <span>Sensor Report</span>
            </a>
        </li>
        @auth
            @if (Auth::user()->roles == 'pengelola')
                <li class="nav-heading">Manage</li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kelolaPelangganPage') ? '' : 'collapsed' }}"
                        href="{{ route('kelolaPelangganPage') }}">
                        <i class="bi bi-people-fill"></i>
                        <span>Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kelolaTitikPage') ? '' : 'collapsed' }}"
                        href="{{ route('kelolaTitikPage') }}">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Point</span>
                    </a>
                </li>
            @endif
        @endauth
    </ul>
</aside>
