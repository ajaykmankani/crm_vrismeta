<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
         @can('user.view')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                Dashboard
                {{-- <span class="menu-title">Dashboard</span> --}}
            </a>
        </li>
        @endcan
        @can('user.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user_list') }}">
                    Users
                    {{-- <span class="menu-title">Users</span> --}}
                </a>
            </li>
        @endcan
        {{-- @can('user.create')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user_register') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">User Registration</span>
            </a>
        </li>
        @endcan --}}
        @can('sale.listing')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sale_list') }}">
                   Sales
                    {{-- <span class="menu-title">Sales</span> --}}
                </a>
            </li>
        @endcan
        {{-- @can('sale.create')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sale_index') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Sale Create</span>
            </a>
        </li>
        @endcan --}}
        @can('lead.listing')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lead_list') }}">
                    Leads
                    {{-- <span class="menu-title">Leads</span> --}}
                </a>
            </li>
        @endcan
        @can('log.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('log.index') }}">
                    Logs
                    {{-- <span class="menu-title">Logs</span> --}}
                </a>
            </li>
        @endcan
        @can('role.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('create_role') }}">
                    Roles and Permissions
                    {{-- <span class="menu-title">Roles and Permissions</span> --}}
                </a>
            </li>
        @endcan
        @can('employee.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee_list') }}">
                    Employee
                    {{-- <span class="menu-title">Employee</span> --}}
                </a>
            </li>
        @endcan
        @can('service.view')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product_service.index') }}">
                Product & Service
                {{-- <span class="menu-title">Product & Service</span> --}}
            </a>
        </li>
    @endcan

        {{-- @can('lead.create')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('lead_index') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Lead Create</span>
            </a>
        </li>
        @endcan --}}
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li> --}}

    </ul>
</nav>
