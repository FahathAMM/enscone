<div class="nk-sidebar" style="position: fixed">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    @hasanyrole('admin|developer')
                        {{-- <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li> --}}
                    @endhasanyrole
                </ul>
            </li>

            <li class="nav-label">Apps</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Shop</span>
                </a>
                <ul aria-expanded="false">
                    {{-- <li><a href="{{ route('categories.index') }}">Categories</a></li> --}}
                    {{-- <li><a href="{{ route('products.index') }}">Products</a></li> --}}
                    <li><a href="{{ route('customers.index') }}">Customer</a></li>
                    <li><a href="{{ route('services.index') }}">Services</a></li>
                    <li><a href="{{ route('bill') }}">Bill</a></li>
                    <li><a href="{{ route('invoice') }}">Invoice</a></li>
                    <li><a href="{{ route('terms.index') }}">Term & Condition</a></li>
                    {{-- <li><a href="{{ route('Portfolio.skill') }}">Skills</a></li>
                    <li><a href="{{ route('Portfolio.education') }}">Education</a></li>
                    <li><a href="{{ route('Portfolio.experiences') }}">Experiences</a></li>
                    <li><a href="{{ route('Portfolio.projects') }}">Projects</a></li>
                    <li><a href="{{ route('Portfolio.services') }}">Services</a></li>
                    <li><a href="{{ route('Portfolio.about') }}">About Us</a></li>
                    <li><a href="{{ route('Portfolio.contact') }}">Contact</a></li> --}}
                </ul>
            </li>

            @hasanyrole('admin|developer')
                <li class="nav-label">Permissions</li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-menu menu-icon"></i><span class="nav-text">Permission</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('user.list') }}" aria-expanded="false">Users Roles</a></li>
                        <li><a href="{{ route('permission.index') }}" aria-expanded="false">User Permissions</a></li>
                    </ul>
                </li>
            @endhasanyrole

            <li class="nav-label">Setting </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('Portfolio.settings') }}">Setting</a></li>

                </ul>
            </li>
        </ul>


    </div>
</div>
