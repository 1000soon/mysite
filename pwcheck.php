<?php
include("conf/functions.php");
$type = sqlparam($_POST['tb']); // b=qa, r=review
$idx = is_number($_POST['num']);
$proc = sqlparam($_POST['proc']); // m=modify, d=delete
$pw = hash("sha256", $_POST['pw']);
if(!$idx){
	echo "err1"; exit; //"글이 존재하지 않습니다."
}

$conn = new Connection();
$dbh = $conn->setConnection();
$redirect = "";
if($type == "b"){
	$selectSql = "SELECT v_pass FROM tb_board_qa WHERE idx=".$idx;
	$deleteSql = "DELETE FROM tb_board_qa WHERE idx=".$idx;
	$redirect = "board_insert.php?num=".$idx;
}
else if($type == "r"){
	$selectSql = "SELECT v_pass FROM tb_board_review WHERE idx=".$idx;
	$deleteSql = "DELETE FROM tb_board_review WHERE idx=".$idx;
	$redirect = "review_insert.php?num=".$idx;
}
else{
	echo "err2"; exit; //"테이블이 존재하지 않습니다."
}
$pass = $dbh->query($selectSql)->fetchColumn();

if($pass != $pw){
	echo "err3"; exit; //"비밀번호가 일치하지 않습니다."
}

if($proc == "m"){
	echo $redirect; exit;
}
else{
	try{
		$dbh->query($deleteSql);
		echo "delete"; exit;
	}catch(PDOException $e){
		echo "err4"; exit;
	}
}
?>