<?php 
include("inc/header.php");
require_once("conf/dbconfig.php");
$query = "SELECT idx, v_name, v_title, DATE(date_ins) as dt FROM tb_board";
$conn = new Connection();
$dbh = $conn->setConnection();
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
								<h2>고객센터</h2>
							</header>
							<ul class="style1">
								<li class="active"><a href="#">Q&amp;A</a></li>
								<li><a href="#">사용후기</a></li>
							</ul>		
						</section>					
					</div>
					<div class="9u content">
						<section>
							<a href="board_insert.php?build=" class="button" >등록하기</a>
							<br/><br/>
							<table class="gray border boardlist" style="width:100%;">
								<colgroup>		
									<col style="width:6%"/>
									<col style="width:12%"/>					
									<col style="width:*"/>
									<col style="width:15%"/>				
								</colgroup>
								<thead>
									<tr>						
										<th>번호</th>
										<th>작성자</th>					
										<th>제목</th>
										<th>등록일</th>				
									</tr>
								</thead>
								<tbody>				
									<?while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){?>
									<tr>
										<td><?=$rows['idx']?></td>
										<td><?=$rows['v_name']?></td>
										<td><a href="board_view.php?num=<?=$rows['idx']?>"><?=$rows['v_title']?></a></td>
										<td><?=$rows['dt']?></td>
									</tr>
									<?}?>							
								</tbody>
							</table>
							<br/>			
							<!--페이징-->
							
							<!--검색-->
							<form action="<?=$_SERVER['PHP_SELF']?>" method="get" id="form1" class="">
								<select name="searchType" id="searchType">
									<option value="1">제목</option>
									<option value="2">작성자</option>
									<option value="3">제목+내용</option>
								</select>
								<input type="text" name="searchVal" id="searchVal" value=""/>
								<input type="submit" class="btn" value="검색" />														
							</form>
						
						</section>
					</div>
				</div>			
			</div>
			<!-- Main -->
		</div>
	<!-- /Main -->
	<br>
<script type="text/javascript">
	$(function(){
		$("#nav ul li").eq(4).addClass("active").siblings("li").removeClass("active");
	});
</script>
<?php include("inc/footer.php");?>