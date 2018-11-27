<?php 
include("inc/header.php");
$conn = new Connection();
$dbh = $conn->setConnection();

$cache_key_name1 = "list";
$cache_message = apcu_fetch($cache_key_name1);
if($cache_message===false){	
	// 점검 메시지 조회(공통)
	$query = "SELECT LEFT(v_name,1) as uname, v_phone1, v_phone3 FROM tb_request ORDER BY date_ins DESC LIMIT 20";
	$stmt = $dbh->query($query);
	while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
		$arrRequest[] = $rows;
	}
	// 캐싱
	apcu_store($cache_key_name1,  $arrRequest);		
	$cache_message = apcu_fetch($cache_key_name1);	
}	

// QA
$query = "SELECT *, DATE(date_ins) as dt FROM tb_board_qa ORDER BY date_ins DESC LIMIT 5";
$result = $dbh->query($query);
// 후기
$query = "SELECT *, DATE(date_ins) as dt FROM tb_board_review ORDER BY date_ins DESC LIMIT 5";
$result2 = $dbh->query($query);
?>

<script type='text/javascript'>
  //<![CDATA[    
    Kakao.init('aa47953955467e1c8576cce503d501bf');
    function plusFriendChat() {
      Kakao.PlusFriend.chat({
        plusFriendId: '_SkIGj' 
      });
	  ga('send', 'event', 'reply', 'click', 'kakao', 1);
    }
  //]]>
</script>
	<!-- Main -->
	<div id="page">
		
	<!-- Extra -->
	<div id="marketing" class="container">
		<div class="row">
			<div class="9u">
			
				<form action="request.php" method="post" onsubmit="return noticeTalk();">
					<table>					
						<tr>
						  <th style="width:18%"><sup style="color:red">*</sup> 성함</th>
						  <td style="width:82%" colspan="3" align="left">
							&nbsp;<input type="text" name="vname" id="vname" style="width:100px;">
						  </td>
						</tr>
						<tr>
						  <th><sup style="color:red">*</sup> 연락처</th>
						  <td colspan="3" align="left">
							&nbsp;<select name="phone1" id="phone1" style="width:50px;">
							  <option value="010" selected="">010</option>
							  <option value="011">011</option>
							  <option value="016">016</option>
							  <option value="017">017</option>
							  <option value="018">018</option>
							  <option value="019">019</option>
							</select>
							- <input type="tel" name="phone2" id="phone2" class="num-only" style="width:50px;" maxlength="4">
							- <input type="tel" name="phone3" id="phone3" class="num-only" style="width:50px;" maxlength="4">
						  </td>
						</tr>					
						<tr>
						  <th>문의 내용</th>
						  <td colspan="3">&nbsp;<textarea name="desc" id="desc"  style="width:95%" rows=5  placeholder="특이사항이나 상담 가능 시간을 남겨주세요"></textarea></td>
						</tr>
						<tr class="last">
							<td colspan=4 height="50" style="text-align:center;padding:0;">
							<input type="submit" class="button" value="상담신청">
							</td>
						</tr>
					</table>	
				</form>			
			</div>		<!--9u end-->
			<div class="3u skel-cell-important">
					<section class="sidebar">
						<header>
							<h3>실시간 상담 신청 list</h3>
						</header>
						<ul class="style2">
							<li>														
								<div id="dv_rolling" style="margin-bottom:10px;">
									<ul>
									<?for($i=0;$i<count($cache_message);$i++){?>
										<li><?=$cache_message[$i]['uname']?>**  /  <?=$cache_message[$i]['v_phone1']?>-****-<?=$cache_message[$i]['v_phone3']?></li>
									<?}?>											
									</ul>
								</div>
							</li>
							<li id="call">									
								<img src="images/ico/ico_phone.png" alt="전화" style="inline-block;margin:-0.8em 1em 0 0;">
								<p style="font-size:25px;font-weight:bold"><a href="tel:1800-0164">1800-0164</a></p>
								<p>실시간 무료 상담</p>
							</li>	
							<li>
								<a href="javascript:void plusFriendChat()"><img src="images/consult_small_yellow_pc.png"/></a>
							</li>
						</ul>						
					</section>
				</div>
			
		</div>
		<br/>
	</div>
		
		<!-- Main -->
		<div id="main" class="container" style="border-top:1px solid #f1f1f1;">
			<div class="row">
				<div class="6u" style="border-right:1px solid #f1f1f1;">
					<section>
						<header>
							<h2>무료 신용정보 조회</h2>
						</header>
						<p>신용정보의 이용 및 보호에 관한 법률에 의거, 연 3회 서비스를 무료로 이용할 수 있습니다. <br/>4개월 단위로 횟수 구분되며, 매 회 마다 한 번만 조회 가능합니다.</p>
						<a href="http://www.allcredit.co.kr/index.jsp" target="_blank"><img src="images/ico_allcredit.png" alt="AllCredit" /></a>&nbsp;&nbsp;
						<a href="https://www.credit.co.kr/ib20/mnu/BZWOCCCSE99" target="_blank"><img src="images/ico_nice.png" alt="NICE지키미" /></a>
					</section>				
				</div>
				
				<script type="text/javascript" src="js/jquery.vticker-min.js"></script>  
				<script type="text/javascript">  
				$(function(){  
					$('#dv_rolling').vTicker({   
						// 스크롤 속도(default: 700)  
						speed: 500,  
						// 스크롤 사이의 대기시간(default: 4000)  
						pause: 3000,  
						// 스크롤 애니메이션  
						animation: 'fade',  
						// 마우스 over 일때 멈출 설정  
						mousePause: false,  
						// 한번에 보일 리스트수(default: 2)  
						showItems: 5,  
						// 스크롤 컨테이너 높이(default: 0)  
						height: 0,  
						// 아이템이 움직이는 방향, up/down (default: up)  
						direction: 'down'  
					});  
				});  
				</script> 
		
				<div class="3u">
					<section class="sidebar">
						<header>
							<h2>Q&amp;A <a href="board.php" style="font-size:12px;vertical-align:top;margin-left:30px;">more<img src='/images/btn_next.png' alt='더보기' style="padding-top:5px;" /></a></h2>
						</header>
						<ul class="style1">
						<?while($rows = $result->fetch(PDO::FETCH_ASSOC)){?>
							<li><a href="board_view.php?num=<?=$rows['idx']?>" class="title"><?=$rows['v_title']?></a><span class="right"><?=$rows['dt']?></span></li>
						<?}?>							
						</ul>
					</section>
					
				</div>
				<div class="3u">
					<section class="sidebar">
						<header>
							<h2>사용후기 <a href="review.php" style="font-size:12px;vertical-align:top;margin-left:30px;">more<img src='/images/btn_next.png' alt='더보기' style="padding-top:5px;" /></a>
							</h2>
						</header>
						<ul class="style1">
						<?while($rows2 = $result2->fetch(PDO::FETCH_ASSOC)){?>
							<li><a href="review_view.php?num=<?=$rows2['idx']?>" class="title"><?=$rows2['v_title']?></a><span class="right"><?=$rows2['dt']?></span></li>
						<?}?>							
						</ul>
					</section>
				</div>
			</div>
						
			<br/>
			<p  style="text-align:right"><a href="#header" id="anchor1" class="anchorLink" title="페이지 상단으로 이동"><img src="/images/btn_top.gif" alt="페이지상단 이동버튼"></a></p>
		</div>
		<!-- Main -->
		
	</div>
<!-- /Main -->
<br>
<script type="text/javascript">
	function noticeTalk(){
		var regex=/^(-?)[0-9]+$/;
		var user = $("#vname").val();
		var p1 = $("#phone1").val();
		var p2 = $("#phone2").val();
		var p3 = $("#phone3").val();
		var desc = $("#desc").val();
		var param = user+" "+p1+p2+p3+" "+desc;
		if(user==""){
			alert("성함을 입력 해 주세요."); $("#vname").focus(); return false;
		}
		else if(p2=="" || p3=="" || !regex.test(p2) || !regex.test(p3)){
			alert("연락처를 남겨 주세요."); $("#phone2").focus(); return false;
		}
		$.post("send_talk.php", {req:param});
	}
</script>
<?php include("inc/footer.php");?>