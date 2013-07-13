<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Home | Pixel Monkey";
		//$add_css = array();
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $root . '/inc/head.php';
	?>
	<body>
		<div id="container">
		<?php require $root . '/inc/header.php'; ?>
		
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Pixel Monkey</h1>
					<p>Web design, front-end development, print design and photography.  Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				</div>
				<div class="col grid4 left clear">
					<h2>Web Design</h2>
					<a class="photolink" href="web/">
						<img src="/images/web-design.jpg">
						<span class="seemore next">See more</span>
					</a>
					<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				</div>
				<div class="col grid4 left">
					<h2>Print Design</h2>
					<a class="photolink" href="print/">
						<img src="/images/print-design.jpg">
						<span class="seemore next">See more</span>
					</a>
					<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				</div>
				<div class="col grid4 left">
					<h2>Photography</h2>
					<a class="photolink" href="photography/">
						<img src="/images/photography.jpg">
						<span class="seemore next">See more</span>
					</a>
					<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				</div>
			</div>
		
		</div>
	</body>
</html>