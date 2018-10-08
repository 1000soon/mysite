<?php
include("conf/functions.php");
require_once("lib/PHPMailer/PHPMailerAutoload.php");
$arrType = array(0=>"기타", 1=>"아파트 담보 대출" ,2=>"아파트매매잔금 대출" ,3=>"빌라/다세대" ,4=>"주택 담보 대출" ,5=>"오피스텔 담보 대출" ,6=>"일반부동산 담보 대출" ,7=>"상가보증금 대출", 8=>"전세 대출", 9=>"사업자 대출", 10=>"신용 대출", 11=>"후순위 추가 대출");			  
$name = sqlparam($_POST['vname']);
$type = isset($_POST['type'])?$_POST['type']:0;
$p1 = sqlparam($_POST['phone1']);
$p2 = sqlparam($_POST['phone2']);
$p3 = sqlparam($_POST['phone3']);
//$price = $_POST['price'];
$addr1 = isset($_POST['sido'])? getlocation('sido', $_POST['sido']):"";
$addr2 = isset($_POST['gungu'])? getlocation('gungu', $_POST['gungu']):"";
$addr3 = isset($_POST['dong'])? getlocation('dong', $_POST['dong']):"";
$addr = $addr1." ".$addr2." ".$addr3;

$desc =sqlparam($_POST['desc']);
$ip = $_SERVER['REMOTE_ADDR'];
if($p1=="" || $p2=="" || $p3==""){
	alertBack("전화번호를 정확히 입력 해 주셔야 자세한 상담이 가능합니다."); exit;
}

// mail
$message = "이름 : ".$name."<br/>";
$message .= "연락처 : ".$p1."-".$p2."-".$p3."<br/>";
$message .= "내용 : ".$desc;
$message .= "구분 : ".$arrType[$type]."<br/>";
$message .= "지역 : ".$addr."<br/>";
	
$mail = new PHPMailer;
$mail->SMTPSecure = 'ssl';
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

$mail->Username = "hcsoon0212@gmail.com";
$mail->Password = "cjstns59";

$mail->setFrom('hcsoon0212@gmail.com', 'BankList');
$mail->addReplyTo('donotreply@gmail.com', 'BankList');
$mail->addAddress('banklist@naver.com');
//$mail->addAddress('hcsoon0212@gmail.com');
$mail->CharSet = "utf-8";
$mail->Encoding = "base64";

//Set the subject line
$mail->Subject = '새로운 상담 신청이 접수되었습니다.';
$mail->msgHTML($message, dirname(__FILE__));
$mail->AltBody = $message;
$mail->send();
	
$conn = new Connection();
$dbh = $conn->setConnection();
$query = "INSERT INTO tb_request (v_name, v_type, v_phone1, v_phone2, v_phone3,  v_addr, v_desc, ip_addr) VALUES (:name, :type, :p1, :p2, :p3, :addr, :desc, :ip)";
$stmt = $dbh->prepare($query);
$stmt->bindParam(":name", $name, PDO::PARAM_STR);
$stmt->bindParam(":type", $type, PDO::PARAM_INT);
$stmt->bindParam(":p1", $p1, PDO::PARAM_STR);
$stmt->bindParam(":p2", $p2, PDO::PARAM_STR);
$stmt->bindParam(":p3", $p3, PDO::PARAM_STR);
$stmt->bindParam(":addr", $addr, PDO::PARAM_STR);
$stmt->bindParam(":desc", $desc, PDO::PARAM_STR);
$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
try{
	$stmt->execute();
	$dbh = $conn->closeConn();
	apcu_clear_cache();	
	location_replace("상담 신청이 접수 되었습니다.", "index.php"); exit;	
}catch(PDOException $e){
	alertBack("일시적으로 장애가 발생하고 있습니다. 잠시 후 다시 시도 해 주시기 바랍니다."); exit;
}

?>