<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Photogrpahy - Wildlife | Pixel Monkey";
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $root . '/inc/head.php';
	?>
	<body>
		<div id="container">
		<?php require $root . '/inc/header.php'; ?>
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Miscellaneous</h1>
					<p>All the other stuff.</p>
				</div>
                <br class="clear" />
				<?php
					require $root . '/inc/lazyloader-flickr.php';
				?>
				<div id="load" class="col grid12 left">
					<a class="seemore more" href="javascript:void(0);">More</a>
				</div>
				<script>var flickr = true</script>
				<style>body {background-image:url(/images/landscapes.png);}</style>
			</div>
		<?php require $root . '/inc/footer.php'; ?>
		</div>
	</body>
</html>