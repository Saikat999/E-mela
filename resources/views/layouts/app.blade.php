<!DOCTYPE html>
<html lang="en">
<head>
<title>E-mela</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="{{asset('../frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('../frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('../frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('../frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('../frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('../frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('../frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('../frontend/styles/responsive.css')}}">

{{-- Toastr CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<link rel="stylesheet" href="sweetalert2.min.css">

 {{-- <script src="https://js.stripe.com/v3/"></script> --}}
 <script src="https://js.stripe.com/v3/"></script>

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('../frontend/images/phone.png')}}" alt=""></div>+88 02 567 94</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('../frontend/images/mail.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">e.mela@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">English<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Bangla</a></li>
											
										</ul>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
                               @guest
                                <div><a href="{{route('login')}}"><div class="user_icon"><img src="{{asset('../frontend/images/user.svg')}}" alt=""></div> Register | Login</a></div>
							   @else	

							   <ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="{{route('home')}}"><div class="user_icon"><img src="{{asset('../frontend/images/user.svg')}}" alt=""></div> Profile<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="{{route('user.wishlist')}}">Wishlist</a></li>
											<li><a href="{{route('user.checkout')}}">Checkout</a></li>
											<li><a href="#">Others</a></li>
										</ul>
									</li>
									
								</ul>

							   @endguest

							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{url('/')}}"><img src="{{asset('../frontend/images/large (1).png')}}" alt=""></a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
												@php
													$category = DB::table('categories')->get();
												@endphp
												@foreach ($category as $row)
													<li><a class="clc" href="#">{{$row->category_name}}</a></li>
												@endforeach
													
			
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('../frontend/images/search.png')}}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">

								@guest
							    @else
								@php
									$wishlist =DB::table('wishlists')->where('user_id',Auth::id())->get();
								@endphp
								<div class="wishlist_icon"><img src="{{asset('../frontend/images/heart.png')}}" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="{{route('user.wishlist')}}">Wishlist</a></div>
									<div class="wishlist_count">{{count($wishlist)}}</div>
								</div>
								@endguest
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{asset('../frontend/images/cart.png')}}" alt="">
										<div class="cart_count"><span>{{Cart::count()}}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{route('show.cart')}}">Cart</a></div>
										<div class="cart_price">Tk-{{ Cart::subtotal()}}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->


	<!-- Characteristics -->

   @yield('content')

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">E-mela</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+88 02 567 94</div>
						<div class="footer_contact_text">
							<p>Bashundhara main road, Vatara</p>
							<p>Dhaka, Bangladesh</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 &copy; E-mela <script>document.write(new Date().getFullYear());</script> All rights reserved.

</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="{{asset('../frontend/images/logos_1.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('../frontend/images/logos_2.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('../frontend/images/logos_3.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('../frontend/images/logos_4.png')}}" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{asset('../frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('../frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('../frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('../frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('../frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('../frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('../frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('../frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('../frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('../frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('../frontend/plugins/easing/easing.js')}}"></script>
<script src="{{asset('../frontend/js/custom.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{asset('../frontend/js/product_custom.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>  


</body>

</html>