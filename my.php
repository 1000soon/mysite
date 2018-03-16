<?php include("inc/header.php");?>

	<!-- Main -->
		<div id="page">
				
			<!-- Main -->
			<div id="main" class="container">
				<div class="row">

					<div class="3u">
						<section class="sidebar">
							<header>
								<h2>나의 금리 진단받기</h2>
							</header>
						</section>					
					</div>
				
					<div class="9u skel-cell-important">
						<section>		
						<h3><?=date("m")?>월 특판상품</h3>
						<table>		
							<tr>
								<th>금융기관명</th>
								<th>LTV 비율</th>
								<th>금리유형</th>
								<th>금리</th>
							</tr>                  
							<tr>
								<td align="center">A 은행</td>
								<td align="center">40%~70%</td>
								<td align="center"><font color="red">변동</font></td>
								<td align="center"><strong><font color="#FF6600"> 3.23%~4.43%</font></strong></td>
							</tr>
							<tr>
								<td align="center">A 은행</td>
								<td align="center">40%~70%</td>
								<td align="center"><font color="red">고정</font></td>
								<td align="center"><strong><font color="#FF6600"> 3.83%~4.93%</font></strong></td>
							</tr>
							<tr>
								<td align="center" >B 보험사</td>
								<td align="center" >40%~70%</td>
								<td align="center" ><font color="red">변동</font></td>
								<td align="center"><strong><font color="#FF6600"> 3.23%~3.85%</font></strong></td>
							</tr>
							<tr>
								<td align="center" >B 보험사</td>
								<td align="center" >40%~70%</td>
								<td align="center" ><font color="red">고정</font></td>
								<td align="center"><strong><font color="#FF6600"> 3.83%~4.30%</font></strong></td>
							</tr>
							<tr>
								<td align="center" >C 보험사</td>
								<td align="center" >40%~70%</td>
								<td align="center" ><font color="red">변동</font></td>
								<td align="center"><strong><font color="#FF6600"> 3.23%~3.43%</font></strong></td>
							</tr>
							<tr>
								<td align="center" >C 보험사</td>
								<td align="center" >40%~70%</td>
								<td align="center" ><font color="red">고정</font></td>
								<td align="center"><strong><font color="#FF6600"> 3.83%~3.93%</font></strong></td>
							</tr>
							<tr>
								<td align="center" >D 농협</td>
								<td align="center" >40%~70%</td>
								<td align="center" ><font color="red">변동</font></td>
								<td align="center"><strong><font color="#FF6600"> 3.40%~3.63%</font></strong></td>
							</tr>
							<tr>
								<td align="center" >D 농협</td>
								<td align="center" >40%~70%</td>
								<td align="center" ><font color="red">고정</font></td>
								<td align="center"><strong><font color="#FF6600"> 3.83%~3.93%</font></strong></td>
							</tr>
						</table>
						<p><font color="red">* 기타 부대조건 없음</font></p>
						<p><font color="red">* 고객님의 지역 및 대출한도에 따라 특판금리 가능 여부는 달라질 수도 있습니다.</font></p>					
						
						<br/>
						<form action="request.php" method="post">
							<table>
								  <th style="width:20%">구분</th>
								  <td style="width:80%" colspan="3">
									&nbsp;<select name="type">
									  <option value="1">아파트담보</option>
									  <option value="2">아파트매매잔금</option>
									  <option value="3">빌라/다세대담보</option>
									  <option value="4">주택담보</option>
									  <option value="5">오피스텔</option>
									  <option value="6">일반부동산</option>									  
									</select>
								  </td>
								</tr>
								<tr>
								  <th>성함</th>
								  <td colspan="3" align="left">
									&nbsp;<input type="text" name="vname" style="width:100px;">
								  </td>
								</tr>
								<tr>
								  <th>연락처</th>
								  <td colspan="3" align="left">
									&nbsp;<select name="phone1" style="width:50px;">
									  <option value="010" selected="">010</option>
									  <option value="011">011</option>
									  <option value="016">016</option>
									  <option value="017">017</option>
									  <option value="018">018</option>
									  <option value="019">019</option>
									</select>
									- <input type="tel" name="phone2" class="num-only" style="width:50px;" maxlength="4">
									- <input type="tel" name="phone3" class="num-only" style="width:50px;" maxlength="4">
								  </td>
								</tr>
								<tr id="D01_add01">
								  <th>금액</th>
								  <td colspan="3" align="left">
									&nbsp;<input type="text" name="price" class="" numberonly="true" value="" style="width:108px;"> 만원 
								  </td>
								</tr>
								<tr id="D02_add01" style="">
								  <th>지역</th>
								  <td colspan="3" align="left">
									&nbsp;<select name="sido" class="" id="sido" onchange="loadlocal(1, this.value)">
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
								  </td>
								</tr>
								<tr>
								  <th>기타사항</th>
								  <td colspan="3">&nbsp;<textarea name="desc"  style="width:100%" rows=5  placeholder="특이사항이나 상담 가능 시간을 남겨주세요"></textarea></td>
								</tr>
								<tr class="last">
									<td colspan=4 height="50" style="text-align:center">
									<input type="submit" class="button" value="상담신청">
									</td>
								</tr>
							</table>	
						</form>						  
						</section>
					</div>
					
				</div>
			</div>
			<!-- Main -->

		</div>
	<!-- /Main -->
<br/>
<?php include("inc/footer.php");?>