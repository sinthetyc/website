<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Photography | Pixel Monkey";
		$page = 'photography';
		
		//$add_css = array();
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $root . '/inc/head.php';
	?>
	<body>
		<div id="container">
		<?php require $root . '/inc/header.php'; ?>
		
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Photography</h1>
					<p>Things of a photographic nature.</p>
				</div>
				<div class="col grid4 left clear">
					<h2>Landscape</h2>
					<a class="photolink" href="/photography/landscape/">
						<img src="/images/photography-landscape.jpg">
						<span class="seemore next">See more</span>
					</a>
					<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				</div>
				<div class="col grid4 left">
					<h2>Wildlife</h2>
					<a class="photolink" href="/photography/wildlife/">
						<img src="/images/photography-wildlife.jpg">
						<span class="seemore next">See more</span>
					</a>
					<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				</div>
				<div class="col grid4 left">
					<h2>Miscellaneous</h2>
					<a class="photolink" href="/photography/misc/">
						<img src="/images/photography-misc.jpg">
						<span class="seemore next">See more</span>
					</a>
					<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				</div>
			</div>
		</div>
	</body>
</html>