<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">FIC Batch 7</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">FB7</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>

            </li>
            <li class="nav-item dropdown {{ $type_menu === 'user' ? 'active' : '' }}">
                <a href="{{route('user.index')}}" class="nav-link"><i class="fas fa-users"></i>
                    <span>User List</span></a>
            </li>
            {{-- <li class="nav-item dropdown {{ $type_menu === 'bootstrap' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('bootstrap-alert') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-alert') }}">Alert</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-badge') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-badge') }}">Badge</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-breadcrumb') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-breadcrumb') }}">Breadcrumb</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-buttons') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-buttons') }}">Buttons</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-card') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-card') }}">Card</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-carousel') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-carousel') }}">Carousel</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-collapse') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-collapse') }}">Collapse</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-dropdown') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-dropdown') }}">Dropdown</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-form') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-form') }}">Form</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-list-group') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-list-group') }}">List Group</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-media-object') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-media-object') }}">Media Object</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-modal') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-modal') }}">Modal</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-nav') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-nav') }}">Nav</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-navbar') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-navbar') }}">Navbar</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-pagination') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-pagination') }}">Pagination</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-popover') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-popover') }}">Popover</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-progress') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-progress') }}">Progress</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-table') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-table') }}">Table</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-tooltip') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-tooltip') }}">Tooltip</a>
                    </li>
                    <li class="{{ Request::is('bootstrap-typography') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('bootstrap-typography') }}">Typography</a>
                    </li>
                </ul>
            </li> --}}
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
