<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('/') }}">Bengkelq Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('/') }}">Bengs</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('home*') ? 'active' : '' }}"><a
                    class="nav-link{{ request()->is('home*') ? ' beep beep-sidebar' : '' }}" href="/home"><i
                        class="far fa-user"></i> <span>Welcome</span></a></li>
            <li class="menu-header">Pages</li>
            {{-- <li class="nav-item dropdown"> --}}
            <li
                class="nav-item dropdown{{ request()->is('user*', 'role*', 'category*', 'product*', 'complaint*', 'transaction*', 'blog*') ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Menu</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('user*') ? 'active' : '' }}"><a
                            class="nav-link{{ request()->is('user*') ? ' beep beep-sidebar' : '' }}"
                            href="{{ route('user') }}">User</a></li>
                    <li class="{{ request()->is('role*') ? 'active' : '' }}"><a
                            class="nav-link{{ request()->is('role*') ? ' beep beep-sidebar' : '' }}"
                            href="{{ route('role') }}">Role</a></li>
                    <li class="{{ request()->is('category*') ? 'active' : '' }}"><a
                            class="nav-link{{ request()->is('category*') ? ' beep beep-sidebar' : '' }}"
                            href="{{ route('category') }}">Category</a></li>
                    <li class="{{ request()->is('product*') ? 'active' : '' }}"><a
                            class="nav-link{{ request()->is('product*') ? ' beep beep-sidebar' : '' }}"
                            href="{{ route('product') }}">Product</a></li>
                    <li class="{{ request()->is('complaint*') ? 'active' : '' }}"><a
                            class="nav-link{{ request()->is('complaint*') ? ' beep beep-sidebar' : '' }}"
                            href="{{ route('complaint') }}">Complaint</a></li>
                    <li class="{{ request()->is('transaction*') ? 'active' : '' }}"><a
                            class="nav-link{{ request()->is('transaction*') ? ' beep beep-sidebar' : '' }}"
                            href="{{ route('transaction') }}">Transactions</a></li>
                    <li class="{{ request()->is('blog*') ? 'active' : '' }}"><a
                            class="nav-link{{ request()->is('blog*') ? ' beep beep-sidebar' : '' }}"
                            href="{{ route('blog') }}">Blogs</a></li>
                </ul>
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
