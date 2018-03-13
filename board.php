<?php include("inc/header.php");?>

	<!-- Main -->
		<div id="page">				
			<!-- Main -->
			<div id="main" class="container">
				<div class="row">
					<div class="12u content">
						<section>
							<a href="board_insert.php?build=" class="button" >문의하기</a>
							<br/><br/>
							<table class="gray border" style="width:100%;">
								<colgroup>		
									<col style="width:6%"/>
									<col style="width:14%"/>					
									<col style="width:*"/>
									<col style="width:12%"/>
									<col style="width:12%"/>				
								</colgroup>
								<thead>
									<tr>						
										<th>번호</th>
										<th>작성자</th>					
										<th>제목</th>
										<th>조회수</th>
										<th>등록일</th>				
									</tr>
								</thead>
								<tbody>								
										<tr><td colspan=6 align=center>등록 된 글이 없습니다.</td></tr>							
								</tbody>
							</table>
							<br/>			
							<!--페이징-->
							
							<!--검색-->
							<form action="" method="get" id="form1" class="">
								<select name="searchType" id="searchType">
									<option value="1">제목</option>
									<option value="2">작성자</option>
									<option value="3">제목+내용</option>
								</select>
								<input type="text" name="searchVal" id="searchVal" value=""/>
								<button type="button" onclick="search();"><img src="images/ico/btn_search.png" alt="검색"/></button>						
								<button type="button" onclick="location.replace('mn_board.php?build=');"><img src="images/ico/btn_return.png" alt="뒤로"/></button>						
							</form>
						
						</section>
					</div>
				</div>			
			</div>
			<!-- Main -->
		</div>
	<!-- /Main -->
	<br>
<?php include("inc/footer.php");?>