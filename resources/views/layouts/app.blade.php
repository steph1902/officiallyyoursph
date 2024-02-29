<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home 03</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('cozastore-master/images/icons/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/vendor/MagnificPopup/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cozastore-master/css/main.css') }}">

	<link rel="stylesheet" href="text/css" href="{{asset('customfonts/customfontsize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('customfonts/fontstylesheet.css')}}">

	<style>
		.hermione-font {
			font-family: 'Hermione FREE' !important;
			font-weight: normal !important;
			font-style: normal !important;
		}
		.futura-lt-bt {
			font-family: 'Futura Lt BT' !important;
			font-weight: 300 !important;
			font-style: normal !important;
		}
		/* Futura Bold Condensed BT */
		.futura-bd {
			font-family: 'Futura BdCn BT' !important;
			font-weight: bold !important;
			font-style: normal !important;
		}

		a
		{
			font-family: 'Futura Lt BT' !important;
		}
		p
		{
			font-family: 'Futura Lt BT' !important;
		}

		/*  */

		.menu-desktop {
			display: flex !important;
			align-items: center !important; /* Posisikan secara vertikal di tengah */
			justify-content: center !important; /* Posisikan secara horizontal di tengah */
			height: 100% !important; /* Sesuaikan dengan kebutuhan Anda */
		}

		.main-menu {
			list-style: none !important;
			padding: 0 !important;
			margin: 0 !important;
		}

		.main-menu li {
			margin-right: 20px !important; /* Atur jarak antar item menu */
		}

		/* Atur tampilan label "hot" */
		.label1::after {
			content: attr(data-label1) !important;
			background-color: red !important;
			color: white !important;
			padding: 2px 5px !important;
			border-radius: 3px !important;
		}

		.navbar {
		/* background-color: transparent !important; Ganti warna latar belakang menjadi transparan */
			background-color: rgba(0, 0, 0, 0.5) !important; 
		/* Warna hitam dengan 50% transparansi */

		}

		.navbar-nav {
		display: flex !important;
		align-items: center !important; /* Vertically align items */
		}

		.nav-item {
		margin-right: 20px !important;
		}

		/* Hot label styling */
		.label1::after {
		content: attr(data-label1) !important;
		background-color: red !important;
		color: white !important;
		padding: 2px 5px !important;
		border-radius: 3px !important;
		}

		/*  */

		.header-v3 .fix-menu-desktop .wrap-menu-desktop 
		{
			/* background-color: transparent !important; */
			background-color: rgba(0, 0, 0, 0.3) !important; 
		}

		.header-v3 .fix-menu-desktop .wrap-menu-desktop 
		{
			border-color: white !important;
		}

		/*  */
		.header-v3 .main-menu > li > a
		{
			color: white !important;
		}



	</style>


</head>


@php
    $carts = Cart::content();
    $totalWeight = Cart::weight();
    $subTotal = Cart::subtotal();
    $totalPrice = Cart::total();
    $cartCount = Cart::count();
@endphp


{{-- sini --}}

<body class="animsition">
	
	<!-- Header -->
	<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03 fix-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45 navbar-light bg-transparent">
					
					<!-- Logo desktop -->		
					<a href="{{url('/')}}" class="logo">
						<img src="{{asset('logo/logo-putih.png')}}" alt="IMG-LOGO">
					</a>


					{{-- NEW IN
BEST SELLER
CATEGORIES
COLLECTIONS
SALE --}}

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="{{url('coming-soon')}}">NEW IN</a>
								{{-- <ul class="sub-menu">
									<li><a href="index.html">Homepage 1</a></li>
									<li><a href="home-02.html">Homepage 2</a></li>
									<li><a href="home-03.html">Homepage 3</a></li>
								</ul> --}}
							</li>

							<li>
								<a href="{{url('coming-soon')}}">BEST SELLER</a>
							</li>

							<li>
								<a href="{{url('coming-soon')}}">CATEGORIES</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="{{route('collection-view')}}">COLLECTIONS</a>
								{{-- <a class="collapse-item" href="{{route('shops.create')}}">Buat Data Toko Baru</a> --}}
							</li>

							<li>
								<a href="{{url('coming-soon')}}">SALE</a>
							</li>

							{{-- <li>
								<a href="contact.html">Contact</a>
							</li> --}}
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">							
						<div class="flex-c-m h-full p-r-25 bor6">
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{$cartCount}}">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>
							
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				{{-- #todo --}}
				<a href="{{url('/')}}"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{$cartCount}}">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<button class="flex-c-m btn-hide-modal-search trans-04">
				<i class="zmdi zmdi-close"></i>
			</button>

			<form class="container-search-header">
				<div class="wrap-search-header">
					<input class="plh0" type="text" name="search" placeholder="Search...">

					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
				</div>
			</form>
		</div>
	</header>


	<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="index.html" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							My Wishlist
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							My Account
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Track Oder
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Refunds
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Help & FAQs
						</a>
					</li>
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						{{-- @ CozaStore --}}
					</span>

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-01.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-02.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-03.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-03.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-04.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-04.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-05.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-05.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-06.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-06.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-07.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-07.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-08.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-08.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-09.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-09.jpg');"></a>
						</div>
					</div>
				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						About Us
					</span>

					<p class="stext-108 cl6 p-t-27">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit. Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem fermentum quis. 
					</p>
				</div>
			</div>
		</div>
	</aside>


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
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">

					@foreach ($carts as $c)
						
					
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							{{-- <img src="images/item-cart-01.jpg" alt="IMG"> --}}
							<img src=" {{asset('photos/'.$c->options->image_path)}} " class="img-fluid img-responsive"/>
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{-- White Shirt Pleat --}}
								{{-- {{$c->name}} --}}
								<p>{{$c->name}}</p>
								<small>{{$c->options->size}}</small>
								<br>
								<small>{{$c->options->color}}</small>
							</a>

							<span class="header-cart-item-info">
								₱ {{number_format($c->price,0)}}
							</span>
						</div>
					</li>

					@endforeach

					{{-- <li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li> --}}

					{{-- <li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li> --}}
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						<p>Total: ₱ {{$subTotal}}</p>
						<p>{{$cartCount}} item(s)</p>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="{{url('shopping-cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						{{-- <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a> --}}
					</div>
				</div>
			</div>
		</div>
	</div>


    {{-- sini --}}



@yield('content')


	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						DEALS
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								{{-- Our Store --}}
							</a>
						</li>

						<li class="p-b-10">
							<a href="{{url('coming-soon')}}" class="stext-107 cl7 hov-cl1 trans-04">
								Promotions
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								{{-- Confirm Payment --}}
							</a>
						</li>

						{{-- <li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li> --}}
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						SHIPPING AND RETURNS
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="{{url('shipping-and-delivery')}}" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping and Delivery
							</a>
						</li>

						<li class="p-b-10">
							<a href="{{url('coming-soon')}}" class="stext-107 cl7 hov-cl1 trans-04">
								Returns and Exchange Policy
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								{{-- Shipping --}}
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								{{-- FAQs --}}
							</a>
						</li>
					</ul>
				</div>

                {{--  --}}

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						COMPANY
					</h4>

					{{-- <p class="stext-107 cl7 size-201">
						
					</p> --}}

                    <ul>
						<li class="p-b-10">
							<a href="{{url('about-us')}}" class="stext-107 cl7 hov-cl1 trans-04">
								About Us
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								{{-- Partnership --}}
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								{{-- Careers --}}
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								{{-- FAQs --}}
							</a>
						</li>
					</ul>


                    {{-- <h4 class="stext-301 cl0 p-b-10">
						GET SOCIAL
					</h4>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div> --}}
				</div>
                {{--  --}}

                {{--  --}}


				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						CUSTOMER SERVICES
					</h4>

					{{-- <p class="stext-107 cl7 size-201">
						
					</p> --}}

                    <ul>
						<li class="p-b-10">
							<a href="{{url('coming-soon')}}" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>

						<li class="p-b-10">
							<a href="{{url('contact-us')}}" class="stext-107 cl7 hov-cl1 trans-04">
								Contact us
							</a>
						</li>

						{{-- <li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Careers
							</a>
						</li> --}}

						{{-- <li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li> --}}
					</ul>



					{{-- <div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div> --}}
				</div>

                {{--  --}}

				{{-- <div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div> --}}
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="{{asset('cozastore-master/images/icons/icon-pay-01.png')}}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{asset('cozastore-master/images/icons/icon-pay-02.png')}}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{asset('cozastore-master/images/icons/icon-pay-03.png')}}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{asset('cozastore-master/images/icons/icon-pay-04.png')}}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{asset('cozastore-master/images/icons/icon-pay-05.png')}}" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
All rights reserved 
{{-- | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> 
by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; 
distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a> --}}
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>



<script src="{{ asset('cozastore-master/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('cozastore-master/vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('cozastore-master/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('cozastore-master/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('cozastore-master/vendor/select2/select2.min.js') }}"></script>

	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>

<script src="{{ asset('cozastore-master/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('cozastore-master/vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('cozastore-master/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('cozastore-master/js/slick-custom.js') }}"></script>
<script src="{{ asset('cozastore-master/vendor/parallax100/parallax100.js') }}"></script>

	<script>
        $('.parallax100').parallax100();
	</script>

    <script src="{{ asset('cozastore-master/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>

    <script src="{{ asset('cozastore-master/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('cozastore-master/vendor/sweetalert/sweetalert.min.js') }}"></script>

	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>

    <script src="{{ asset('cozastore-master/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>

    <script src="{{ asset('cozastore-master/js/main.js') }}"></script>
