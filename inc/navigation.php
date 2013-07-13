<?php  /* NAVIGATION */
if(empty($page)){
	$page = '';
}
echo '
					<nav class="left border">
						<ul>
							<!-- li>
								<a href="/" class="current">Home</a>
							</li -->
							<li>
								<a href="/web/"' . ($page == 'web' ? ' class="current"' : '') . '>Web</a>
								<ul class="subnav">
									<li>
										<a href="/web/design"' . ($page == 'web/design' ? ' class="current"' : '') . '>Design</a>
									</li>
									<li>
										<a href="/web/laboratory"' . ($page == 'web/laboratory' ? ' class="current"' : '') . '>Laboratory</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="/print/"' . ($page == 'print' ? ' class="current"' : '') . '>Print</a>
								<ul class="subnav">
									<li>
										<a href="/print/corporate_id/"' . ($page == 'print/corporate_id' ? ' class="current"' : '') . '>Corporate ID</a>
									</li>
									<li>
										<a href="/print/t-shirt/"' . ($page == 'print/t-shirt' ? ' class="current"' : '') . '>T-Shirt</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="/photography/"' . ($page == 'photography' ? ' class="current"' : '') . '>Photo</a>
								<ul class="subnav">
									<li>
										<a href="/photography/landscape/"' . ($page == 'photography/landscape' ? ' class="current"' : '') . '>Landscape</a>
									</li>
									<li>
										<a href="/photography/wildlife/"' . ($page == 'photography/wildlife' ? ' class="current"' : '') . '>Wildlife</a>
									</li>
									<!-- li>
										<a href="/photography/wildlife/"' . ($page == 'photography/misc' ? ' class="current"' : '') . '>Miscellaneous</a>
									</li -->
								</ul>
							</li>
						</ul>
					</nav>';
?>