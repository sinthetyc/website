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
				<h1>Photography</h1>
				<p>Web design, front-end development, print design and photography.  Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
			</div>
			<div class="col grid4 left clear">
				<h2>Landscape</h2>
				<a href="/photography/landscape/"><img src="../images/photography-landscape.jpg"></a>
				<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				<button data:href="/photography/landscape/">See more &gt;&gt;</button>
			</div>
			<div class="col grid4 left">
				<h2>Wildlife</h2>
				<a href="/photography/wildlife/"><img src="../images/photography-wildlife.jpg"></a>
				<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				<button data:href="/photography/wildlife/">See more &gt;&gt;</button>
			</div>
			<div class="col grid4 left">
				<h2>Miscellaneous</h2>
				<a href="/photography/misc/"><img src="../images/photography-misc.jpg"></a>
				<p>Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				<button data:href="/photogrpahy/misc/">See more &gt;&gt;</button>
			</div>
		</div>
		<?php require $dir . '/inc/footer.php'; ?>
		</div>
	</body>
</html>