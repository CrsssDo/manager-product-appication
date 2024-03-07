
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body class="animsition">

<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="/app/home">Home</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                        <a href="/app/cart" class="zmdi zmdi-shopping-cart"></a>
                    </div>

                </div>
            </nav>
        </div>
    </div>


    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

    </div>
</div>


<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
            </div>
        </div>
    </div>
</div>


@yield('content')

@include('footer')

</body>
</html>
