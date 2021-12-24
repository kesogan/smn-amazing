<div id="header-wrapper" class="dt-sticky-menu"> <!-- **header-wrapper Starts** -->
    <div id="header" class="header">
        <div class="container menu-container">
            <a class="logo" href="{{ route('home') }}"><img alt="Logo" src="{{ asset('assets/images/new/logo.png') }}" width="200px"></a>

            <a href="#" class="menu-trigger">
                <span></span>
            </a>
        </div>
    </div>

    <nav id="main-menu"><!-- Main-menu Starts -->
        <div id="dt-menu-toggle" class="dt-menu-toggle">
            Menu
            <span class="dt-menu-toggle-icon"></span>
        </div>
        <ul class="menu type1"><!-- Menu Starts -->
            <li class="current_page_item menu-item-simple-parent">
                <a href="{{ route('home') }}">Home <span class="fa fa-home"></span></a>
            </li>
            <li class="menu-item-simple-parent"><a href="{{ route('shop.detail') }}">Shop <span class="fa fa-cart-plus"></span></a>
                {{-- <ul class="sub-menu">
                    <li><a href="shop-detail.html">Shop Detail</a></li>
                    <li><a href="shop-cart.html">Cart Page</a></li>
                    <li><a href="shop-checkout.html">Checkout Page</a></li>
                </ul>
                <a class="dt-menu-expand">+</a>    --}}
            </li>
            <li class="menu-item-simple-parent">
                <a href="{{ route('art.index') }}">Arts <span class="fa fa-user-secret"></span></a>
            </li>
            <li class="menu-item-simple-parent">
                <a href="{{ route('tattoo.index') }}">Tattoos <span class="fa fa-user-secret"></span></a>
            </li>
            <li class="menu-item-simple-parent">
                <a href="{{ route('event.index') }}">Events <span class="fa fa-user-secret"></span></a>
            </li>
            <li class="menu-item-simple-parent">
                <a href="{{ route('about') }}">About us <span class="fa fa-user-secret"></span></a>
            </li>
            <li class="menu-item-simple-parent">
                <a href="{{ route('contact') }}">Contact <span class="fa fa-user-secret"></span></a>
            </li>
            <li class="menu-item-simple-parent">
                @guest
                <a href="progressbar.html">Account <span class="fa fa-account"></span></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('login') }}"> Login </a></li>
                    <li><a href="{{ route('register') }}"> Register</a></li>
                </ul>
                @else
                <a href="progressbar.html">{{ auth()->user()->firstName }} <span class="fa fa-account"></span></a>
                <ul class="sub-menu">
                    <li><a href="#"> Setting </a></li>
                    @role('admin')
                    <li><a href="{{ route('dashboard') }}"> Dashboard </a></li>
                    @endrole
                    <li>
                        <a href="#"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                @endauth
                <a class="dt-menu-expand">+</a>
            </li>
            @role('admin')
            {{--<li class="menu-item-simple-parent">
                <a href="{{ route('dashboard') }}">Dashboard <span class="fa fa-user-secret"></span></a>
            </li>--}}
            @endrole

        </ul> <!-- Menu Ends -->
    </nav> <!-- Main-menu Ends -->
</div><!-- **header-wrapper Ends** -->
