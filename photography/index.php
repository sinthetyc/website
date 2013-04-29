<!DOCTYPE html>
<html lang="en">
	<?php
		$dir = '../';
		$page_title = "Home | Pixel Monkey";
		//$add_css = array();
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $dir . 'inc/head.php';
	?>
	<body>
		<div id="container">
		<?php require $dir . 'inc/header.php'; ?>
		
		<div id="page" class="page left">
			<div class="col grid8 left">
				<h1>Photography</h1>
				<p>Web design, front-end development, print design and photography.  Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
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
		<?php require $dir . 'inc/footer.php'; ?>
		</div>
	</body>
</html>