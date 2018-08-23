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
							<li><a href="additional.php">부대비용 &amp; 필요 서류</a></li>
							<li class="active"><a href="assess.php">감정평가 절차 및 이해</a></li>
						</ul>							
					</section>					
				</div>
			
				<div class="9u content">			
					<h3>감정평가 절차 및 이해</h3> 
					<br/>
					<p><strong>감정평가</strong>란 토지 등의 경제적 가치를 판정하여 그 가치를 가액으로 표시하는 것을 말합니다. 토지 등이란, 토지 및 그 정착물(건물 등), 동산 그밖의 각종 재단과 이들에 관한 소유권 외의 권리를 말합니다. (부동산 가격 공시 및 감정평가에 관한 법률 제2조)</p>
					<br/>
					<p><b style="font-size:1.2em;">약식감정 및 탁상감정</b></p>
					<p>한도가 크게 필요 없을 때 정식감정 없이 약식 혹은 탁상 감정으로만 진행이 되며, 과거 시세를 토대로 감정가가 산정되기 때문에 절차가 간단합니다.</p>
					<p class="">
						<ol class="process fix">
							<li><span>문의 및 상담</span></li>							
							<li><img src="images/img_next.png" alt=">" style="display:inline-block;padding:15px 5px;" /><span>약식감정 의뢰</span></li>							
							<li><img src="images/img_next.png" alt=">" style="display:inline-block;padding:15px 5px;" /><span>대출한도 설정</span></li>							
							<li><img src="images/img_next.png" alt=">" style="display:inline-block;padding:15px 5px;" /><span>대출 진행</span></li>
						</ol>
					</p>
					
					
					<p style="margin-top:40px;"><b style="font-size:1.2em;">정식감정 및 현장감정</b></p>
					<p>정식 감정은 현장감정이 동원되며, 신축 건물 또는 단독다가구 등 주택의 한도가 많이 필요할 때 진행됩니다.</p>
					<p class="">
						<ol class="process fix">
							<li><span>문의 및 상담</span></li>							
							<li><img src="images/img_next.png" alt=">" style="display:inline-block;padding:15px 5px;" /><span>약식/탁상 감정</span></li>							
							<li><img src="images/img_next.png" alt=">" style="display:inline-block;padding:15px 5px;" /><span>1차 감정가 산정</span></li>							
							<li><img src="images/img_next.png" alt=">" style="display:inline-block;padding:15px 5px;" /><span>정식 감정 의뢰</span></li>							
							<li><img src="images/img_next.png" alt=">" style="display:inline-block;padding:15px 5px;" /><span>대출한도 설정</span></li>							
							<li><img src="images/img_next.png" alt=">" style="display:inline-block;padding:15px 5px;" /><span>대출 진행</span></li>
						</ol>
					</p>
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