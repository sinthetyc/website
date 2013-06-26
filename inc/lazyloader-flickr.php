<?php
	/*
		Flickr API Lazy loader.
	*/
	
	if(empty($photoset)){
		$photoset = isset($_GET['photoset']) ? $_GET['photoset'] : '72157634288121564';
	}
	if(empty($page)){
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
	}
	if(empty($per_page)){
		$per_page = isset($_GET['perpage']) ? $_GET['perpage'] : 12;
	}
	
	$params = array(
		'method'		=> 'flickr.photosets.getPhotos',
		'photoset_id'	=> $photoset,
		'per_page'		=> $per_page,
		'page'			=> $page,
	);

	if ($rsp = flickr($params)) {

		$photos = $rsp["photoset"]["photo"];

		foreach($photos as $photo) {
			$farm = $photo['farm'];
			$server = $photo['server'];
			$photo_id = $photo['id'];
			$secret = $photo['secret'];
			$photo_title = $photo['title'];

			$thumb_src = 'http://farm'.$farm.'.static.flickr.com/'.$server.'/'.$photo_id.'_'.$secret.'_q.jpg';
			$image_src = 'http://farm'.$farm.'.static.flickr.com/'.$server.'/'.$photo_id.'_'.$secret.'_z.jpg';


			// Get photo EXIF for metadata overlay.  api: flickr.photos.getExif
			$metadata = '';
			$metadata_short = '';
			$metadata_long = '';
			
			$params = array(
				'method'	=> 'flickr.photos.getExif',
				'photo_id'	=> $photo_id,
				'secret'	=> $secret
			);
			
			if($rsp = flickr($params)){
				// Build metadata string.
				// TODO: Short metadata and long metadata.
				$exif = pretifyEXIF($rsp['photo']['exif']);

				// Display format.
				$format = array(
					'Camera'		=> 'Model',
					'Exposure'		=> 'ExposureTime',
					'Aperture'		=> 'FNumber',
					'ISO Speed'		=> 'ISO',
					'White Balance'	=> 'LightSource',
					'Focal Length'	=> 'FocalLength',
					'Lens'			=> 'LensInfo'
				);
					
				foreach($format as $k => $v){
					if(isset($exif[$v]))
						$metadata .= '<p><span>' . $k . ':</span> '. $exif[$v] . '</p>';
				}

			} else {
				$metadata = 'EXIF not available.';
			}
			
			if($metadata == ''){
				$metadata = 'EXIF not available.';
			}
			
			
			// Build and return HTML.
			echo "\t\t\t\t" . '<div class="col grid2 left">' . "\n"
				. "\t\t\t\t\t" . '<a href="' . $image_src . '" class="lightbox"><img src="' . $thumb_src . '" alt="' . $photo_title . '" title="' . $photo_title . '" data-meta="' . $metadata . '"><span class="seemore zoom">Zoom</span></a>' . "\n"
				. "\t\t\t\t" . '</div>' . "\n";
				
		} 
	} else {
		echo('<!-- eof -->');
	}
	
	if(count($photos) < $per_page){
		echo('<!-- eof -->');
	}
	
	
	/*
		Flickr API calling function.
		$params - array of settings for API.
		
	*/
	
	function flickr($params, $timeout = 5){
		$api_key = 'bd605093e82c4d07b92fab25a4d68e00';
		
		// Default required values
		$params['api_key'] = $api_key;
		$params['format'] = 'php_serial';
		
		// URL Encode parameters
		$encoded_params = array();
		foreach ($params as $k => $v){
			$encoded_params[] = urlencode($k).'='.urlencode($v);
		}
		
		// Build API URL
		$url = "http://api.flickr.com/services/rest/?".implode('&', $encoded_params);
		
		// Get response from Flickr
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$response = curl_exec($ch);
		curl_close($ch);
		
		$response = unserialize($response);
		
		if($response['stat'] == 'ok'){
			return $response;
		} else {
			return false;
		}
	}


	/*
		Make the Photo EXIF easier to use.
	*/
	function pretifyEXIF($exif){
		$result = array();
		foreach($exif as $v){
			$result[$v['tag']] = isset($v['clean']) ? $v['clean']['_content'] : $v['raw']['_content'];
		}
		return $result;
	}
	
?>