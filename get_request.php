<?php
require_once("conf/dbconfig.php");
$cache_key_name1 = "list";
$cache_message = apc_fetch($cache_key_name1);
$arrRequest = array();

if($cache_message===false){	
	$conn = new Connection();
	$dbh = $conn->setConnection();
	$dbh = $conn->setConnection();
	// 점검 메시지 조회(공통)
	$query = "SELECT LEFT(1, v_name) as uname, v_phone1, v_phone3 FROM tb_request ORDER BY date_ins DESC LIMIT 20";
	$stmt = $dbh->query($query);
	while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
		$arrRequest[] = $rows;
	}
	
	// 캐싱
	apc_store($cache_key_name1,  $arrRequest);		
	$cache_message = apc_fetch($cache_key_name1);
	$dbh = $conn->closeConn();
}	
?>