<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Photogrpahy - Miscellaneous | Pixel Monkey";
		$page = 'photography/misc';
		
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
				<div id="anchor" class="clear">
<?php
//	$photoset = '72157634288121564';
//	include $root . '/inc/lazyloader-flickr.php';
?>
				</div>
				<script>var flickr = true, photoset = '72157634288121564'; flickrLazyLoad();</script>
				<style>body {background-image:url(/images/landscapes.png);}</style>
			</div>
		</div>
	</body>
</html>