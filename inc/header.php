<?php
$dir = $_SERVER['DOCUMENT_ROOT'];

echo '
			<header id="pageHeader" class="fullGrid left">
				<a href="/"><img src="/images/PixelMonkey_Icon.png" width="80" height="80" class="left" alt="Pixel Monkey Logo" /></a>';
require $dir . './inc/navigation.php';
echo '				
			</header>
';
?>