<?php
$n = "\n";

echo '<head>
		<meta charset=utf-8>
		<title>' . (isset($page_title) ? $page_title : 'Pixel Monkey') . '</title>
		<link rel="shortcut icon" href="/images/favicon.ico">
';

/*	---------------------------------
	 STYLESHEET
	--------------------------------- */
	//Default CSS -- all pages.
	echo '		<link rel="stylesheet" href="/css/layout.css"/>' . $n;
	
	//Include additional page CSS if required.
	if(isset($add_css) && count($add_css) > 0){
		foreach($add_css as $c)
			echo '		<link rel="stylesheet" href="' . $c . '">' . $n;
	}


/*	---------------------------------
	 JAVASCRIPT
	--------------------------------- */
	//JQuery -- all pages.
	echo '		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>' . $n;
	echo '		<script src="/js/navigation.js"></script>' . $n;

	//Include additional page scripts if required.
	if(isset($add_script) && count($add_script) > 0){
		foreach($add_script as $s)
			echo '		<script src="' . $s . '"></script>' . $n;
	}

	
echo '
	</head>
';
?>