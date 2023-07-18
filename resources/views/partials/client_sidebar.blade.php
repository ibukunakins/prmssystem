<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ Request::segment(2) == '' ?'active':'' }}">
        <a href="{{ route('account.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(2) == 'invoices' ?'active':'' }}">
        <a href="{{ route('account.invoices') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="Analytics">Invoices</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ route('account.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-wallet-alt"></i>
            <div data-i18n="Analytics">Payments</div>
        </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Layouts">Employees</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="" class="menu-link">
                    <div data-i18n="Without menu">Add New</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="" class="menu-link">
                    <div data-i18n="Without navbar">All Employees</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item {{ Request::segment(2) == 'profile' ?'active':'' }}">
        <a href="{{ route('account.profile.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Analytics">Update Profile</div>
        </a>
    </li>
</ul>