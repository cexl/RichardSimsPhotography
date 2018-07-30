<?php


?>


<div class="container mt-2 py-5">

	<div class="portfolio-header">

		<h1 class="display-4">Portfolio</h1>
		
		<p class="text-muted lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>

	</div>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light mr-15 ml-15 justify-content-end">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="#">Architecture</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Cityscape</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Landscape</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Portrait</a>
		  </li>
		</ul>
	  </div>
	</nav>
	
<?php

	echo '<div class="row text-center text-lg-center py-5">';
	$handle = opendir(dirname(realpath(__FILE__)).'/assets/portfolio');
	while($file = readdir($handle)){
		
		if($file !== '.' && $file !== '..') {
			
			echo '<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">';
			echo '<a href="./assets/portfolio/' . $file .'" class="d-block mb-4 h-100"><img class="img-fluid img-thumbnail" data-toggle="lightbox" src="./assets/thumbnails/' . $file .'" alt=""></a>';
			echo '</div>';
			
		}
	}
	
	?>
</div>

