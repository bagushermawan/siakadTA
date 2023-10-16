<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('/') }}">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('/') }}">Si</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('home*') ? 'active' : '' }}">
                <a class="nav-link{{ request()->is('home*') ? ' beep beep-sidebar' : '' }}" href="/home">
                    <i class="far fa-user"></i> <span>Welcome</span></a>
            </li>
            <li class="menu-header">Pages</li>
            {{-- <li class="nav-item dropdown"> --}}
            <li class="nav-item dropdown{{ request()->is('user*', 'role*') ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>User & Permission</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('user*') ? 'active' : '' }}">
                        <a class="nav-link{{ request()->is('user*') ? ' beep beep-sidebar' : '' }}"
                            href="{{ route('user') }}">User</a>
                    </li>
                    <li class="{{ request()->is('role*') ? 'active' : '' }}">
                        <a class="nav-link{{ request()->is('role*') ? ' beep beep-sidebar' : '' }}"
                            href="{{ route('role') }}">Role</a>
                    </li>
                </ul>
            </li>
            <li class="{{ request()->is('mapel*') ? 'active' : '' }}">
                <a class="nav-link{{ request()->is('mapel*') ? ' beep beep-sidebar' : '' }}" href="{{ route('mapel') }}">
                    <i class="far fa-user"></i> <span>Mata Pelajaran</span></a>
            </li>
            <li class="{{ request()->is('kelas*') ? 'active' : '' }}">
                <a class="nav-link{{ request()->is('kelas*') ? ' beep beep-sidebar' : '' }}" href="{{ route('kelas') }}">
                    <i class="far fa-user"></i> <span>Kelas</span></a>
            </li>
            <li class="{{ request()->is('prestasi*') ? 'active' : '' }}">
                <a class="nav-link{{ request()->is('prestasi*') ? ' beep beep-sidebar' : '' }}" href="{{ route('prestasi') }}">
                    <i class="far fa-user"></i> <span>Prestasi</span></a>
            </li>
            <li class="{{ request()->is('ekskul*') ? 'active' : '' }}">
                <a class="nav-link{{ request()->is('ekskul*') ? ' beep beep-sidebar' : '' }}" href="{{ route('ekskul') }}">
                    <i class="fas fa-cogs"></i> <span>Ekstrakulikuler</span></a>
            </li>
            <li class="{{ request()->is('tahunajaran*') ? 'active' : '' }}">
                <a class="nav-link{{ request()->is('tahunajaran*') ? ' beep beep-sidebar' : '' }}" href="{{ route('tahunajaran') }}">
                    <i class="fas fa-cogs"></i> <span>Tahun Ajaran</span></a>
            </li>
            {{-- <li><a class="nav-link" href="/crud"><i class="far fa-square"></i> <span>C R U D</span></a></li> --}}
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://demo.getstisla.com/" target="_blank"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
