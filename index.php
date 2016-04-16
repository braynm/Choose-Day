<?php 
	session_start();
	$baseUrl = "http://192.168.43.202:8081/";
	$res = file_get_contents($baseUrl . "pres/products");
	$res = json_decode($res);
	// echo "<pre>"; print_r($res);
	// die;
?>	
<!DOCTYPE html>
<html>
<head>
	<title>TV5 - HACKATON</title>
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
	        	<a class="navbar-brand" href="#">TV5 HACKATON</a>
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
	<div class="container main-container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-md-12">
				<div class="jumbotron">
					<h1>We are Choose-day!</h1>
					<p>Put the app tagline here!</p>
					<p><a class="btn btn-primary btn-lg" href="#" role="button">Share via Facebook</a></p>
				</div>
			</div>
		</div>
		<div class="row platform-container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<h3 class="text-right">Items</h3>
					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<p class="text-right">
						<span class="coins">10</span> Coins remaining
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-10">
					<div class="row">
						<?php foreach ($res as $k => $v) :?>
						<div class="col-lg-4 col-md-4 col-sm-4 platform-item">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="selected platform-item-selected" data-id="<?php echo $v->id; ?>">
										SELECTED
									</div>
									<div class="img-holder platform-item-cursor" data-id="<?php echo $v->id; ?>">
										<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=HACKSYON&w=350&h=150"/>
									</div>
								</div>
								<div class="panel-footer" data-toggle="tooltip" data-placement="top" title="<?php echo $v->description; ?>"><?php echo $v->name; ?></div>
							</div>
						</div>
						<?php endforeach; ?>

						<div class="col-lg-12">
							<form class="checkout-form">
								<button type="submit" class="btn btn-primary pull-right">Checkout</button>
							</form>
						</div>

						<div class="couriers-container row">
							<div class="col-lg-12">
								<h3 class="text-center">Couriers</h3>
							</div>
							<div class="courier-item col-lg-4 col-md-4 col-sm-4 platform-item">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="selected" data-id="">
											SELECTED
										</div>
										<div class="courier-img" data-id="">
											<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=HACKSYON&w=350&h=150"/>
										</div>
									</div>
									<div class="panel-footer" data-toggle="tooltip" data-placement="top" title="Description">Name</div>
								</div>
							</div>
							<div class="courier-item col-lg-4 col-md-4 col-sm-4 platform-item">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="selected" data-id="">
											SELECTED
										</div>
										<div class="courier-img" data-id="">
											<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=HACKSYON&w=350&h=150"/>
										</div>
									</div>
									<div class="panel-footer" data-toggle="tooltip" data-placement="top" title="Description">Name</div>
								</div>
							</div>
							<div class="courier-item col-lg-4 col-md-4 col-sm-4 platform-item">
								<div class="panel panel-default">
									<div class="panel-body">
										
										<div class="courier-img" data-id="" >
											<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=HACKSYON&w=350&h=150"/>
										</div>
									</div>
									<div class="panel-footer" data-toggle="tooltip" data-placement="top" title="Description">Name</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="row">
						<div class="col-lg-12 col-sm-12 col-md-12 feeds-container">
							Put feeds here
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