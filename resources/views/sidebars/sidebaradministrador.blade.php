<!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="#">
                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li @click="menu=0">
                        <a href="#">
                            <i class="fas fa-area-chart"></i>
                            <span class="bot-line"></span>Dashboard
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-archive"></i>
                            <span class="bot-line"></span>Almacén
                        </a>
                        <ul class="header3-sub-list list-unstyled">
                            <li @click="menu=1">
                                <a href="#">Categorías</a>
                            </li>
                            <li @click="menu=2">
                                <a href="#">Articulos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="bot-line"></span>Compras
                        </a>
                        <ul class="header3-sub-list list-unstyled">
                            <li @click="menu=3">
                                <a href="#">Ingresos</a>
                            </li>
                            <li @click="menu=4">
                                <a href="#">Proveedores</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-credit-card"></i>
                            <span class="bot-line"></span>Ventas
                        </a>
                        <ul class="header3-sub-list list-unstyled">
                            <li @click="menu=5">
                                <a href="#">Ventas</a>
                            </li>
                            <li @click="menu=6">
                                <a href="#">Clientes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-address-card"></i>
                            <span class="bot-line"></span>Acceso
                        </a>
                        <ul class="header3-sub-list list-unstyled">
                            <li @click="menu=7">
                                <a href="#">Usuarios</a>
                            </li>
                            <li @click="menu=8">
                                <a href="#">Roles</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="header__tool">
                <notification :notifications="notifications"></notification>
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="images/icon/1.png" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">{{Auth::user()->usuario}}</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="images/icon/1.png" alt="John Doe" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#">{{Auth::user()->usuario}}</a>
                                    </h5>
                                    <span class="email">{{Auth::user()->idrol}}</span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-account"></i>Perfil</a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="{{ route('logout') }}" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="zmdi zmdi-power"></i>Cerrar sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="#">
                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li @click="menu=0">
                    <a href="chart.html">
                        <i class="fas fa-area-chart"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-archive"></i>Almacén</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li @click="menu=1">
                            <a href="#">Categorías</a>
                        </li>
                        <li @click="menu=2">
                            <a href="#">Articulos</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-shopping-cart"></i>Compras</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li @click="menu=3">
                            <a href="#">Ingresos</a>
                        </li>
                        <li @click="menu=4">
                            <a href="#">Proveedores</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-credit-card"></i>Ventas</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li @click="menu=5">
                            <a href="#">Ventas</a>
                        </li>
                        <li @click="menu=6">
                            <a href="#">Clientes</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-address-card"></i>Acceso</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li @click="menu=7">
                            <a href="#">Roles</a>
                        </li>
                        <li @click="menu=8">
                            <a href="#">Usuarios</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="sub-header-mobile-2 d-block d-lg-none">
    <div class="header__tool">
        <notification :notifications="notifications"></notification>
        <div class="account-wrap">
            <div class="account-item account-item--style2 clearfix js-item-menu">
                <div class="image">
                    <img src="images/icon/1.png" alt="John Doe" />
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#">{{Auth::user()->usuario}}</a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <img src="images/icon/1.png" alt="John Doe" />
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="name">
                                <a href="#">{{Auth::user()->usuario}}</a>
                            </h5>
                            <span class="email">{{Auth::user()->idrol}}</span>
                        </div>
                    </div>
                    <div class="account-dropdown__body">
                        <div class="account-dropdown__item">
                            <a href="#">
                                <i class="fa fa-user"></i>Perfil</a>
                        </div>
                    </div>
                    <div class="account-dropdown__footer">
                        <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault(); document.getElementById('logout').submit();">
                            <i class="zmdi zmdi-power"></i>Cerrar sesión</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER MOBILE -->