<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Photogrpahy - Landscape | Pixel Monkey";
		$page = 'photography/landscape';
		
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $root . '/inc/head.php';
	?>
	<body>
		<div id="container">
		<?php require $root . '/inc/header.php'; ?>
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Landscape</h1>
					<p>Hills, trees and assorted things.</p>
				</div>
				<div id="anchor" class="clear">
<?php 
//	$photoset = '72157634323445076';
//	include $root . '/inc/lazyloader-flickr.php';
?>
				</div>
				<script>var flickr = true, photoset = '72157634323445076'; flickrLazyLoad();</script>
				<style>body {background-image:url(/images/landscapes.png);}</style>
			</div>
		</div>
	</body>
</html>