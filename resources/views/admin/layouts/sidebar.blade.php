<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('admin/images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="js-arrow" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="{{ request()->routeIs('banner-management.index') ? 'active' : '' }}">
                    <a href="{{ route('banner-management.index') }}">
                        <i class="fas fa-copy"></i>Banner Management</a>
                </li> 
                <li  class="{{ request()->routeIs('category-management.index') ? 'active' : '' }}">
                    <a href="{{ route('category-management.index') }}">
                        <i class="fa fa-tasks"></i>Category</a>
                </li>
                <li class="{{ request()->routeIs('sub-category.index') ? 'active' : '' }}">
                    <a href="{{ route('sub-category.index') }}">
                        <i class="fa fa-tasks"></i>Sub Category</a>
                </li>
                <li class="{{ request()->routeIs('coupon-management.index') ? 'active' : '' }}">
                    <a href="{{ route('coupon-management.index') }}">
                        <i class="fa fa-tags" ></i>Coupon</a>
                </li>
                <li class="{{ request()->routeIs('product-management.index') ? 'active' : '' }}">
                    <a href="{{ route('product-management.index') }}">
                        <i class="fa fa-th" ></i>Products Management</a>
                </li> 
                
                
                
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>