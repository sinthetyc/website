<?php
// Lazy loader.
if( isset($_GET['s']) && isset($_GET['e']) && isset($_GET['f']) ){
	$start = $_GET['s'];
	$end = $_GET['e'];
	$file = $_GET['f'];
	
	loadPhotos($start, $end, $file);
}
	
function loadPhotos($s, $e, $f){
	
	$row = 0;
	if (($handle = fopen($f, "r")) !== FALSE) {
		
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE  && $row <= $e) {
			$row += 1;
			
			if( $row < $s ) continue;
			
			echo "\t\t\t\t" . '<div class="col grid3 left' . ($row === $s ? ' clear' : '') . '">' . "\n"
			. "\t\t\t\t\t" . '<a href="' . $data[0] . '" class="lightbox"><img src="' . $data[1] . '" alt="' . $data[2] . '"><span class="seemore zoom">Zoom</span></a>' . "\n"
			. "\t\t\t\t" . '</div>' . "\n";
			
		}
		
		fclose($handle);
	}
}

?>