<?php
include_once 'classes/gas.inc.php';
?>
<html lang="en">
<head>
<meta charset="utf-8">

<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	crossorigin="anonymous"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
	integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	crossorigin="anonymous"></script>

<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
	integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
	crossorigin="anonymous">
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
	integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
	crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script
	src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script
	src="https://www.highcharts.com/media/com_demo/js/highslide.config.js"
	charset="utf-8"></script>
<link rel="stylesheet" type="text/css"
	href="https://www.highcharts.com/media/com_demo/css/highslide.css" />


</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">Tobi's Verbrauch</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarCollapse" aria-controls="navbarCollapse"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
<!-- 					<li class="nav-item active"><a class="nav-link" href="index.php">Home -->
<!-- 							<span class="sr-only">(current)</span> -->
<!-- 					</a></li> -->
					<li class="nav-item"><a class="nav-link" href="index.php?gas&total">Nach Tagen</a>
					<li class="nav-item"><a class="nav-link" href="index.php?gas&jahr">Nach Jahren</a>
					</li>
					<!--           <li class="nav-item"> -->
					<!--             <a class="nav-link disabled" href="#">Disabled</a> -->
					<!--           </li> -->
				</ul>
				<!--         <form class="form-inline mt-2 mt-md-0"> -->
				<!--           <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text"> -->
				<!--           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
				<!--         </form> -->
			</div>
		</nav>
	</div>

	<div class="container">

		<div class="card">
			<div class="card-body">
			        <?php
			        if (isset ( $_GET ['gas'] ) && isset ( $_GET ['total'])) {
							statsGasverbrauchPerDate ();
						} 
					if (isset ( $_GET ['gas'] ) && isset ( $_GET ['jahr'])) {
							statsGasverbrauchPeryear ();
						} 
						
						
					if (!isset ( $_GET ['gas'] )){
					?>
						<div>
							<div class="card float-left" style="width: 20rem;">
<!--   								<img class="card-img-top" src="..." alt="Card image cap"> -->
  									<div class="card-body">
    									<h4 class="card-title">Tagesverbrauch</h4>
							    <p class="card-text">Gasverbrauch seit Start der Aufzeichnung</p>
							    <a href="index.php?gas&total" class="btn btn-primary">Start</a>
							  </div>
							</div>
							
							<div class="card float-left" style="width: 20rem;">
<!--   								<img class="card-img-top" src="..." alt="Card image cap"> -->
  									<div class="card-body">
    									<h4 class="card-title">Jahresverbrauch</h4>
							    <p class="card-text">Jahresvergleich seit Start der Aufzeichnung</p>
							    <a href="index.php?gas&jahr" class="btn btn-primary">Start</a>
							  </div>
							</div>
						</div>
							<?php 
						}

					?>
			</div>
		</div>



    </div>






</body>


<?php

?>

