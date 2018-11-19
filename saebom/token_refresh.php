<?php
//$token = "22UTlls847FHJycZcFotDMZ89gS2xn1Uecj3mwoqAuYAAAFlid3FQg";
$token = file_get_contents("upload/refresh.txt");
$url = "https://kauth.kakao.com/oauth/token";
$cmd = preg_replace("/\r/","","curl -d 'grant_type=refresh_token' \
 -d 'client_id=01392ee59a4397035bcf8acf976cea44' \
 -d 'refresh_token=".$token."' \ -H 'Content-type: application/x-www-form-urlencoded;charset=UTF-8' \ -H 'Accept: application/json' \ -v -X POST ".$url);
$resultSet = json_decode(shell_exec($cmd));
print_r($resultSet);

if(isset($resultSet->access_token)){
	file_put_contents("upload/token.txt", $resultSet->access_token);
}
if(isset($resultSet->refresh_token)){
	file_put_contents("upload/refresh.txt", $resultSet->refresh_token);
}
?>