@php
    $user = auth()->user()->load('role');
@endphp
<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ Request::segment(2) == '' ?'active':'' }}">
        <a href="{{ route('accounts.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(2) == 'patients' ?'active':'' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Layouts">Patients</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('accounts.patients.create') }}" class="menu-link">
                    <div data-i18n="Without menu">Add Patient</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('accounts.patients.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">All Patients</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item  {{ Request::segment(2) == 'staff' ?'active':'' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Layouts">Staff</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('accounts.staff.create') }}" class="menu-link">
                    <div data-i18n="Without menu">Add Staff</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('accounts.staff.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">All Staff</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item  {{ Request::segment(2) == 'departments' ?'active':'' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-building"></i>
            <div data-i18n="Layouts">Departments</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('accounts.departments.create') }}" class="menu-link">
                    <div data-i18n="Without menu">Add Department</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('accounts.departments.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">All Departments</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item  {{ Request::segment(2) == 'services' ?'active':'' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-building"></i>
            <div data-i18n="Layouts">Services</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('accounts.services.create') }}" class="menu-link">
                    <div data-i18n="Without menu">Add Service</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('accounts.services.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">All Services</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item {{ Request::segment(2) == 'profile' ?'active':'' }}">
        <a href="{{ route('profile.edit') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Analytics">Update Profile</div>
        </a>
    </li>
</ul>