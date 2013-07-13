<!DOCTYPE html>
<html lang="en">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		$page_title = "Contact | Pixel Monkey";
		//$add_css = array();
		$add_script = array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		require $root . '/inc/head.php';
	?>
	<body>
		<div id="container">
		<?php require $root . '/inc/header.php'; ?>
		
			<div id="page" class="page left">
				<div class="col grid8 left">
					<h1>Contact Pixel Monkey</h1>
					<p>Web design, front-end development, print design and photography.  Lorem ipsum dolor sit amet, elit saepe inimicus usu cu. Ad impetus nostrud duo, ne eius vitae percipit duo.</p>
				</div>
				<div class="col grid8 left">
					<h2>Contact</h2>
					<p>Contact form comming soon</p>
					<!--form id="contact">
						<label for="name">Name:</label><input id="name" type="text"/>
						<label for="email">Email:</label><input id="email" type="text" />
						<label for="comments">Questions:</label><textarea id="comments"></textarea>
					</form-->
				</div>
			</div>
		</div>
	</body>
</html>