<?php
include("conf/functions.php");
$type = is_number($_POST['t']);
$value = is_number($_POST['v']);
$query = "";
$result = "";
switch($type){
	case 1 : $query="SELECT idx, local_name FROM tb_gungu WHERE sido=:idx ORDER BY local_name ASC"; 
		$result.="<option value=''>-시/구/군-</option>";	break;
	case 2 : $query="SELECT idx, local_name FROM tb_dong WHERE gungu=:idx ORDER BY local_name ASC";
		$result.="<option value=''>-읍/면/동-</option>";	break;
	default : $result.="<option value=''>-</option>";break;
}

$conn = new Connection();
$dbh = $conn->setConnection();
$stmt = $dbh->prepare($query);
$stmt->bindParam(":idx", $value, PDO::PARAM_INT);
$stmt->execute();

while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
	$result .= "<option value='".$rows['idx']."'>".$rows['local_name']."</option>";
}
echo $result;
?>