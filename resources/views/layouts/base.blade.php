<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hisfa</title>

	<!-- Stylezz -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/5c067aaf87.js"></script>
	<link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">

	<!-- Fontzz -->
	<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,700|Lato:300,400,700" rel="stylesheet">

</head>
<body>
	<header>
		<nav class="top-nav">
			<div class="logo col-xs-12 col-sm-2">
				<a href="#!"><h3>Hisfa</h3></a>
			</div><!-- ./logo -->
			<div class="info col-xs-12 col-sm-10">
				<a href="#!"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
			</div><!-- ./info -->
		</nav><!-- ./top-nav -->
	</header>

	<div class="clearfix"></div>

	<div class="page">
		<div class="col-xs-12 col-sm-2 sidebar">
			<div class="user flexbox">
				<div class="user-pic">
					<img src="https://randomuser.me/api/portraits/men/64.jpg" alt="user profile">
				</div><!-- ./user-pic -->
				<div class="user-info">
					<b>Frederick Coleman</b>
					<span>Manager</span>
				</div><!-- ./user-info -->
			</div><!-- ./user -->

			<ul>
				<li>
					<a href="#!">
						Dashboard
						<i class="fa fa-bar-chart" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#!">
						Prime silo's
						<i class="fa fa-cubes" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#!">
						Waste silo's
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#!">
						Resources
						<i class="fa fa-recycle" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#!">
						Settings
						<i class="fa fa-cogs" aria-hidden="true"></i>
					</a>
				</li>
			</ul>
		</div><!-- ./sidebar -->
		<div class="col-xs-12 col-sm-10 col-sm-offset-2 content">
			<div class="container">
				@yield('content')
			</div><!-- ./container -->
		</div><!-- ./content -->
	</div><!-- ./content -->
</body>
</html>