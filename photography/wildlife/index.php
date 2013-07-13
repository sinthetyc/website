<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Photogrpahy - Wildlife | Pixel Monkey";
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		
		require $root . '/inc/head.php';
		require $root . '/inc/lazyloader.php';
	?>
	<body>
		<div id="container">
		<?php require $root . '/inc/header.php'; ?>
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Wildlife</h1>
					<p>All creatures great and small.</p>
				</div>
				<?php
					$start = 1;
					$end = 4;
					$file = $root . '/photography/wildlife/photos.csv';

					loadPhotos($start, $end, $file);
				?>
				<script>var photofile = '../photography/wildlife/photos.csv', photoStart = 1, photoEnd = 3, flickr = false;</script>
			</div>
		</div>
	</body>
</html>