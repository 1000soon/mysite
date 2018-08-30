<?php
//error_reporting(E_ALL); ini_set("display_errors", 1);
$data = 'template_object= {
  "object_type": "text",
  "text": "새로운 상담메일이 도착하였습니다.",
  "link": {
    "web_url": "http://banklist.co.kr",
    "mobile_web_url": "http://banklist.co.kr"
  }
}';
$result = post('https://kapi.kakao.com/v2/api/talk/memo/default/send', $data); 
print_r($result);

function post($url,$data) { 
	$token = "DGiSofhYmabIeMRG-szDH4FQGGzSqQ0Yd54IyAo8BhkAAAFligCp3A";
	$user_agent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)'; 
	$compression='gzip';
	$header = array('Accept: application/json', 'Content-type: application/x-www-form-urlencoded;charset=UTF-8', 'Authorization: Bearer '.$token);
	
	$process = curl_init($url); 
	curl_setopt($process, CURLOPT_HTTPHEADER, $header); 
	curl_setopt($process, CURLOPT_HEADER, 1); 
	curl_setopt($process, CURLOPT_USERAGENT, $user_agent); 
	curl_setopt($process, CURLOPT_ENCODING , $compression); 
	curl_setopt($process, CURLOPT_TIMEOUT, 30); 
	curl_setopt($process, CURLOPT_POSTFIELDS, $data); 
	curl_setopt($process, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1); 
	curl_setopt($process, CURLOPT_POST, 1); 
	$return = curl_exec($process); 
	curl_close($process); 
	return $return; 	
} 
?>