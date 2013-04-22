<!DOCTYPE html>
<html lang="en">
	<?php
		$dir = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Home | Pixel Monkey";
		//$add_css = array();
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $dir . './inc/head.php';
	?>
	<body>
		<div id="container">
		<?php require $dir . '/inc/header.php'; ?>
		
		<div id="page" class="page left">
			<div class="col grid8 left">
				<h1>Print Design</h1>
				<p>Web design, front-end development, print design and photography.  Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
			</div>
			<div class="col grid6 left clear">
				<h2>Corporate ID</h2>
				<a class="photolink" href="/print/corporate-id/">
					<img src="../images/web-design.jpg">
					<span class="seemore next">See more</span>
				</a>
				<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
			</div>
			<div class="col grid6 left">
				<h2>T-Shirt Design</h2>
				<a class="photolink" href="/print/t-shirt/">
					<img src="../images/print-design.jpg">
					<span class="seemore next">See more</span>
				</a>
				<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
			</div>
		</div>
		<?php require $dir . '/inc/footer.php'; ?>
		</div>
	</body>
</html>