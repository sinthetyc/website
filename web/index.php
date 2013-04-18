<!DOCTYPE html>
<html lang="en">
	<?php
		$dir = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Web | Pixel Monkey";
		//$add_css = array();
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $dir . '/inc/head.php';
	?>
	<body>
		<div id="container">
		
		<div id="page" class="page left">
			<div class="col grid8 left">
				<h1>Web Design &amp; Development</h1>
				<p>Web design and development.  HTML5/CSS3. Standards compliant. Cross browser.</p>
			</div>
			<div class="col grid6 left clear">
				<h2>Web Design</h2>
				<a href="/web/"><img src="../images/web-design.jpg"></a>
				<p>Photoshop / Illustrator -> HTML/CSS.  Templates.</p>
				<button data:href="/web/design/">See more</button>
			</div>
			<div class="col grid6 left">
				<h2>Laboratory</h2>
				<a href="/web/laboratory/"><img src="../images/web-design.jpg"></a>
				<p>Experiments with emerging technologies. HTML5 Canvas element animation and interface design.</p>
				<button data:href="/web/laboratory/">See more</button>
			</div>
		</div>
		<?php require $dir . '/inc/header.php'; ?>
		<?php require $dir . '/inc/footer.php'; ?>
		</div>
	</body>
</html>