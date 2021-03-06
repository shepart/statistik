<?php
include_once 'classes/gas.inc.php';
?>
<html lang="en">
<head>
<meta charset="utf-8">

<title>Energieverbrauch</title>

<meta name="description" content="Energieverbrauch">
<meta name="author" content="Energieverbrauch">
<link rel="icon" href="../../favicon.ico">

<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.js/1.11.0/umd/popper.min.js"></script>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/highcharts.js"></script>
<script src="js//data.js"></script>
<script src="js/exporting.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="js/highslide-full.min.js"></script>
<script src="js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/highslide.css" />


</head>

<body>
	<div class="container">
		<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
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
					<li class="nav-item"><a class="nav-link" href="index.php?gas&total">Nach
							Tagen</a>
					
					<li class="nav-item"><a class="nav-link" href="index.php?gas&jahr">Nach
							Jahren</a></li>
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

	

		
			        <?php
											if (isset ( $_GET ['gas'] )) {
												
												?>
			<div class="container">
	        	
			        	<?php
												
												if (isset ( $_GET ['gas'] ) && isset ( $_GET ['total'] )) {
													?>
													<small>
												<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active">Tagesverbrauch</li>
		</ol>
		</small>

		<div class="card">
			<div class="card-body">		
												<?php
													statsGasverbrauchPerDate ();
												}
												if (isset ( $_GET ['gas'] ) && isset ( $_GET ['jahr'] )) {
													?>
													<small>
												<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active">Jahresverbrauch</li>
				</ol>
				</small>

				<div class="card">
					<div class="card-body">											
												<?php
													
													statsGasverbrauchPeryear ();
												}
												?>
			        </div>
				</div>
			</div>
			</div>
			</div>
			
			        <?php
											}
											
											if (! isset ( $_GET ['gas'] )) {
												?>
	<div class="container">
	<small>
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">Home</li>
				</ol>
</small>

				<div class="card">
			<div class="card-body">		

					<div class="card float-left" style="width: 20rem;">
						<!--   <img class="card-img-top" src="..." alt="Card image cap"> -->
						<div class="card-body">
							<h4 class="card-title">Tagesverbrauch</h4>
							<p class="card-text">Gasverbrauch seit Start der Aufzeichnung.</p>
							<a href="index.php?gas&total" class="btn btn-primary">Start</a>
						</div>
					</div>

					<div class="card float-left" style="width: 20rem;">
						<!--   <img class="card-img-top" src="..." alt="Card image cap"> -->
						<div class="card-body">
							<h4 class="card-title">Jahresverbrauch</h4>
							<p class="card-text">Vergleich des Gasverbrauchs über die Jahre.</p>
							<a href="index.php?gas&jahr" class="btn btn-primary">Start</a>
						</div>
					</div>

				</div>
				</div>
				</div>
				
					
							<?php
											}
											
											?>
	
			

			<div class="container">

				<footer class="footer">


					<a href="index.php?gas&total">Tagesverbrauch</a> | <a
						href="index.php?gas&jahr">Jahresverbrauch</a> <br> <span
						class="text-muted"><small>Copyright &copy; 2017<?php
						if (substr ( date ( "Y-m-d H:i:s", time () ), 0, 4 ) > 2017) {
							echo " - ";
							echo substr ( date ( "Y-m-d H:i:s", time () ), 0, 4 );
						}
						
						?> <a rel="nofollow" href="http://www.borchi.de"> Christian
								Borchmann-Backhaus</a></small></span>



				</footer>
			</div>

</body>


<?php

?>

