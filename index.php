<?php 
include("inc/header.php");
$cache_key_name1 = "list";
$cache_message = apcu_fetch($cache_key_name1);
$conn = new Connection();
$dbh = $conn->setConnection();
	
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
	$dbh = $conn->closeConn();
}	

// QA
$query = "SELECT *, DATE(date_ins) as dt FROM tb_board_qa ORDER BY date_ins DESC LIMIT 5";
$result = $dbh->query($query);
// 후기
$query = "SELECT *, DATE(date_ins) as dt FROM tb_board_review ORDER BY date_ins DESC LIMIT 5";
$result2 = $dbh->query($query);
?>
	<!-- Main -->
		<div id="page">
			<!-- Extra -->
			<div id="marketing" class="container">
				<div class="row">
					<div class="3u">
						<section>
							<header>
								<a href="my.php" class="">
									<img src="images/ico_building0.png" alt="" style="width:100px;" />
								</a>
								<h2>아파트 잔금 대출</h2>
							</header>
							<a href="my.php" class=""><b style="color:#e95d3c;">최저 3.23%~</b></a>
						</section>
					</div>
					<div class="3u">
						<section>
							<header>
								<a href="my.php" class="">
									<img src="images/ico_building1.png" alt="" style="width:100px;" />
								</a>
								<h2>아파트 담보 대출</h2>
							</header>
							<a href="my.php" class=""><b style="color:#e95d3c;">최저 3.23%~</b></a>
						</section>
					</div>
					<div class="3u">
						<section>
							<header>
								<a href="my.php" class="">
									<img src="images/ico_building4.png" alt="" style="width:100px;" />
								</a>
								<h2>빌라/주택 담보 대출</h2>
							</header>
							<a href="my.php" class=""><b style="color:#e95d3c;">최저 3.33%~</b></a>
						</section>
					</div>
					<div class="3u">
						<section>
							<header>
								<a href="my.php" class="">
									<img src="images/ico_building3.png" alt="" style="width:100px;" />
								</a>
								<h2>오피스텔 담보 대출</h2>
							</header>
							<a href="my.php" class=""><b style="color:#e95d3c;">최저 3.43%~</b></a>
						</section>
					</div>
				</div>
				<br/>
				<hr/>
			</div>
			
			<!-- Main -->
			<div id="main" class="container">
				<div class="row">
					<div class="6u">						
						<section>
							<header>
								<h2>무료 신용정보 조회</h2>
							</header>
							<p>신용정보의 이용 및 보호에 관한 법률에 의거, 연 3회 서비스를 무료로 이용할 수 있습니다. <br/>4개월 단위로 횟수 구분되며, 매 회 마다 한 번만 조회 가능합니다.</p>
							<a href="http://www.allcredit.co.kr/index.jsp" target="_blank"><img src="images/ico_allcredit.png" alt="AllCredit" /></a>&nbsp;&nbsp;
							<a href="https://www.credit.co.kr/ib20/mnu/BZWOCCCSE99" target="_blank"><img src="images/ico_nice.png" alt="NICE지키미" /></a>
						</section>
						<section>
							<header>
								<h2>광고/제휴 문의</h2>
							</header>
							<p>Banklist는 각 금융권과 제휴하여 전국 은행 상품을 비교해 드립니다.</p>
							<p>*제2금융권 및 보험사, 캐피탈사 상품을 포함합니다.</p>
							<a href="#" class="button">문의하기</a>
						</section>
						<section>
							<header>
								<h2>부동산 정보 열람</h2>
							</header>
							<p></p>
							<ul class="style5">
								<li><a href="http://nland.kbstar.com/quics?page=B025914&cc=b043428:b043506" target="_blank"><img src="images/ico_kb.jpg" alt="부동산정보"></a></li>
								<li><a href="http://rt.molit.go.kr/" target="_blank"><img src="images/ico_molit.jpg" alt="실거래가"></a></li>
								<li><a href="http://www.iros.go.kr" target="_blank"><img src="images/ico_law.jpg" alt="대법원 인터넷 등기소"></a></li>
								<li><a href="http://www.egov.go.kr" target="_blank"><img src="images/ico_g4c.jpg" alt="토지대장열람"></a></li>
							</ul>
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
									<a href="my.php" class="button">상담신청</a>
									<br/>
								</li>
								<li id="call">									
									<img src="images/ico/ico_phone.png" alt="전화"/>
									<p style="font-size:25px;font-weight:bold"><a href="tel:1800-0164">1800-0164</a></p>
									<p>실시간 무료 상담</p>
								</li>	
							</ul>						
						</section>
					</div>
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
<?php include("inc/footer.php");?>