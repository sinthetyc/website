<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Photogrpahy - Landscape | Pixel Monkey";
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $root . '/inc/head.php';
		require $root . '/inc/lazyloader.php';
	?>
	<body>
		<div id="container">
		<?php require $root . '/inc/header.php'; ?>
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Landscape</h1>
					<p>Hills, trees and assorted things.</p>
				</div>
				<?php
					$start = 1;
					$end = 4;
					$file = $root . '/photography/landscape/photos.csv';

					loadPhotos($start, $end, $file);
				?>
				<div id="load" class="col grid12 left">
					<a class="seemore more" href="javascript:void(0);">More</a>
				</div>
				<script>var photofile = '../photography/landscape/photos.csv', photoStart = 1, photoEnd = 4;</script>
				<style>body {background-image:url(/images/landscapes.png);}</style>
			</div>
		<?php require $root . '/inc/footer.php'; ?>
		</div>
	</body>
</html>