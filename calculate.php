<?php
$origin = $_POST['origin']; // 원금
$rate = $_POST['rate']/100; // 이자
$month = $_POST['period']; // 기간
$type = $_POST['type'];

$r2 = $rate/12;
$v1 = $origin*$r2;
$v2 = pow($r2+1, $month);
$v3 = pow($r2+1, $month) -1;
$v4 = $v1 * $v2 / $v3; // 원리금균등 납입액
$payOrigin = $origin/$month; // 원금 균등 상환액

$t1=0; // 납입액 누계
$t2=0; // 납입원금 누계
$t3=0; // 납입이자 누계
$resultHtml = "<tr><th>회차</th><th>납입액</th><th>납입 원금</th><th>납입 이자</th><th class='pc'>납입 원금 누계</th><th class='pc'>납입 이자 누계</th><th class='pc'>대출 잔액</th></tr>";

if($type==1){	
	// 원리금 균등 분할 상환
	for($i=0; $i<$month; $i++){
		$payOrigin = $v4 - $origin*$r2;
		$payRate = $origin*$r2;
		$t1 += $v4;
		$t2 += $payOrigin;
		$t3 += $payRate;
		$resultHtml .= "<tr>";
		$resultHtml .= "<td align=center>".($i+1)."</td>";	
		$resultHtml .= "<td align=right>".number_format($v4)."</td>";	
		$resultHtml .= "<td align=right>".number_format(round($payOrigin,0))."</td>";	
		$resultHtml .= "<td align=right>".number_format(round($payRate,0))."</td>";	
		$resultHtml .= "<td align=right class='pc'>".number_format(round($t2,0))."</td>";	
		$resultHtml .= "<td align=right class='pc'>".number_format(round($t3,0))."</td>";	
		$origin = $origin - ($v4 - $origin*$r2);
		$resultHtml .= "<td align=right class='pc'>".number_format($origin)."</td>";		
		$resultHtml .= "</tr>";	
	}
	$resultHtml .= "<tr><td align=center><b>총 상환액</b></td><td align=right>".number_format($t1)."</td><td align=right>".number_format($t2)."</td><td align=right>".number_format($t3)."</td><td class='pc'></td><td class='pc'></td><td class='pc'></td></tr>";
}
else if($type==2){
	// 원금 균등 분할 상환
	for($i=0; $i<$month; $i++){		
		$payRate = $origin*$r2;
		$payTotal = $payOrigin+$payRate;
		$t1 += $payTotal;
		$t2 += $payOrigin;
		$t3 += $payRate;
		$resultHtml .= "<tr>";
		$resultHtml .= "<td align=center>".($i+1)."</td>";	
		$resultHtml .= "<td align=right>".number_format(round($payTotal,0))."</td>";	
		$resultHtml .= "<td align=right>".number_format(round($payOrigin,0))."</td>";	
		$resultHtml .= "<td align=right>".number_format(round($payRate,0))."</td>";	
		$resultHtml .= "<td align=right class='pc'>".number_format(round($t2,0))."</td>";	
		$resultHtml .= "<td align=right class='pc'>".number_format(round($t3,0))."</td>";	
		$origin = $origin - $payOrigin;
		$resultHtml .= "<td align=right class='pc'>".number_format($origin)."</td>";		
		$resultHtml .= "</tr>";	
	}
	$resultHtml .= "<tr><td align=center><b>총 상환액</b></td><td align=right>".number_format($t1)."</td><td align=right>".number_format($t2)."</td><td align=right>".number_format($t3)."</td><td class='pc'></td><td class='pc'></td><td class='pc'></td></tr>";
}
else{
	// 원금 만기 일시 상환
	$resultHtml = "<tr><th>회차</th><th>납입액</th><th>납입 이자</th><th>납입 이자 누계</th><th>대출 잔액</th></tr>";
	for($i=0; $i<$month; $i++){		
		$payRate = $origin*$r2;
		$t1 += $payRate;
		$t3 += $payRate;
		$resultHtml .= "<tr>";
		$resultHtml .= "<td align=center>".($i+1)."</td>";	
		$resultHtml .= "<td align=right>".number_format(round($payRate,0))."</td>";	
		$resultHtml .= "<td align=right>".number_format(round($payRate,0))."</td>";	
		$resultHtml .= "<td align=right>".number_format(round($t3,0))."</td>";	
		$resultHtml .= "<td align=right>".number_format($origin)."</td>";		
		$resultHtml .= "</tr>";	
	}
	$resultHtml .= "<tr><td align=center><b>총 상환액</b></td><td align=right>".number_format($t1)."</td><td align=right>".number_format($t3)."</td><td></td><td></td><td></td></tr>";	
}
echo $resultHtml; exit;
?>