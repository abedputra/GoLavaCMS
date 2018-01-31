@extends('layouts.frontend')

@section('title', 'Default Theme')
@section('titleseo', 'Default Theme')
@section('descseo', 'This is a default theme.')
@section('keywordseo', 'default, theme, cms, default theme')

@section('content')

<p><a id="about" name="about"></a></p>
<div class="intro-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="intro-message">
					<h1>Landing Page</h1>
					<h3>A Template by Start Bootstrap</h3>
					<hr class="intro-divider">
					<ul class="list-inline intro-social-buttons">
						<li>
							<a class="btn btn-default btn-lg" href="https://twitter.com/SBootstrap"><span class=
							"network-name">Twitter</span></a>
						</li>
						<li>
							<a class="btn btn-default btn-lg" href=
							"https://github.com/IronSummitMedia/startbootstrap"><span class=
							"network-name">Github</span></a>
						</li>
						<li>
							<a class="btn btn-default btn-lg" href="#"><span class="network-name">Linkedin</span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div><!-- /.container -->
</div><!-- /.intro-header -->
<p><a id="services" name="services"></a></p>
<div class="content-section-a">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-sm-6">
				<hr class="section-heading-spacer">
				<div class="clearfix">
					&nbsp;
				</div>
				<h2 class="section-heading">Death to the Stock Photo:<br>
				Special Thanks</h2>
				<p class="lead">A special thanks to <a href="http://join.deathtothestockphoto.com/" rel=
				"noopener" target="_blank">Death to the Stock Photo</a> for providing the photographs that you
				see in this template. Visit their website to become a member.</p>
			</div>
			<div class="col-lg-5 col-lg-offset-2 col-sm-6"><img alt="" class="img-responsive" src=
			"public/img/ipad.png"></div>
		</div>
	</div><!-- /.container -->
</div><!-- /.content-section-a -->
<div class="content-section-b">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-lg-offset-1 col-sm-push-6 col-sm-6">
				<hr class="section-heading-spacer">
				<div class="clearfix">
					&nbsp;
				</div>
				<h2 class="section-heading">3D Device Mockups<br>
				by PSDCovers</h2>
				<p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free
				Photoshop actions by <a href="http://www.psdcovers.com/" rel="noopener" target=
				"_blank">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop
				actions!</p>
			</div>
			<div class="col-lg-5 col-sm-pull-6 col-sm-6"><img alt="" class="img-responsive" src=
			"public/img/dog.png"></div>
		</div>
	</div><!-- /.container -->
</div><!-- /.content-section-b -->
<div class="content-section-a">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-sm-6">
				<hr class="section-heading-spacer">
				<div class="clearfix">
					&nbsp;
				</div>
				<h2 class="section-heading">Google Web Fonts and<br>
				Font Awesome Icons</h2>
				<p class="lead">This template features the 'Lato' font, part of the <a href=
				"http://www.google.com/fonts" rel="noopener" target="_blank">Google Web Font library</a>, as
				well as <a href="http://fontawesome.io" rel="noopener" target="_blank">icons from Font
				Awesome</a>.</p>
			</div>
			<div class="col-lg-5 col-lg-offset-2 col-sm-6"><img alt="" class="img-responsive" src=
			"public/img/phones.png"></div>
		</div>
	</div><!-- /.container -->
</div><!-- /.content-section-a -->
<p><a id="contact" name="contact"></a></p>
<div class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h2>Connect to Start Bootstrap:</h2>
			</div>
			<div class="col-lg-6">
				<ul class="list-inline banner-social-buttons">
					<li>
						<a class="btn btn-default btn-lg" href="https://twitter.com/SBootstrap"><span class=
						"network-name">Twitter</span></a>
					</li>
					<li>
						<a class="btn btn-default btn-lg" href=
						"https://github.com/IronSummitMedia/startbootstrap"><span class=
						"network-name">Github</span></a>
					</li>
					<li>
						<a class="btn btn-default btn-lg" href="#"><span class="network-name">Linkedin</span></a>
					</li>
				</ul>
			</div>
		</div>
	</div><!-- /.container -->
</div><!-- /.banner -->
@endsection
