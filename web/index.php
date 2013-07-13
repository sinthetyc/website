<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Web | Pixel Monkey";
		$page = 'web';
		
		//$add_css = array();
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $root . '/inc/head.php';
	?>
	<body>
		<div id="container">
		<?php require $root . '/inc/header.php'; ?>
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Web Design &amp; Development</h1>
					<p>Web design and development.  HTML5/CSS3. Standards compliant. Cross browser.</p>
				</div>
				<div class="col grid6 left clear">
					<h2>Web Design</h2>
					<a class="photolink" href="/web/design/">
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
		</div>
	</body>
</html>