<?php 

session_start();

function cclogin($apikey) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/auth/login/");
	curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "apikey=".$apikey);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_COOKIESESSION, true);
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');  //could be empty, but cause problems on some hosts
	curl_setopt($ch, CURLOPT_COOKIEFILE, '/var/www/ip4.x/file/tmp');  //could be empty, but cause problems on some hosts
	$answer = json_decode(curl_exec($ch));
	$_SESSION['csrf'] = $answer->csrftoken;
	$_SESSION['ch'] = $ch;
	$_SESSION['user'] = $answer->user;
	if (curl_error($ch)) {
	    echo curl_error($ch);
	}

}

function getApiKey(){
	$myfile = fopen("api-key.txt", "r") or die("Unable to open file!");
	return fread($myfile, filesize("api-key.txt"));
	fclose($myfile);
}

function  requestCC($url, $request_type ,$params=false, $ccapikey=false){

	if (!$ccapikey){
		$ccapikey = getApiKey();
	}

	if($request_type == "get"){
		$post_request = false;
		if ($params){
			$url = $url."?".http_build_query($params);
		}
	}elseif($request_type == "post"){
		$post_request = true;
	}

	if(!isset($_SESSION['ch']) || empty($_SESSION['cc'])) {
		cclogin($ccapikey);
	}
	$ch = $_SESSION['ch'];

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, $post_request);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    	'X-CSRFToken:'.$_SESSION['csrf'],
    ));
    if ($params & $request_type=="post"){
    	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params) );
	}
	$response = curl_exec($ch);
	if (curl_error($_SESSION['ch'])) {
	    echo curl_error($ch);
	}
	return $response;
}

?>
