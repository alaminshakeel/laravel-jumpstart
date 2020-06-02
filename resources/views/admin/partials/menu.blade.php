<li class="nav-item mT-30 active">
    <a class='sidebar-link' href="{{ route(ADMIN . '.dash') }}" default>
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>
@can('user_base',Auth::user())

    <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">

        <span class="icon-holder"><i class="c-brown-500 ti-user"></i>
        </span><span class="title">Users</span>
            <span class="arrow"><i class="ti-angle-right"></i></span>
        </a>
        <ul class="dropdown-menu">
            <li><a class="sidebar-link" href="{{ route(ADMIN . '.users.index') }}">User List</a></li>
            @if(Auth::user()->is_developer)
                <li><a class="sidebar-link" href="{{ url('admin/permissions') }}">Permissions</a></li>
            @endif
            @can('role_base',Auth::user())
                <li><a class="sidebar-link" href="{{ url('admin/roles') }}">Roles</a></li>
            @endcan
        </ul>
    </li>
@endcan
