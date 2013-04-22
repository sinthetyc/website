<!DOCTYPE html>
<html lang="en">
	<?php
		//testing github :)
		
		$dir = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Photogrpahy - Wildlife | Pixel Monkey";
		//$add_css = array();
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $dir . './inc/head.php';
	?>
	<body>
		<div id="container">
		<?php require $dir . '/inc/header.php'; ?>
		
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Wildlife</h1>
					<p>All creatures gread and small.</p>
				</div>
<?php
	$first = true;
	if (($handle = fopen("photos.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			echo "\t\t\t\t" . '<div class="col grid3 left' . ($first ? ' clear' : '') . '">' . "\n"
			. "\t\t\t\t\t" . '<a href="' . $data[0] . '" class="lightbox photolink"><img src="' . $data[1] . '" alt="' . $data[2] . '"><span class="seemore zoom">Zoom</span></a>' . "\n"
			. "\t\t\t\t" . '</div>' . "\n";
			$first = false;
		}
		fclose($handle);
	}
?>
			</div>
		<?php require $dir . '/inc/footer.php'; ?>
		</div>
	</body>
</html>