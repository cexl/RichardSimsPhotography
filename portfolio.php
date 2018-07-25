<?php


?>


<div class="container mt-2 py-5">

	<div class="portfolio-header">

		<h1 class="display-4">Portfolio</h1>
		
		<p class="text-muted lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>

	</div>
	
<?php

	echo '<div class="row text-center tex-tlg-left bg-light py-5">';
	$handle = opendir(dirname(realpath(__FILE__)).'/assets/portfolio');
	while($file = readdir($handle)){
		
		if($file !== '.' && $file !== '..') {
			
			echo '<div class="col-lg-3 col-md-4 col-xs-6">';
			echo '<a href="./assets/portfolio/' . $file .'" class="d-block mb-4 h-100"><img class="img-fluid img-thumbnail" data-toggle="lightbox" src="./assets/portfolio/' . $file .'" alt=""></a>';
			echo '</div>';
			
		}
	}
	
	?>
</div>

