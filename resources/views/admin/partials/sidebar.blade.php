{{--  BEGIN: Main Menu --}}

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="{{ route('admin.index') }}">
                        <div class="">
                            <img style="max-width: 55px" src="">
                        </div>
                        <b style="font-size: 20px" class="mb-0 pl-1 text-center">Bike's Shop</b>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div> <br>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item {{ request()->is('admin') ? 'active' : '' }}"><a href="{{route('admin.index')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class=" navigation-header"><span>Main</span>
                </li>
                <li class=" nav-item {{ request()->routeIs('admin.bike.*') ? 'active' : '' }}"><a href="{{ route('admin.bike.showAll') }}"><i class="fa fa-bicycle"></i><span class="menu-title" data-i18n="Merchant">Bikes</span></a>
                </li>
                <li class=" nav-item {{ request()->routeIs('admin.part.*') ? 'active' : '' }}"><a href="{{ route('admin.part.showall') }}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Merchant">Bike Parts</span></a>
                </li>

                <li class=" nav-item {{ request()->is('admin/order/unpayment') ? 'active' : '' }}"><a href="{{ route('admin.order.showUnpayment') }}"><i class="fa fa fa-spinner"></i><span class="menu-title" data-i18n="Merchant">Order (unpayment)</span></a>
                </li>
                <li class=" nav-item {{ request()->is('admin/order/payment') ? 'active' : '' }}"><a href="{{ route('admin.order.showPayment') }}"><i class="fa fa-credit-card"></i><span class="menu-title" data-i18n="Merchant">Order (payment)</span></a>
                </li>

                <li class=" nav-item {{ request()->is('admin/order/ondelivery') ? 'active' : '' }}"><a href="{{ route('admin.order.showDelivery') }}"><i class="fa fa-truck"></i><span class="menu-title" data-i18n="Merchant">Order Delivery</span></a>
                </li>
                <li class=" nav-item {{ request()->is('admin/order/success') ? 'active' : '' }}"><a href="{{ route('admin.order.success') }}"><i class="fa fa-check-square"></i><span class="menu-title" data-i18n="Merchant">Order Success</span></a>
                </li>
                

                <li class=" navigation-header"><span>Master</span>
                </li>
                </li>
                <li class=" nav-item {{ request()->routeIs('admin.bank.*') ? 'active' : '' }}"><a href="{{ route('admin.bank.showAll') }}"><i class="fa fa-university"></i><span class="menu-title" data-i18n="Calender">Banks</span></a>
                </li>
                <li class=" nav-item {{ request()->is('admin/customers') ? 'active' : '' }}"><a href="{{route('admin.user.showCustomers')}}"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Calender">Customers</span></a>
                </li>
                <li class=" nav-item {{ request()->is('admin/user') ? 'active' : '' }}"><a href="{{route('admin.user.showAll')}}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Calender">Users</span></a>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu
