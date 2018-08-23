<?php 
include("inc/header.php");
?>
<!-- Main -->
	<div id="page">
			
		<!-- Main -->
		<div id="main" class="container">
			<div class="row">

				<div class="3u">
					<section class="sidebar">
						<header>
							<h2>대출 도우미</h2>
						</header>
						<ul class="style1">
							<li><a href="help.php">대출계산기</a></li>
							<li class="active"><a href="additional.php">부대비용 &amp; 필요 서류</a></li>
							<li><a href="assess.php">감정평가 절차 및 이해</a></li>
						</ul>							
					</section>					
				</div>
			
				<div class="9u content">				
					<h3>대출신청시 준비하셔야할 서류</h3> 
					<br/>
					<table class="" summary="이 표는 구분,준비서류,발급기관에 대한 정보를 확인할 수 있습니다."> 
					<caption>가계 대출신청시 준비서류</caption> 
					<colgroup> 
						<col style="width: 20%;"> 
						<col style="width: 20%;"> 
						<col style="width: 40%;"> 
						<col style="width: 20%;"> 
					</colgroup> 
					<thead> 
						<tr> 
							<th colspan="2" scope="col" class="first">구분</th> 
							<th scope="col">준비서류</th> 
							<th scope="col">발급기관</th> 
						</tr> 
					</thead> 
					<tbody> 
						<tr> 
							<td rowspan="3" class="first">개인대출</td> 
							<td>일반서류</td> 
							<td class="left">
								<ul class="contType01">
								<li class="bult_txt">재직관련 서류(재직증명서, 직장의료보함증 등)</li>
								<li class="bult_txt">소득확인 서류(근로자원천징수영수증 등)</li>
								<li class="bult_txt">주민등록 등,초본</li>
								</ul>
							</td> 
							<td class="left">
								<ul class="contType01">
								<li class="bult_txt">재직회사</li>
								<li class="bult_txt">주민센터</li>
								</ul>
							</td> 
						</tr> 
						<tr> 
							<td>담보물 감정서류</td> 
							<td class="left">
								<ul class="contType01">
								<li class="bult_txt">도시계획확인원</li>
								<li class="bult_txt">건축물관리대장, 토지대장</li>
								<li class="bult_txt">등기부등본(토지, 건물)</li>
								<li class="bult_txt">아파트인 경우 등기부등본만 필요</li>
								<li class="bult_txt">담보주택에 임대가 있는 경우 임대차계약서</li>
								</ul>
							</td> 
							<td class="left"> 
								<ul class="contType01">
								<li class="bult_txt">관할구청</li>
								<li class="bult_txt">등기소</li>
								</ul>
							</td>
						</tr> 
						<tr> 
							<td>담보물 설정서류</td> 
							<td class="left">
								<ul class="contType01">
								<li class="bult_txt">본인서명사실확인서 및 인감증명서(담보설정용)</li>
								<li class="bult_txt">등기권리증</li>
								</ul>
							</td> 
							<td class="left">
							<ul class="contType01">
							<li class="bult_txt">주민센터</li>
							</ul></td> 
						</tr> 
					</tbody> 
					</table> 
					
					<br/>
					
					<h3>대출취급에 따른 부대 비용</h3> 
					<br/>
					<strong>저당권설정관련비용</strong>
					<table class="lType01" summary="이 표는 구분,금액산출기준,관련법령에 대한 정보를 확인할 수 있습니다."> 
					<caption>저당권설정관련비용 정보</caption> 
					<colgroup> 
						<col style="width: 25%;"> 
						<col style="width: 50%;"> 
						<col style="width: 25%;"> 
					</colgroup> 
					<thead> 
						<tr> 
							<th scope="col" class="first">구분</th> 
							<th scope="col">금액산출기준</th> 
							<th scope="col">관련법령</th> 
						</tr> 
					</thead> 
					<tbody> 
						<tr> 
							<td class="first">주택채권매입액</td> 
							<td class="left">설정금액이 2천만원이상인 경우 설정금액의 1.0%</td> 
							<td class="left"><br></td> 
						</tr> 
					</tbody> 
					</table> 
					
					<ul class="contType01 ht_10"> 
						<li class="bult_txt">근저당권의 설정최고액(설정금액) : 대출금액의 120%</li> 
						<li class="bult_txt">근저당권 감액/말소등기비용은 고객 부담</li> 
					</ul> 
					<hr> 
					<ul class="contType01 ht_10"> 
						<li class="bult_tit"><strong>화재보험료</strong> 
							<ul class="contType01"> 
								<li class="bult_txt">건물, 기계기구 등 화재의 위험이 있는 담보물에 대하여는 화재보험에 가입하여야 합니다.<br>다만, 부보금액이 5천만원이하, 아파트인 경우 화재보험 가입을 생략할 수 있습니다.</li> 
								<li class="bult_txt"><strong>보험금액 산출</strong> : (대출금액 - 대지,예금 등 비이재 담보가격)* 100%~120%</li> 
								<li class="bult_txt">보험료는 보험금액에 보험요율을 곱하여 산정하며 보험요율은 물건, 소재지 등에 따라 차등될 수 있습니다.</li> 
								<li class="bult_txt">보험대상물건의 특성(용도,시설)에 따라 할증 또는 할인 요율이 가감됩니다.</li> 
							</ul> 
						</li> 
					</ul> 
					
					<strong>기타부대비용(인지세)</strong>	
					<table class="lType01" summary="이 표는 대출금액,인지세,대출금액,인지세액에 대한 정보를 확인할 수 있습니다."> 
					<caption>기타부대비용(인지세) 정보</caption> 
					<colgroup> 
						<col style="width: 25%;"> 
						<col style="width: 25%;"> 
						<col style="width: 25%;"> 
						<col style="width: 25%;"> 
					</colgroup> 
					<thead> 
						<tr> 
							<th class="first" scope="col">대출금액</th> 
							<th scope="col">인지세액</th> 
							<th scope="col">대출금액</th> 
							<th scope="col">인지세액</th> 
						</tr> 
					</thead> 
					<tbody> 
						<tr> 
							<td>5천만원 이하</td> 
							<td>면제</td> 
							<td class="first">5천만원 초과 / 1억원 이하</td> 
							<td>7만원</td> 							
						</tr> 
						<tr> 
							<td class="first">1억원 초과 / 10억원 이하</td> 
							<td>15만원</td> 
							<td>10억원 초과</td> 
							<td>35만원</td> 
						</tr> 
					</tbody> 
					</table>
					<ul class="contType01"> 
					<li class="bult_txt">인지세법에 의해 대출약정 체결시 납부하는 세금으로 대출금액에 따라 세액이 차등적용되며, <span class="point_red">고객과 은행이 50%씩 부담합니다.</span></li> 
					</ul> 
					<br/>
					<p  style="text-align:right"><a href="#header" id="anchor1" class="anchorLink" title="페이지 상단으로 이동"><img src="/images/btn_top.gif" alt="페이지상단 이동버튼"></a></p>

					</div>					
				</div>
			</div>
			<!-- Main -->
		</div>
	<!-- /Main -->
<br/>
<script type="text/javascript">
	$(function(){
		$("#nav ul li").eq(1).addClass("active").siblings("li").removeClass("active");
	});
</script>
<?php 
include("inc/footer.php");
?>