<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Web Laboratory - Experiments | Pixel Monkey";
		$page = 'web/laboratory';
		
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		
		require $root . '/inc/head.php';
		require $root . '/inc/lazyloader.php';
	?>
	<body>
		<div id="container">
		<?php require $root . '/inc/header.php'; ?>
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>The Laboratory</h1>
					<p>Things of an experimental nature. HTML5 technologies.</p>
				</div>
				<?php
					$start = 1;
					$end = 4;
					$file = $root . '/web/laboratory/photos.csv';

					loadPhotos($start, $end, $file);
				?>
				<script>var photofile = '../web/laboratory/photos.csv', photoStart = 1, photoEnd = 3;</script>
			</div>
		</div>
	</body>
</html>