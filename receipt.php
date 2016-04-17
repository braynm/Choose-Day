<?php 
	$baseUrl = require_once __DIR__ . "/config.php";
	$res = file_get_contents($baseUrl . "pres/receipt/" . $_GET['id']);
	$res = json_decode($res);

	// map president name to designated image
	$presImgs = [
		'Jejomar Binay' => 'b.png',
		'Rudy Duterte' => 'd.png',
		'Grace Poe' => 'p.png',
		'Mar Roxas' => 'r.png',
		'Miriam Santiago' => 's.png',
	];

	// explode string into array
	$campaignTrails = explode("|", $res->municipalVisitedPrcnt);
	$criticismArr = explode("|", $res->criticism);	
	
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
				<p class="text-center">No. (000-000-00<?php echo $_GET['id']; ?>) </p>
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12">
						<h4>Selections</h4>
						<ul>
							<?php foreach($res->choosenAdvocacy as $k => $v) : ?>
							<li><?php echo $v->name ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="col-lg-12 col-sm-12 col-md-12">
						<h4>Courier</h4>
						<p><?php echo $res->courier ?></p>
					</div>

					<div class="col-lg-12 col-sm-12 col-md-12">
						<h4>Summary</h4>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<h5>Candidate Name</h5>
								<p><?php echo $res->presName ?></p>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<h5>Main Advocacies</h5>
								<ul>
									<?php foreach($res->mainAdvocacy as $k => $v) : ?>
									<li><?php echo $v->name ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<h5>Criticized for</h5>
								<ul>
									<?php foreach($criticismArr as $k => $v) : ?>
										<?php if ($k < (count($criticismArr)-1)) :?>
											<li><?php echo $v ?></li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<h5 class="text-center">Campaign Trail</h5>
								<p class="text-center"><?php echo $campaignTrails[1]; ?> out of 1634 municipalities or <?php echo $campaignTrails[0]; ?> has already been visited by <?php echo $res->presName; ?></p>
								<p class="text-center">To know more click <a href="#">here.</a></p>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<p><div id="fb-root"></div>
								<div class="fb-share-button" data-href="<?php echo 'http://' . $_SERVER['REQUEST_URI']; ?>" data-layout="button" data-mobile-iframe="true"></div>
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

	<div class="modal fade" id="receipt-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Results</h4>
			</div>
			<div class="modal-body">
				<div class="row">
						<div class="img-container thumbnail" style="width: 31%; margin: 0 auto;">
							 <img src="<?php echo 'images/' . $presImgs[$res->presName]; ?>"/>
						</div>
					<div class="col-lg-12 col-sm-12 col-md-12">
						<div class="form-group text-center">
							<h3 style="font-size:44px;" ><?php echo round($res->percent, 2)?>%</h3>
							<p>of the users has spawned.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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