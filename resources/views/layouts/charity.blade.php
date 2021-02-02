<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Charity Home || Charity and Donation HTML5 Template</title>

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- master stylesheet -->
	<link rel="stylesheet" href="{{url('css/style.css')}}">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="{{url('css/responsive.css')}}">



</head>
<body>

	<header class="header">
		<div class="container">
			<div class="logo pull-left">
				<a href="index.html">
					<img src="img/resources/logo.png" alt="Awesome Image"/>
				</a>
			</div>
			<div class="header-right-info pull-right clearfix">
				<div class="single-header-info">
					<div class="icon-box">
						<div class="inner-box">
							<i class="flaticon-interface-2"></i>
						</div>
					</div>
					<div class="content">
						<h3>EMAIL</h3>
						<p>companyname@mail.com</p>
					</div>
				</div>
				<div class="single-header-info">
					<div class="icon-box">
						<div class="inner-box">
							<i class="flaticon-telephone"></i>
						</div>
					</div>
					<div class="content">
						<h3>Call Now</h3>
						<p><b>(732) 803-010-03</b></p>
					</div>
				</div>
			</div>
		</div>
	</header> <!-- /.header -->

	<nav class="mainmenu-area stricky">
		<div class="container">
			<div class="navigation pull-left">
				<div class="nav-header">
					<ul>
						<li class="dropdown">
							<a href="#">Home</a>
							<ul class="submenu">
								<li><a href="index.html">Home One</a></li>
								<li><a href="index2.html">Home Two</a></li>
							</ul>
						</li>
						<li><a href="about.html">About</a></li>						
						<li class="dropdown">
							<a href="#">Events</a>
							<ul class="submenu">
								<li><a href="events-grid.html">Events Grid</a></li>
								<li><a href="events-list.html">Events List</a></li>
								<li><a href="events-single.html">Event Single</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#">Gallery</a>
							<ul class="submenu">
								<li><a href="gallery-style-one.html">Gallery Style One</a></li>
								<li><a href="gallery-style-two.html">Gallery Style Two</a></li>
								<li><a href="gallery-style-three.html">Gallery Style Three</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#">Blog</a>
							<ul class="submenu">
								<li><a href="blog-style-one.html">Blog Style One</a></li>
								<li><a href="blog-style-two.html">Blog Style Two</a></li>
								<li><a href="blog-details.html">Blog Details</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
						@if (Route::has('login'))
			                    @if (Auth::check())
			                        <li><a href="{{ url('/home') }}">Hello Admin</a></li>
			                    @else
			                        <li><a href="{{ url('/login') }}">Login</a></li>
			                    @endif
			            @endif
					</ul>
				</div>
				<div class="nav-footer">
					<button><i class="fa fa-bars"></i></button>
				</div>
			</div>
			<div class="search-box pull-right">
				<form action="#">
					<input type="text" placeholder="Search...">
				</form>
			</div>
		</div>
	</nav> <!-- /.mainmenu-area -->

	@yield('contact')

	@yield('slider')

	@yield('information1')

	@yield('promo')

	@yield('event')

	@yield('information2')

	@yield('gallery')

    @yield('news')


	<section class="p_40" data-bg-color="#eee">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="clients-carousel owl-carousel owl-theme">
						<div class="item">
							<div class="img-box">
								<img src="{{url('img/clients/logo-6.png')}}" alt="">
							</div>
						</div>
						<div class="item">
							<div class="img-box">
								<img src="{{url('img/clients/logo-7.png')}}" alt="">
							</div>
						</div>
						<div class="item">
							<div class="img-box">
								<img src="{{url('img/clients/logo-8.png')}}" alt="">
							</div>
						</div>
						<div class="item">
							<div class="img-box">
								<img src="{{url('img/clients/logo-9.png')}}" alt="">
							</div>
						</div>
						<div class="item">
							<div class="img-box">
								<img src="{{url('img/clients/logo-10.png')}}" alt="">
							</div>
						</div>
						<div class="item">
							<div class="img-box">
								<img src="{{url('img/clients/logo-7.png')}}" alt="">
							</div>
						</div>
						<div class="item">
							<div class="img-box">
								<img src="{{url('img/clients/logo-7.png')}}" alt="">
							</div>
						</div>
						<div class="item">
							<div class="img-box">
								<img src="{{url('img/clients/logo-10.png')}}" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<footer class="footer sec-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="footer-widget about-widget">
						<a href="#">
							<img src="img/resources/footer-logo.png" alt="Awesome Image"/>
						</a>
						<p>Lorem ipsum dolor sit amet, eu me evert laboramus, iudico </p>
						<ul class="contact">
							<li><i class="fa fa-map-marker"></i> <span>60 Grant Ave. Carteret NJ 0708</span></li>
							<li><i class="fa fa-phone"></i> <span>(880) 1723801729</span></li>
							<li><i class="fa fa-envelope-o"></i> <span>example@gmail.com</span></li>
						</ul>
						<ul class="social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="footer-widget quick-links">
						<h3 class="title">Pages</h3>
						<ul>
							<li><a href="">Gallery</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="events-grid.html">Events</a></li>
							<li><a href="blog-style-one.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 latest-post col-sm-6">
					<div class="footer-widget latest-post">
						<h3 class="title">Latest News</h3>
						<ul>
							<li>
								<span class="border"></span>
								<div class="content">
									<a href="blog-details.html">If you need a crown or lorem an implant you will pay it </a>
									<span>July 2, 2014</span>
								</div>
							</li>
							<li>
								<span class="border"></span>
								<div class="content">
									<a href="blog-details.html">If you need a crown or lorem an implant you will pay it </a>
									<span>July 2, 2014</span>
								</div>
							</li>
							<li>
								<span class="border"></span>
								<div class="content">
									<a href="blog-details.html">If you need a crown or lorem an implant you will pay it </a>
									<span>July 2, 2014</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="footer-widget contact-widget">
						<h3 class="title">Contact Form</h3>
						<form action="inc/sendemail.php" class="contact-form" id="footer-cf">
							<input type="text" name="name"  placeholder="Full Name">
							<input type="text" name="email" placeholder="Email Address" >
							<textarea name="message" placeholder="Your Message"></textarea>
							<button type="submit">Send</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<section class="footer-bottom">
		<div class="container text-center">
			<p>Theme Edited By <a href="http://facebook.com/zulham.achmad">Zulham Azwar Achmad</a> with love</p>
		</div>
	</section>


	<!-- main jQuery -->
	<script src="{{url('js/jquery-1.11.1.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{url('js/bootstrap.min.js')}}"></script>
	<!-- bx slider -->
	<script src="{{url('js/jquery.bxslider.min.js')}}"></script>
	<!-- appear js -->
	<script src="{{url('js/jquery.appear.js')}}"></script>
	<!-- circle progress -->
	<script src="{{url('js/circle-progress.js')}}"></script>
	<!-- owl carousel -->
	<script src="{{url('js/owl.carousel.min.js')}}"></script>
	<!-- validate -->
	<script src="{{url('js/jquery-parallax.js')}}"></script>
	<!-- validate -->
	<script src="{{url('js/validate.js')}}"></script>
	<!-- mixit up -->
	<script src="{{url('js/jquery.mixitup.min.js')}}"></script>
	<!-- fancybox -->
	<script src="{{url('js/jquery.fancybox.pack.js')}}"></script>
	<!-- easing -->
	<script src="{{url('js/jquery.easing.min.js')}}"></script>
	<!-- count to -->
	<script src="{{url('js/jquery.countTo.js')}}"></script>
	<!-- easyPieChart -->
	<script src="{{url('js/easypiechart.min.js')}}"></script
	<!-- gmap helper -->
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<!-- gmap main script -->
	<script src="{{url('js/gmap.js')}}"></script>

	<!-- isotope script -->
	<script src="{{url('js/isotope.pkgd.min.js')}}"></script>
	<!-- jQuery ui js -->
	<script src="{{url('js/jquery-ui-1.11.4/jquery-ui.js')}}"></script>
	
	<!-- revolution scripts -->

	<script src="{{url('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
	<script src="{{url('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
	<script type="text/javascript" src="{{url('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
	<script type="text/javascript" src="{{url('revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{url('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
	<script type="text/javascript" src="{{url('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
	<script type="text/javascript" src="{{url('revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
	<script type="text/javascript" src="{{url('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
	<script type="text/javascript" src="{{url('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
	<script type="text/javascript" src="{{url('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
	<script type="text/javascript" src="{{url('revolution/js/extensions/revolution.extension.video.min.js')}}"></script>


	<!-- thm custom script -->
	<script src="{{url('js/custom.js')}}"></script>


</body>
</html>