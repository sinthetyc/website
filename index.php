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
		
		<div id="page" class="page left">
			<div class="col grid8 left">
				<h1>Pixel Monkey</h1>
				<p>Web design, front-end development, print design and photography.  Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
			</div>
			<div id="test" class="col grid4 left clear">
				<h2>Web Design</h2>
				<a href="/web/"><img src="../images/web-design.jpg"></a>
				<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				<button data:href="/web/">See more</button>
			</div>
			<div id="test" class="col grid4 left">
				<h2>Print Design</h2>
				<a href="/print/"><img src="../images/print-design.jpg"></a>
				<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				<button data:href="/print/">See more</button>
			</div>
			<div id="test" class="col grid4 left">
				<h2>Photography</h2>
				<a href="/photography/"><img src="../images/photography.jpg"></a>
				<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				<button data:href="/photography/">See more</button>
			</div>
		</div>
		<?php require $dir . '/inc/header.php'; ?>
		<?php require $dir . '/inc/footer.php'; ?>
		</div>
	</body>
</html>