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
		<?php require $dir . '/inc/header.php'; ?>
		<div id="page" class="page left">
			<div class="col grid8 left">
				<h1>Web Design &amp; Development</h1>
				<p>Web design and development.  HTML5/CSS3. Standards compliant. Cross browser.</p>
			</div>
			<div class="col grid6 left clear">
				<h2>Web Design</h2>
				<a class="photolink" href="/web/">
					<img src="/images/web-design.jpg">
					<span class="seemore next">See more</span>
				</a>
				<p>Photoshop / Illustrator -> HTML/CSS.  Templates.</p>
			</div>
			<div class="col grid6 left">
				<h2>Laboratory</h2>
				<a class="photolink" href="/web/laboratory/">
					<img src="/images/web-laboratory.jpg">
					<span class="seemore next">See more</span>
				</a>
				<p>Experiments with emerging technologies. HTML5 Canvas element animation and interface design.</p>
			</div>
		</div>
		<?php require $dir . '/inc/footer.php'; ?>
		</div>
	</body>
</html>