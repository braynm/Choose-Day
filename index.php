<?php 
	$baseUrl = require_once __DIR__ . "/config.php";
	$res = file_get_contents($baseUrl . "pres/products");
	$res = json_decode($res);
?>	
<!DOCTYPE html>
<html>
<head>
	<title>SanDATA</title>
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>	
	
	<nav class="nav navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
	        	</button>
	        	<a class="navbar-brand" href="#">SanDATA</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="">
						<a href="">Home</a>
					</li>
					<li>
						<a href="">About</a>
					</li>
				</ul>
		</div>
	</nav>
	<div class="cover-vid">
		<div class="text-container">
			<h1>SanDATA</h1>
			<blockquote>
				<p>Arming Filipinos with the right information to make the best decision.</p>
			</blockquote>
		</div>
		<video loop muted autoplay poster="img/videoframe.jpg" class="fullscreen-bg__video">
	        <source src="images/343025947.mp4" type="video/mp4">
	    </video>
	</div>
	<div class="container main-container">
		<!-- <div class="row">
			<div class="col-lg-12 col-sm-12 col-md-12">
				<div class="jumbotron">
					<h1>We are Choose-day!</h1>
					<p>Put the app tagline here!</p>
					<p><a class="btn btn-primary btn-lg" href="#" role="button">Share via Facebook</a></p>
				</div>
			</div>
		</div> -->
		<div class="row platform-container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<h3 class="text-right weapon-title">Weapons for Change</h3>
					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<p class="text-right">
						<span class="coins">5</span> Coins remaining
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9">
					<div class="row">
						<?php foreach ($res as $k => $v) :?>
						<div class="col-lg-4 col-md-4 col-sm-4 platform-item">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="selected platform-item-selected" data-id="<?php echo $v->id; ?>">
										SELECTED
									</div>
									<div class="img-holder platform-item-cursor" data-id="<?php echo $v->id; ?>">
										<img src="images/hacksyon.png"/>
									</div>
								</div>
								<div class="panel-footer" data-toggle="tooltip" data-placement="top" title="<?php echo $v->description; ?>"><?php echo $v->name; ?></div>
							</div>
						</div>
						<?php endforeach; ?>

						<div class="col-lg-12 checkout-container">
								<p class="text-center small-note">Descriptions are based on the 2012 SWS Survey on the most important problem of the country today.</p>
							<form class="checkout-form text-center">
								<button type="submit" class="btn btn-primary">Checkout</button>
							</form>
						</div>	
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<div class="row">
						<div class="col-lg-12 col-sm-12 col-md-12 feeds-container">            <a class="twitter-timeline"  href="https://twitter.com/hashtag/BilangPilipino" data-widget-id="721345435634241537">#BilangPilipino Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


						</div>
					</div>
				</div>
			</div>

			
			
		</div>
	</div>
	<div class="couriers-main-container">
		<div class="container">
			<div class="couriers-container row">
				<div class="col-lg-12">
					<h3 class="text-center courier-title" >Couriers</h3>
				</div>
				<div class="courier-item col-lg-4 col-md-4 col-sm-4 platform-item">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="courier-name">Name</h3>
						</div>
						<div class="panel-body">
							
							<div class="courier-img" data-id="">
								<img src="images/hacksyon.png"/>
							</div>
						</div>
						<div class="panel-footer" >
							<div class="row">
								<div class="col-lg-6 text-left" data-toggle="tooltip" data-placement="top" title="Description">
									<h4 class="criticized-for">Criticized for</h4>
								</div>
								<div class="col-lg-6 text-right" data-toggle="tooltip" data-placement="top" title="Description">
									<h4 class="stand">Stand</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="courier-item col-lg-4 col-md-4 col-sm-4 platform-item">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="courier-name">Name</h3>
						</div>
						<div class="panel-body">
							
							<div class="courier-img" data-id="">
								<img src="images/hacksyon.png"/>
							</div>
						</div>
						<div class="panel-footer" >
							<div class="row">
								<div class="col-lg-6 text-left" data-toggle="tooltip" data-placement="top" title="Description">
									<h4 class="criticized-for">Criticized for</h4>
								</div>
								<div class="col-lg-6 text-right" data-toggle="tooltip" data-placement="top" title="Description">
									<h4 class="stand">Stand</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="courier-item col-lg-4 col-md-4 col-sm-4 platform-item">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="courier-name">Name</h3>
						</div>
						<div class="panel-body">
							
							<div class="courier-img" data-id="">
								<img src="images/hacksyon.png"/>
							</div>
						</div>
						<div class="panel-footer" >
							<div class="row">
								<div class="col-lg-6 text-left" data-toggle="tooltip" data-placement="top" title="Description">
									<h4 class="criticized-for">Criticized for</h4>
								</div>
								<div class="col-lg-6 text-right" data-toggle="tooltip" data-placement="top" title="Description">
									<h4 class="stand">Stand</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="up-container">
		<div class="up-btn"><span class="glyphicon glyphicon-menu-up"></span> UP</div>
	</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
	var apiUrl = "<?php echo $baseUrl; ?>"
</script>
<script src="js/script.js"></script>
 

</body>
</html>