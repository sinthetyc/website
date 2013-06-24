<!DOCTYPE html>
<html lang="en">
	<?php
		$dir = '../../';
		$page_title = "Web Laboratory - Experiments | Pixel Monkey";
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		
		require $dir . 'inc/head.php';
		require $dir . 'inc/lazyloader.php';
	?>
	<body>
		<div id="container">
		<?php require $dir . 'inc/header.php'; ?>
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>The Laboratory</h1>
					<p>Things of an experimental nature. HTML5 technologies.</p>
				</div>
				<?php
					$start = 1;
					$end = 4;
					$file = $dir . 'web/laboratory/photos.csv';

					loadPhotos($start, $end, $file);
				?>
				<div id="load" class="col grid12 left">
					<a class="seemore more" href="javascript:void(0);">More</a>
				</div>
				<script>var photofile = '../web/laboratory/photos.csv', photoStart = 1, photoEnd = 3;</script>
			</div>
		<?php require $dir . 'inc/footer.php'; ?>
		</div>
	</body>
</html>