<?php
require_once("conf/dbconfig.php");
include("conf/functions.php");

$name = $_POST['vname'];
$type = $_POST['type'];
$p1 = $_POST['phone1'];
$p2 = $_POST['phone2'];
$p3 = $_POST['phone3'];
$price = $_POST['price'];
$desc = $_POST['desc'];
$ip = $_SERVER['REMOTE_ADDR'];
if($p1=="" || $p2=="" || $p3==""){
	alertBack("전화번호를 정확히 입력 해 주셔야 자세한 상담이 가능합니다."); exit;
}
$conn = new Connection();
$dbh = $conn->setConnection();
$query = "INSERT INTO tb_request (v_name, v_type, v_phone1, v_phone2, v_phone3, v_price, v_desc, ip_addr) VALUES (:name, :type, :p1, :p2, :p3, :price, :desc, :ip)";
$stmt = $dbh->prepare($query);
$stmt->bindParam(":name", $name, PDO::PARAM_STR);
$stmt->bindParam(":type", $type, PDO::PARAM_STR);
$stmt->bindParam(":p1", $p1, PDO::PARAM_STR);
$stmt->bindParam(":p2", $p2, PDO::PARAM_STR);
$stmt->bindParam(":p3", $p3, PDO::PARAM_STR);
$stmt->bindParam(":price", $price, PDO::PARAM_STR);
$stmt->bindParam(":desc", $desc, PDO::PARAM_STR);
$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
try{
$stmt->execute();
$dbh = $conn->closeConn();
apcu_clear_cache();	
location_replace("상담 신청이 접수 되었습니다.", "index.html"); exit;
}catch(PDOException $e){
alertBack("죄송합니다. 현재 일시적으로 장애가 발생하고 있습니다. 잠시 후 다시 시도 해 주시기 바랍니다."); exit;
}
?>