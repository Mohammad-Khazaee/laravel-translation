 <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none"><x-jet-application-mark width="36" /></div>
    <ul class="c-sidebar-nav ps ps__rtl ps--active-y">
        <li class="c-sidebar-nav-title">صفحات اصلی</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('dashboard') }}">
                <i class="cil-pencil"></i>
                {{ __('Dashboard') }}
            </a>
        </li>
        
        <li class="c-sidebar-nav-title">سفارشات</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="cil-cursor"></i>
                سفارش
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ asset('orders/create') }}">
                        <span class="c-sidebar-nav-icon"></span> 
                        سفارش جدید
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ asset('orders') }}">
                        <span class="c-sidebar-nav-icon"></span> 
                        سفارش ها
                    </a>
                </li>
            </ul>
        </li>
    </li>
        <li class="c-sidebar-nav-title">پشتیبانی ها</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="cil-cursor"></i>
                پشتیبانی
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ asset('tickets/create') }}">
                        <span class="c-sidebar-nav-icon"></span> 
                        {{ __('New Ticket') }}
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ asset('tickets') }}">
                        <span class="c-sidebar-nav-icon"></span> 
                        {{ __('Tickets') }}
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-title">کاربر</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="cil-cursor"></i>
                اطلاعات کاربر
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('profile.show') }}">
                        <span class="c-sidebar-nav-icon"></span> 
                        {{ __('Profile') }}
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('logout') }}">
                        <span class="c-sidebar-nav-icon"></span> 
                        {{ __('Logout') }}
                    </a>
                </li>
            </ul>
    </ul>
    <button
        class="c-sidebar-minimizer c-class-toggler"
        type="button"
        data-target="_parent"
        data-class="c-sidebar-minimized"
    ></button>
</div>