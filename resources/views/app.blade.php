<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> iPlayAStory </title>

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/bootstrap-responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/pluton.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/jquery.cslider.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/jquery.bxslider.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/animate.css') }}" rel="stylesheet">


	<!-- Fonts -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a href="{{ url('/') }}"> <img src="{{ asset('images/logo3.png') }}" width="250" height="100" alt="Logo" /> </a>
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <i class="icon-menu"></i> </button>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li class="active"><a href="#home">Home</a></li>
                        <li><a href="#play">Play</a></li>

	                    @if (Auth::guest())
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@else
							<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
						@endif
                        <li><a href="#about">Help</a></li>
                    </ul>
                </div>
			</div>
		</div>
	</nav>

	@yield('content')

	<div class="footer">
        <p> &copy; iPlayAStory 2015 All Rights Reserved </p>
    </div>
    <div class="scrollup">
        <a href="#"> <i class="icon-up-open"></i> </a>
    </div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
