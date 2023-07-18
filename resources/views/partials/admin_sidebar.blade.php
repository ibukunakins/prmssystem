@php
    $user = auth()->user()->load('role');
@endphp
<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ Request::segment(2) == '' ?'active':'' }}">
        <a href="{{ route('dashboard.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(2) == 'clients' ?'active':'' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-briefcase"></i>
            <div data-i18n="Layouts">Clients</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('dashboard.clients.add') }}" class="menu-link">
                    <div data-i18n="Without menu">Add Company</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('dashboard.clients.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">All Companies</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item  {{ Request::segment(2) == 'users' ?'active':'' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Layouts">Users</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('dashboard.users.add') }}" class="menu-link">
                    <div data-i18n="Without menu">Add User</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('dashboard.users.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">All Users</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-cog"></i>
            <div data-i18n="Layouts">Configurations</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('dashboard.deductions.index') }}" class="menu-link">
                    <div data-i18n="Without menu">Deduction Setting</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="" class="menu-link">
                    <div data-i18n="Without navbar">Services</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('dashboard.settings.index') }}" class="menu-link">
                    <div data-i18n="Without menu">App Setting</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item {{ Request::segment(2) == 'profile' ?'active':'' }}">
        <a href="{{ route('dashboard.profile.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Analytics">Update Profile</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(2) == 'profile' ?'active':'' }}">
        <a href="{{ route('dashboard.logs.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="Analytics">Logs</div>
        </a>
    </li>
</ul>