<!DOCTYPE HTML>
<html>
<head>
	<title>Family Car auction</title>
	<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="header">
		<div class="wrap"> 
			<div class="header-bot">
				<div class="logo">
					<a href="index.html"><img src="{{asset('img/logo.png') }}" alt=""></a>
				</div>
				<div class="cart">
					<ul class="ph-no">
						<li class="item  first_item">
							<div class="item_html">
								<span class="text1">Order delivery:</span>
								<span class="text2">+800-0005-5289</span>
							</div>
						</li>
					</ul>
					<div id="top-search">
						<form method="get" action="">
							<input type="text" name="s" class="input-search"><input type="submit" value="Search" id="submit">
						</form>
					</div>
					<div class="menu-main">
						<ul class="dc_css3_menu">
							<li ><a href="{{ url('frontend') }}">Home</a></li>
							<li><a href="{{ url('frontend/about') }}">About</a></li>
							<li><a href="{{ url('frontend/services') }}">Services</a></li>
							<li><a href="{{ url('frontend/contact') }}">Contact</a></li>
							 @if (Auth::check())
							 <li><a href="{{url('frontend/logout')}}">Logout {{Auth::user()->name}}</a></li>
							 @else
							 <li><a href="{{url('frontend/login')}}">Login</a></li>
							 @endif
							 
							
						</ul>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="clear"></div> 
			</div>
		</div>	
	</div>