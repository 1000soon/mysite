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
								<li class="active"><a href="help.php">대출계산기</a></li>
								<li><a href="additional.php">부대비용 &amp; 필요 서류</a></li>
								<li><a href="assess.php">감정평가 절차 및 이해</a></li>
							</ul>							
						</section>					
					</div>
				
					<div class="9u content">
						<h3>대출계산기</h3>
						<br/>
						<section>
							<table>
							<tbody>
								<tr>
									<th style="width:20%">대출금액</th>
									<td>
									&nbsp;<input type="text" name="loanprice" id="loanprice"  size="15">원
									</td>
								</tr>
								<tr>
									<th>대출기간</th>
									<td>&nbsp;<input type="text"  name="period" id="period" value="">개월</td>
								</tr>
								<tr>
									<th>대출금리</th>
									<td>&nbsp;<input type="text" name="rate" id="rate" value="" size="15">%</td>
								</tr>
								<tr>
									<th>상환방법</th>
									<td>&nbsp;
									<select name="stype" id="">
									<option value="1">원리금 균등 상환</option>
									<option value="2">원금 균등 상환</option>
									<option value="3">원금 만기 일시상환</option>
									<option value="4">거치 후 분할 상환</option>									
									</select>
									</td>
								</tr>
								<tr class="last">
									<td colspan="2" height="50" align="center">
									<input type="button" class="button" value="이자 계산하기" onclick="calculate();" /></td>
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
		$("#nav ul li").eq(2).addClass("active").siblings("li").removeClass("active");
	});
</script>
<?php include("inc/footer.php");?>