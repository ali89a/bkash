<li class="nav-item ">
    <a href="{{ url('/home') }}" class="nav-link {{ ( strcmp(url()->current(), url('/home')) == 0 ) ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>{{ trans('sidebar.dashboard')}}</p>
    </a>
</li>
<li class="nav-item ">
    <a href="{{ route('balance.index') }}"
        class="nav-link {{ ( strcmp(url()->current(), url('/balance')) == 0 ) ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
       <p>{{ trans('sidebar.balance')}}</p>
    </a>
</li>


<li
    class="nav-item has-treeview {{ (Request::segment(1) == 'user' || Request::segment(1) == 'role' || Request::segment(1) == 'permission' )?' menu-open':'menu-close'}}">
    <a href="{{ url('') }}"
        class="nav-link {{ (Request::segment(1) == 'user' || Request::segment(1) == 'role' || Request::segment(1) == 'permission' )?' active ':''}}">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
            <i class="right fas fa-angle-left"></i>
            Access Control
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">

            <a href="{{ route('user.index') }}"
                class="nav-link {{ (Request::route()->getName() == 'user.index' || Request::route()->getName() == 'user.create' || Request::route()->getName() == 'user.edit') ? ' active' : '' }}">
                <i class="fa fa-user nav-icon"></i>
                <p>User</p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('role.index') }}"
                class="nav-link {{ (Request::route()->getName() == 'role.index' || Request::route()->getName() == 'role.create' || Request::route()->getName() == 'role.edit') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Role</p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('permission.index') }}"
                class="nav-link {{ (Request::route()->getName() == 'permission.index' || Request::route()->getName() == 'permission.create' || Request::route()->getName() == 'permission.edit') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Permission</p>
            </a>
        </li>

    </ul>
</li>