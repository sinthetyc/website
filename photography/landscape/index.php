<!DOCTYPE html>
<html lang="en">
	<?php
		$dir = '../../';
		$page_title = "Photogrpahy - Wildlife | Pixel Monkey";
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $dir . 'inc/head.php';
		require $dir . 'inc/lazyloader.php';
	?>
	<body>
		<div id="container">
		<?php require $dir . 'inc/header.php'; ?>
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Landscape</h1>
					<p>Hills, trees and assorted things.</p>
				</div>
				<?php
					$start = 1;
					$end = 3;
					$file = $dir . 'photography/landscape/photos.csv';

					loadPhotos($start, $end, $file);
				?>
				<div id="load" class="col grid12 left">
					<a class="seemore more" href="javascript:void(0);">More</a>
				</div>
				<script>var photofile = '../photography/landscape/photos.csv', photoStart = 1, photoEnd = 3;</script>
				<style>#container {background-image:url(/images/landscapes.png);}</style>
			</div>
		<?php require $dir . 'inc/footer.php'; ?>
		</div>
	</body>
</html>