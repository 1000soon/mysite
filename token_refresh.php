<?php
//$token = "22UTlls847FHJycZcFotDMZ89gS2xn1Uecj3mwoqAuYAAAFlid3FQg";
$token = file_get_contents("upload/refresh.txt");
$url = trim("https://kauth.kakao.com/oauth/token");
$cmd ="curl -d 'grant_type=refresh_token' \
 -d 'client_id=52ea8ba1a85b1fea2a9a7a9da7f7afe2' \
 -d 'refresh_token=".$token."' \ -H 'Content-type: application/x-www-form-urlencoded;charset=UTF-8' \ -H 'Accept: application/json' \ -v -X POST ".$url;
$resultSet = json_decode(shell_exec($cmd));
print_r($resultSet);

if(isset($resultSet->access_token)){
	file_put_contents("upload/token.txt", $resultSet->access_token);
}
if(isset($resultSet->refresh_token)){
	file_put_contents("upload/refresh.txt", $resultSet->refresh_token);
}
?>