<aside class="sidebar-wrapper">
    <div class="sidebar" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="menu-title">
                    <span>Main menu</span>
                </li>
                <li class="mb-4">
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
                        <span data-feather="home" class="nav-icon"></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">
                    <span>Applications</span>
                </li>
                <li class="{{ request()->is('user-groups*', 'users*') ? 'active' : '' }}">
                    <a href="#" class="">
                        <span data-feather="users" class="nav-icon"></span>
                        <span class="menu-text">Users Management</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('user-groups*') ? 'active' : '' }}"
                                href="{{ route('user-groups.index') }}">User Groups</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('users*') ? 'active' : '' }}"
                                href="{{ route('users.index') }}">Users</a>
                        </li>
                    </ul>
                </li>
                <li class=" {{ request()->is('areas*', 'cities*', 'sites*') ? 'active' : '' }}">
                    <a href="#" class="">
                        <span data-feather="map-pin" class="nav-icon"></span>
                        <span class="menu-text">Location Management</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('cities*') ? 'active' : '' }}"
                                href="{{ route('cities.index') }}">Cities</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('areas*') ? 'active' : '' }}"
                                href="{{ route('areas.index') }}">Areas</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('sites*') ? 'active' : '' }}"
                                href="{{ route('sites.index') }}">Sites</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('purchase-types.index') }}"
                        class="{{ request()->is('purchase-types*') ? 'active' : '' }}">
                        <span data-feather="file-text" class="nav-icon"></span>
                        <span class="menu-text">Purchase Types</span>
                    </a>
                </li>
                <li
                    class=" {{ request()->is('petty-cash-account-groups*', 'petty-cash-accounts*', 'petty-cash-transactions*', 'petty-cash-reports*') ? 'active' : '' }}">
                    <a href="#" class="">
                        <span data-feather="book-open" class="nav-icon"></span>
                        <span class="menu-text">Petty Cash Management</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('petty-cash-account-groups*') ? 'active' : '' }}"
                                href="{{ route('petty-cash-account-groups.index') }}">Petty Cash Account Groups</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('petty-cash-accounts*') ? 'active' : '' }}"
                                href="{{ route('petty-cash-accounts.index') }}">Petty Cash Accounts</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('petty-cash-transactions*') ? 'active' : '' }}"
                                href="{{ route('petty-cash-transactions.index') }}">Petty Cash Transactions</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('petty-cash-reports*') ? 'active' : '' }}"
                                href="{{ route('petty-cash-reports.index') }}">Petty Cash Reports</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
