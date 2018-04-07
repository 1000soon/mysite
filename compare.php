<?php 
include("inc/header.php");
$conn = new Connection();
$dbh = $conn->setConnection();
$query = "SELECT * FROM tb_sido";
$stmt = $dbh->query($query);
?>
	<!-- Main -->
		<div id="page">				
			<!-- Main -->
			<div id="main" class="container">
				<div class="row">
					<div class="3u">
						<section class="sidebar">
							<header>
								<h2>담보대출 금리 비교</h2>
							</header>
							<ul class="style1">
								<li class="active"><a href="#">아파트 매매 잔금 대출</a></li>
								<li><a href="#">아파트신규/대환 담보 대출</a></li>
								<li><a href="#">빌라/주택 담보 대출</a></li>
								<li><a href="#">오피스텔 담보 대출</a></li>
								<li><a href="#">기타 부동산 담보 대출</a></li>
							</ul>
						</section>					
					</div>
				
					<div class="9u  content">
						<section>
							<header>
								<h3>아파트 매매 잔금 대출 금리 비교</h3>
								<span class="byline"><?=date("Y.m.d")?> 기준</span>
							</header>
							<form name="form1" method="post">
								<table>
									<tr>
										<td>
										지역&nbsp;
										  <select name="sido" class="" id="sido" onchange="loadlocal(1, this.value)">
											 <option value="">-광역시/도-</option>
											 <?while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){?>
											 <option value="<?=$rows['idx']?>"><?=$rows['local_name']?></option>
											 <?}?>
										   </select>
										   <select name="gungu" class="" id="area1" onchange="loadlocal(2, this.value)">
											 <option value="">-시/구/군-</option>
										   </select>
										   <select name="dong" class="" id="area2" onchange="">
											 <option value="">-읍/면/동-</option>
										   </select>
										   <!--
										   <select name="build" class="" id="area3" onchange="">
											 <option value="">-아파트-</option>
										   <option value="<해당 아파트 없음>">해당 아파트 없음</option></select>
										   <select name="pyung" class="" id="">
											 <option value="">-평형-</option>										   
										   </select>
										   -->
										</td>
									</tr>
									<tr>
										<td>
										금액&nbsp;
											  <select name="bankcode" class="form2" onchange="">
												 <option value="">선택</option>
												 <option value="1">매매가</option>
												 <option value="1">분양가</option>
											   </select>
											  <input type="text" name="price" id="" class="" size="15">만원
											  &nbsp;
											  <a href="https://landprice.org" target="_blank">&gt; 매매가 정보 조회 &lt;</a>
										</td>
									</tr>
									<tr class="last"><td style="text-align:center" height="50"><input type="submit" class="button" value="조회하기"></td>
									</tr>      
								</table>
						 </form>
						<br/>
						
						<h4>한도 조회 분석 결과</h4>
							<table>		
								<tr>
									<th>금융기관명</th>
									<th>LTV 비율</th>
									<th>금리유형</th>
									<th>금리</th>
									<th>한도비율</th>
									<th>대출한도</th>
								</tr>                  
								<tr>
									<td align="center">A 은행</td>
									<td align="center">40%~70%</td>
									<td align="center"><font color="red">변동</font></td>
									<td align="center"><strong><font color="#FF6600"> 3.23%~4.43%</font></strong></td>
									<td align="center">70%</td>
									<td align="center"><span></span>만원</td>
								</tr>
								<tr>
									<td align="center">A 은행</td>
									<td align="center">40%~70%</td>
									<td align="center"><font color="red">고정</font></td>
									<td align="center"><strong><font color="#FF6600"> 3.83%~4.93%</font></strong></td>
									<td align="center">70%</td>
									<td align="center"><span></span>만원</td>
								</tr>
								<tr>
									<td align="center" >B 보험사</td>
									<td align="center" >40%~70%</td>
									<td align="center" ><font color="red">변동</font></td>
									<td align="center"><strong><font color="#FF6600"> 3.23%~3.85%</font></strong></td>
									<td align="center">70%</td>
									<td align="center"><span></span>만원</td>
								</tr>
								<tr>
									<td align="center" >B 보험사</td>
									<td align="center" >40%~70%</td>
									<td align="center" ><font color="red">고정</font></td>
									<td align="center"><strong><font color="#FF6600"> 3.83%~4.30%</font></strong></td>
									<td align="center">70%</td>
									<td align="center"><span></span>만원</td>
								</tr>
								<tr>
									<td align="center" >C 보험사</td>
									<td align="center" >40%~70%</td>
									<td align="center" ><font color="red">변동</font></td>
									<td align="center"><strong><font color="#FF6600"> 3.23%~3.43%</font></strong></td>
									<td align="center">70%</td>
									<td align="center"><span></span>만원</td>
								</tr>
								<tr>
									<td align="center" >C 보험사</td>
									<td align="center" >40%~70%</td>
									<td align="center" ><font color="red">고정</font></td>
									<td align="center"><strong><font color="#FF6600"> 3.83%~3.93%</font></strong></td>
									<td align="center">70%</td>
									<td align="center"><span></span>만원</td>
								</tr>
								<tr>
									<td align="center" >D 농협</td>
									<td align="center" >40%~70%</td>
									<td align="center" ><font color="red">변동</font></td>
									<td align="center"><strong><font color="#FF6600"> 3.40%~3.63%</font></strong></td>
									<td align="center">70%</td>
									<td align="center"><span></span>만원</td>
								</tr>
								<tr>
									<td align="center" >D 농협</td>
									<td align="center" >40%~70%</td>
									<td align="center" ><font color="red">고정</font></td>
									<td align="center"><strong><font color="#FF6600"> 3.83%~3.93%</font></strong></td>
									<td align="center">70%</td>
									<td align="center"><span></span>만원</td>
								</tr>
							</table>
							<p><font color="red">* 기타 부대조건 없음</font></p>
							<p><font color="red">* 고객님의 지역 및 대출한도에 따라 특판금리 가능 여부는 달라질 수도 있습니다.</font></p>
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