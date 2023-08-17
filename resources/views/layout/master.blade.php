<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$title}}</title>
	
    <!-- css -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('frontend/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/cubeportfolio/css/cubeportfolio.min.css')}}">
	<link href="{{asset('frontend/css/nivo-lightbox.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/nivo-lightbox-theme/default/default.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('frontend/css/owl.carousel.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('frontend/css/owl.theme.css')}}" rel="stylesheet" media="screen" />
	<link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="{{asset('frontend/bodybg/bg1.css')}}" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="{{asset('frontend/color/default.css')}}" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<div id="wrapper">
	
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area" style="background-color: #343957;">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left">Senin - Jum'at, 15.00 - 18.00 </p>
					</div>
					<div class="col-sm-6 col-md-6">
					<p class="bold text-right">0819-4756-5605</p>
					</div>
				</div>
			</div>
		</div>
        <div class="container navigation">
		
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('frontend/img/logo.png')}}" alt="" width="60" height="60" />
                </a>
                <a  class="navbar-brand" ><br>Drg. Uciria Halim</a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#intro">Home</a></li>
				<li><a href="#tentang">Tentang</a></li>
				<li><a href="#service">Layanan</a></li>
				<li><a href="#galeri">Galeri</a></li>
				@if(Session::get('login') == null)
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right"></span>Login <b class="caret"></b></a>
				  <ul class="dropdown-menu" style="width: 250px !important;">
				  	<form method="POST" action="/login">
				  		@csrf
					<li><label style="margin-left: 10%;">username</label>
						<input style="width: 200px;margin-left: 10%;" type="text" class="form-control" name="username">
					</li>
			
					<li><label style="margin-left: 10%;">password</label>
						<input style="width: 200px;margin-left: 10%;" type="password" class="form-control" name="password">
					</li>
					<hr>
					<li>
					
						<button style="width: 200px;margin-left: 10%;" type="submit" class="btn btn-info">Login</button>
					</li>
					</form>
				  </ul>
				</li>
				@else
				<li><a href="/dashboard">Dashboard</a></li>
				@endif
			  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
    @yield('konten')
	<footer >
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Informasi</h5>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Tentang</a></li>
							<li><a href="#">Layanan</a></li>
							<li><a href="#">Galeri</a></li>
							
						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						
						<ul>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Senin - Jum'at, 15.00 - 19.00 
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> 0819-4756-5605
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span> uciria.halim@gmail.com
							</li>

						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Lokasi</h5>
						<p>Jl Kamang No 2 Jati, Padang, Sumatera Barat, Indonesia</p>		
						
					</div>
					</div>
					
				</div>
			</div>	
		</div>
		<div class="sub-footer" style="background-color: #343957;">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInLeft" data-wow-delay="0.1s">
					<div class="text-left">
					<p style="color: white;">&copy;Copyright 2021 </p>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInRight" data-wow-delay="0.1s">
					<div class="text-right">
						<p></p>
					</div>
                
					</div>
				</div>
			</div>	
		</div>
		</div>
	</footer>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Core JavaScript Files -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>	 
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
	<script src="{{asset('frontend/js/wow.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollTo.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.appear.js')}}"></script>
	<script src="{{asset('frontend/js/stellar.js')}}"></script>
	<script src="{{asset('frontend/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js')}}"></script>
	<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('frontend/js/nivo-lightbox.min.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>


</body>

</html>
