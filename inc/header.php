<?php
echo '
			<section id="pageHeader">
				<header>
					<a id="logolink" href="/"><span class="home">Home</span><img id="logo" src="/images/PixelMonkey_Icon.png" width="80" height="80" class="left" alt="Pixel Monkey Logo" /></a>';
require 'navigation.php';
echo '				
				</header>
				<div class="indicator border">
					<span class="contenttype"> </span>
				</div>
				<footer id="pageFooter" class="border">
					<p class="iconset">	
						<a href="/contact" class="icon email" title="Contact Me">Contact Me</a>
						<a href="http://facebook.com/" class="icon facebook" title="Follow me on Facebook">Follow me on Facebook</a>
						<a href="http://plus.google.com/" class="icon google" title="Follow me on Google Plus">Follow me on Google+</a>
					</p>
					<p class="copyright small left border">&copy; ' . date('Y') . ' Tristan Brehaut</p>
				</footer>
			</section>		
';
?>