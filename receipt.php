<?php 
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>TV5 - HACKATON</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>	
	<div class="container main-container">
		<div class="row receipt-container">
			<div class="receipt-inner-container col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-lg-4 col-md-4 col-sm-4">
				<h4 class="text-center candidate-name">CHOOSE DAY</h4>
				<p class="text-center">*Tagline*</p>
				<p class="text-center">No. (000-000-001) </p>
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12">
						<h4>Selections</h4>
						<ul>
							<li>Poverty Reduction</li>
							<li>Military</li>
							<li>Reviving death penalty</li>
							<li>Charter change</li>
						</ul>
					</div>
					<div class="col-lg-12 col-sm-12 col-md-12">
						<h4>Courier</h4>
						<p>Rodrigo Duterte</p>
					</div>

					<div class="col-lg-12 col-sm-12 col-md-12">
						<h4>Summary</h4>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<h5>Candidate Name</h5>
								<p>Rodrigo Duterte</p>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<h5>Main Advocacies</h5>
								<ul>
									<li>Fighting criminality, illegal drugs</li>
									<li>Addressing corruption</li>
									<li>Shifting to a federal system of government</li>
									<li>Reviving Death Penalty</li>
									<li>Charter Change</li>
								</ul>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<h5>Criticized for</h5>
								<ul>
									<li>his coarse and brusque language </li>
									<li>allegedly tolerating summary executions of criminals in Davao</li>
									<li>his infidelity and philandering </li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<h5 class="text-center">Campaign Trail</h5>
								<p class="text-center">To know more click <a href="#">here.</a></p>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<p><div id="fb-root"></div>
								<div class="fb-share-button" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-layout="button" data-mobile-iframe="true"></div>
								</p>
								<p class="text-center">This serves as your official receipt.</p>
								<p class="text-center">Thank you. Enjoy your day.</p>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>
<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=952737861488390";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


</body>
</html>