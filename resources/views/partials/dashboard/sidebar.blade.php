<div id="menu-fixed" class="main-menu menu-fixed menu-light menu-accordion menu-shadow menu-dark" data-scroll-to-active="true">
    <div id="sidebar__acc__info" class="text-center d-none d-xl-block mb-1">
        <img src="{{ $appData['app_logo'] }}" alt="" class="mx-auto">
    </div>
    <div class="navbar-header d-xl-none d-block">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="/dashboard">
                    <span class="brand-logo"> </span>
                    <h2 class="brand-text">Number Plate</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul id="sidebar-menu-navigation" style="padding-bottom: 9em !important">
            <li class="navigation-list">
                <a href="{{ route('dashboard.index') }}" class="router-link navigation-link flex {{ Request::segment(2) == '' ? 'active-nav-link' : '' }}">
                    <span class="w-8">
                        <i data-feather="trending-up" class="avatar-icon"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (hasSidebarPermission($user, 'sell.plate.numbers'))                
                <li class="navigation-list">
                    <a href="{{ route('dashboard.platenumbers.sellPlate') }}" class="router-link navigation-link flex {{ Request::segment(2) == 'platenumbers' && Request::segment(3) == 'sell' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="shopping-bag" class="avatar-icon"></i>
                        </span>
                        <span>Sell Plate Number</span>
                    </a>
                </li>
            @endif
            @if (hasPermission($user, ['create.plate.numbers','approve.plate.numbers', 'view.plate.numbers', 'sell.plate.numbers', 'request.plate.numbers', 'assign.plate.numbers']))    
                <li class="navigation-list">
                    <a @click.prevent href="#" class="navigation-link flex has-sub-menu {{ Request::segment(2) == 'platenumbers' && Request::segment(3) != 'sell' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="hash" class="avatar-icon"></i>
                        </span>
                        <span class="w-10/12">Plate Numbers</span>
                        <span class="text-xl">+</span>
                    </a>
                    <ul id="navigation-dropdown" class="hidden">
                        @if (hasPermission($user, 'create.plate.numbers'))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.platenumbers.create') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'platenumbers' && Request::segment(3) == 'create'  ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="plus" class="avatar-icon"></i>
                                    </span>
                                    <span>Create Plates</span>
                                </a>
                            </li>
                        @endif
                        @if (hasSidebarPermission($user, 'request.plate.numbers'))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.platenumbers.request') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'platenumbers' && Request::segment(3) == 'requests' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="help-circle" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Make Request</span>
                                </a>
                            </li>
                        @endif
                        @if (hasSidebarPermission($user, 'sell.plate.numbers'))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.platenumbers.collections') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'platenumbers' && Request::segment(3) == '' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="shopping-bag" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Plate Collection</span>
                                </a>
                            </li>
                        @endif
                        @if (hasSidebarPermission($user, 'approve.plate.numbers'))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.platenumbers.approve.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'platenumbers' && Request::segment(3) == 'approve' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="check-circle" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Approve Plates</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission($user, ['assign.plate.numbers', 'approve.plate.numbers', 'view.plate.numbers']))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.platenumbers.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'platenumbers' && Request::segment(3) == '' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="list" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Plate Series</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (hasPermission($user, ['assign.plate.numbers', 'request.plate.numbers', 'approve.plate.numbers']))    
                <li class="navigation-list">
                    <a @click.prevent href="#" class="navigation-link flex has-sub-menu {{ Request::segment(2) == 'requests' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="help-circle" class="avatar-icon"></i>
                        </span>
                        <span class="w-10/12">Requests</span>
                        <span class="text-xl">+</span>
                    </a>
                    <ul id="navigation-dropdown" class="hidden">
                        @if (hasPermission($user, ['assign.plate.numbers', 'request.plate.numbers']))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.requests.mla') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'requests' && Request::segment(3) == 'mla' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="plus-square" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">MLA Requests</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission($user, ['assign.plate.numbers', 'approve.plate.numbers', 'delete.plate.numbers']))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.requests.mla-plates') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'requests' && Request::segment(3) == 'mla-plates' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="users" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">MLA Assigned Plates</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (hasPermission($user, ['process.insurance']))
                <li class="navigation-list">
                    <a @click.prevent href="#" class="navigation-link flex has-sub-menu {{ Request::segment(2) == 'insurances' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="shield" class="avatar-icon"></i>
                        </span>
                        <span class="w-10/12">Manage Insurance</span>
                        <span class="text-xl">+</span>
                    </a>
                    <ul id="navigation-dropdown" class="hidden">
                        @if (hasSidebarPermission($user, ['process.insurance']))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.insurances.sell') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'insurances' && Request::segment(3) == 'sell' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="shopping-bag" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Sell Insurance</span>
                                </a>
                            </li>
                        @endif
                        @if (hasSidebarPermission($user, ['process.insurance']))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.insurances.invoices') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'insurances' && Request::segment(3) == 'invoices' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="file-text" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Insurance Process</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission($user, ['process.insurance']))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.insurances.failed') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'insurances' && Request::segment(3) == 'failed' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="shield-off" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Failed Insurance</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (hasPermission($user, ['process.revalidation']))
                <li class="navigation-list">
                    <a href="{{ route('dashboard.revalidations.process') }}" class="router-link navigation-link flex {{ Request::segment(2) == 'revalidations' && Request::segment(3) ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="refresh-ccw" class="avatar-icon"></i>
                        </span>
                        <span>Process Revalidation</span>
                    </a>
                </li>
            @endif
            @if (hasSidebarPermission($user, ['approve.plate.numbers']))
                <li class="navigation-list">
                    <a href="{{ route('dashboard.reports.approvals') }}" class="router-link navigation-link flex {{ Request::segment(3) == 'approvals' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="file-text" class="avatar-icon"></i>
                        </span>
                        <span>Approval Reports</span>
                    </a>
                </li>
            @endif            
            @if (hasPermission($user, ['view.user','create.user']))    
                <li class="navigation-list">
                    <a @click.prevent href="#" class="navigation-link flex has-sub-menu {{ Request::segment(2) == 'users' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="users" class="avatar-icon"></i>
                        </span>
                        <span class="w-10/12">Manage Users</span>
                        <span class="text-xl">+</span>
                    </a>
                    <ul id="navigation-dropdown" class="hidden">
                        @if (hasPermission($user, 'create.user'))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.users.add') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'users' && Request::segment(3) == 'add' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="plus-square" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Add User</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission($user, 'view.user'))
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.users.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'users' && Request::segment(3) == '' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="users" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">All Users</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if ($user->role->slug == 'super-admin' || $user->role->slug == 'admin' || $user->role->slug == 'mla' || hasPermission($user, ['reassign.vehicles', 'process.change.of.ownership']))
                <li class="navigation-list">
                    <a href="{{ route('dashboard.vehicles.index') }}" class="router-link navigation-link flex {{ Request::segment(2) == 'vehicles' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="file-text" class="avatar-icon"></i>
                        </span>
                        <span>Vehicles</span>
                    </a>
                </li>
            @endif
            @if (hasPermission($user, ['view.invoices']))
                <li class="navigation-list">
                    <a href="{{ route('dashboard.invoices.index') }}" class="router-link navigation-link flex {{ Request::segment(2) == 'invoices' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="file" class="avatar-icon"></i>
                        </span>
                        <span>Invoices</span>
                    </a>
                </li>
            @endif
            @if (hasPermission($user, ['view.sales.report', 'process.revalidation']))
                <li class="navigation-list">
                    <a @click.prevent href="#" class="navigation-link flex has-sub-menu {{ Request::segment(2) == 'sales' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="file-text" class="avatar-icon"></i>
                        </span>
                        <span class="w-10/12">Sales Report</span>
                        <span class="text-xl">+</span>
                    </a>
                    <ul id="navigation-dropdown" class="hidden">
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.sales.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'sales' && Request::segment(3) == '' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="file-text" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Number Plate Sales</span>
                            </a>
                        </li>
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.sales.insuranceSales') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'sales' && Request::segment(3) == 'insurance' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="file-text" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Insurance Sales</span>
                            </a>
                        </li>
                        @if (hasPermission($user, 'process.revalidation') || $user->role->slug == 'admin')
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.sales.revalidations') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'sales' && Request::segment(3) == 'revalidations' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="file-text" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Revalidation Sales</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission($user, 'process.change-of-ownership') || $user->role->slug == 'admin')
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.sales.changeOfOwnership') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'sales' && Request::segment(3) == 'change-of-ownership' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="file-text" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Change of Ownership</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (hasPermission($user, ['view.reports']))
                <li class="navigation-list">
                    <a @click.prevent href="#" class="navigation-link flex has-sub-menu {{ Request::segment(2) == 'reports' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="file-text" class="avatar-icon"></i>
                        </span>
                        <span class="w-10/12">All Reports</span>
                        <span class="text-xl">+</span>
                    </a>
                    <ul id="navigation-dropdown" class="hidden">
                        @if (hasPermission($user, ['view.reports']))                            
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.reports.govt') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'reports' && Request::segment(3) == 'govt' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="file-text" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Government Report</span>
                                </a>
                            </li>
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.reports.general') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'reports' && Request::segment(3) == 'general' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="file-text" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">General Report</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission($user, ['approve.plate.numbers', 'assign.plate.numbers']))                            
                            <li class="sub-navigation-list">
                                <a href="{{ route('dashboard.platenumbers.stocks') }}" class="flex sub-navigation-link router-link {{ Request::segment(3) == 'stocks' ? 'active-sub-link' : '' }}">
                                    <span class="w-8">
                                        <i data-feather="file-text" class="avatar-icon"></i>
                                    </span>
                                    <span class="w-10/12">Plate Stocks</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (hasPermission($user, 'edit.configuration'))
                <li class="navigation-list">
                    <a @click.prevent href="#" class="navigation-link flex has-sub-menu {{ Request::segment(2) == 'configurations' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="settings" class="avatar-icon"></i>
                        </span>
                        <span class="w-10/12">Configurations</span>
                        <span class="text-xl">+</span>
                    </a>
                    <ul id="navigation-dropdown" class="hidden">
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.stations.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'stations' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="grid" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Manage Stations</span>
                            </a>
                        </li>
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.configurations.services.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'configurations' && Request::segment(3) == 'services' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="user-check" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Services</span>
                            </a>
                        </li>
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.configurations.plate-types.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'configurations' && Request::segment(3) == 'plate-types' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="hash" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Number Plate Types</span>
                            </a>
                        </li>
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.configurations.insurance-setup.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'configurations' && Request::segment(3) == 'insurance-setup' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="shield" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Insurance Setup</span>
                            </a>
                        </li>
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.configurations.revalidation-setup.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'configurations' && Request::segment(3) == 'revalidation-setup' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="hash" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Revalidation Setup</span>
                            </a>
                        </li>
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.configurations.vehicle-categories.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'configurations' && Request::segment(3) == 'vehicle-categories' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="hash" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Vehicle Categories</span>
                            </a>
                        </li>
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.configurations.vehicle-makes.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'configurations' && Request::segment(3) == 'vehicle-makes' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="hash" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Vehicle Makes</span>
                            </a>
                        </li>
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.configurations.vehicle-models.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'configurations' && Request::segment(3) == 'vehicle-models' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="hash" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Vehicle Models</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="navigation-list">
                <a @click.prevent href="#" class="navigation-link flex has-sub-menu {{ Request::segment(2) == 'settings' ? 'active-nav-link' : '' }}">
                    <span class="w-8">
                        <i data-feather="settings" class="avatar-icon"></i>
                    </span>
                    <span class="w-10/12">Settings</span>
                    <span class="text-xl">+</span>
                </a>
                <ul id="navigation-dropdown" class="hidden">
                    <li class="sub-navigation-list">
                        <a href="{{ route('dashboard.settings.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'settings' && Request::segment(3) == 'profile' ? 'active-sub-link' : '' }}">
                            <span class="w-8">
                                <i data-feather="users" class="avatar-icon"></i>
                            </span>
                            <span class="w-10/12">Profile Settings</span>
                        </a>
                    </li>
                    @if (hasPermission($user))
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.settings.rolesPermission') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'users' && Request::segment(3) == 'roles-and permission' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="key" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Roles & Permission</span>
                            </a>
                        </li>
                    @endif
                    @if (hasPermission($user, ['edit.app.settings']))
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.settings.appSettings') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'settings' && Request::segment(3) == 'app-settings' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="tool" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">App Settings</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>            
            @if ($user->role->slug == 'super-admin' || $user->role->slug == 'chairman' ||  $user->role->slug == 'mla' || hasPermission($user, 'hand.over'))
                <a @click.prevent href="#" class="navigation-link flex has-sub-menu {{ Request::segment(2) == 'handover' ? 'active-nav-link' : '' }}">
                    <span class="w-8">
                        <i data-feather="rotate-ccw" class="avatar-icon"></i>
                    </span>
                    <span class="w-10/12">Hand Over</span>
                    <span class="text-xl">+</span>
                </a>
                
                <ul id="navigation-dropdown" class="hidden">
                    <li class="sub-navigation-list">
                        <a href="{{ route('dashboard.handover.histories') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'handover' && Request::segment(3) == 'histories' ? 'active-sub-link' : '' }}">
                            <span class="w-8">
                                <i data-feather="trending-up" class="avatar-icon"></i>
                            </span>
                            <span class="w-10/12">
                                @if ($user->role->slug == 'mla')
                                    Hand Over Status
                                @else
                                    Histories
                                @endif
                            </span>
                        </a>
                    </li>
                    {{-- @if ($user->role->slug == 'super-admin')                        
                        <li class="sub-navigation-list">
                            <a href="{{ route('dashboard.handover.index') }}" class="flex sub-navigation-link router-link {{ Request::segment(2) == 'handover' && Request::segment(3) == '' ? 'active-sub-link' : '' }}">
                                <span class="w-8">
                                    <i data-feather="rotate-ccw" class="avatar-icon"></i>
                                </span>
                                <span class="w-10/12">Change MLA</span>
                            </a>
                        </li>
                    @endif --}}
                </ul>
            @endif
            @if ($user->role->slug == 'super-admin')
                <li class="navigation-list">
                    <a href="{{ route('dashboard.logs.index') }}" class="router-link navigation-link flex {{ Request::segment(2) == 'logs' && Request::segment(3) == '' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="file-text" class="avatar-icon"></i>
                        </span>
                        <span>App Logs</span>
                    </a>
                </li>
                <li class="navigation-list">
                    <a href="{{ route('dashboard.exports.index') }}" class="router-link navigation-link flex {{ Request::segment(2) == 'exports' && Request::segment(3) == '' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="download" class="avatar-icon"></i>
                        </span>
                        <span>Export Reports</span>
                    </a>
                </li>
            @endif
            @if ($user->role->slug == 'mla')
                <li class="navigation-list">
                    <a href="{{ route('dashboard.handover.submitHandover') }}" class="router-link navigation-link flex {{ Request::segment(2) == 'handover' && Request::segment(3) == 'submit-request' ? 'active-nav-link' : '' }}">
                        <span class="w-8">
                            <i data-feather="send" class="avatar-icon"></i>
                        </span>
                        <span>Submit Hand Over</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>