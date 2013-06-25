<?php
	/*

		Flickr API Lazy loader.


	*/

	$api_key = 'bd605093e82c4d07b92fab25a4d68e00';
	
	if(empty($photoset)){
		$photoset = isset($_GET['photoset']) ? $_GET['photoset'] : '72157634288121564';
	}
	if(empty($page)){
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
	}
	if(empty($per_page)){
		$per_page = isset($_GET['perpage']) ? $_GET['perpage'] : 10;
	}
	
	$params = array(
		'api_key' 		=> $api_key,
		'method'		=> 'flickr.photosets.getPhotos',
		'photoset_id'	=> $photoset,
		'per_page'		=> $per_page,
		'page'			=> $page,
		'format'		=> 'php_serial'
	);

	$encoded_params = array();
	foreach ($params as $k => $v){
		$encoded_params[] = urlencode($k).'='.urlencode($v);
	}

	$url = "http://api.flickr.com/services/rest/?".implode('&', $encoded_params);

	//$repsonse = ;
	
	$rsp = unserialize(curlit($url));

	if ($rsp['stat'] == 'ok') {

		$photos = $rsp["photoset"]["photo"];

		foreach($photos as $photo) {
			$farm = $photo['farm'];
			$server = $photo['server'];
			$photo_id = $photo['id'];
			$secret = $photo['secret'];
			$photo_title = $photo['title'];

			$thumb_src = 'http://farm'.$farm.'.static.flickr.com/'.$server.'/'.$photo_id.'_'.$secret.'_n.jpg';
			$image_src = 'http://farm'.$farm.'.static.flickr.com/'.$server.'/'.$photo_id.'_'.$secret.'_z.jpg';

			echo "\t\t\t\t" . '<div class="col grid3 left">' . "\n"
				. "\t\t\t\t\t" . '<a href="' . $image_src . '" class="lightbox"><img src="' . $thumb_src . '" alt="' . $photo_title . '" title="' . $photo_title . '" data-meta="this|that|the other"><span class="seemore zoom">Zoom</span></a>' . "\n"
				. "\t\t\t\t" . '</div>' . "\n";
		} 
	} else {
		//echo '<div class="col grid12 left"><p>Error getting photos</p></div>';
		echo('<!-- eof -->');
	}
	if(count($photos) < $per_page){
		echo('<!-- eof -->');
	}
	
	function curlit($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}
	
?>