<?php include("inc/header.php");?>

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
								<li class="active"><a href="#">대출계산기</a></li>
								<li><a href="#">부대비용 &amp; 필요 서류</a></li>
								<li><a href="#">감정평가 절차 및 이해</a></li>
							</ul>							
						</section>					
					</div>
				
					<div class="9u skel-cell-important">
						<section>
							<table>
							<tbody>
								<tr>
									<th style="width:20%">대출금액</th>
									<td>
									&nbsp;<input type="text" dir="rtl" name="loanprice2" id="loanprice2"  size="15">원
									</td>
								</tr>
								<tr>
									<th>대출기간</th>
									<td>&nbsp;<input type="text" dir="rtl" name="period" id="period" value="">개월</td>
								</tr>
								<tr>
									<th>대출금리</th>
									<td>&nbsp;<input type="text" dir="rtl" name="rate" value="" size="15">%</td>
								</tr>
								<tr>
									<th>거치기간</th>
									<td>&nbsp;<input type="text" dir="rtl" name="period_year" id="period_year">년</td>
								</tr>
								<tr>
									<th>상환방법</th>
									<td>&nbsp;
									<input type="radio" value="1" name="RPM">원리금균등상환
									<input type="radio" value="2" name="RPM">원금균등상환
									<input type="radio" value="3" name="RPM">원금만기일시상환
									<input type="radio" value="4" name="RPM">거치후원리금균등상환
									<input type="radio" value="5" name="RPM">거치후원금균등상환
									</td>
								</tr>
								<tr class="last">
									<td colspan="2" height="50" align="center"><input type="submit" class="button" value="대출이자계산" ></td>
								</tr>        
							</tbody>
							</table>						
						</section>
					</div>
					
				</div>
			</div>
			<!-- Main -->
		</div>
	<!-- /Main -->
<br/>
<script type="text/javascript">
	$(function(){
		$("#nav ul li").eq(3).addClass("active").siblings("li").removeClass("active");
	});
</script>
<?php include("inc/footer.php");?>