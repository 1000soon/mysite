<?php 
include("inc/header.php");
$searchType = isset($_GET['searchType'])?is_number($_GET['searchType']):0;
$seachVal = isset($_GET['searchVal'])?sqlparam($_GET['searchVal']):"";
$whereStr = "";
if($searchType>0 && $seachVal!=""){
	switch($searchType){		
		case 1 : $whereStr .= " WHERE v_title LIKE '%".$seachVal."%'"; break;
		case 2 : $whereStr .= " WHERE v_name ='".$seachVal."'"; break;
		case 3 : $whereStr .= " WHERE v_title LIKE '%".$seachVal."%' OR v_content LIKE '%".$seachVal."%'"; break;
	}	
}
$conn = new Connection();
$dbh = $conn->setConnection();
$query = "SELECT idx, v_name, v_title, DATE(date_ins) as dt FROM tb_board_review ".$whereStr." ORDER BY idx DESC";
$stmt = $dbh->prepare($query);
$stmt->execute();
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
								<li><a href="board.php">Q&amp;A</a></li>
								<li class="active"><a href="review.php">사용후기</a></li>
							</ul>		
						</section>					
					</div>
					<div class="9u content">
						<h3>사용후기</h3>
						<section style="min-height:300px;">							
							<br/>
							<table class="gray border boardlist" style="width:100%;">
								<colgroup>		
									<col style="width:7%"/>												
									<col style="width:*"/>
									<col style="width:11%"/>		
									<col style="width:14%"/>				
								</colgroup>
								<thead>
									<tr>						
										<th>번호</th>															
										<th>제목</th>
										<th>작성자</th>
										<th>등록일</th>				
									</tr>
								</thead>
								<tbody>				
									<?while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){?>
									<tr>
										<td><?=$rows['idx']?></td>										
										<td><a href="review_view.php?num=<?=$rows['idx']?>"><?=$rows['v_title']?></a></td>
										<td><?=$rows['v_name']?></td>
										<td><?=$rows['dt']?></td>
									</tr>
									<?}?>							
								</tbody>
							</table>
							<?=get_nodata($stmt->rowCount())?>
							<br/>			
							<!--페이징-->
							
							<!--검색-->
							<form action="<?=$_SERVER['PHP_SELF']?>" method="get" id="form1" class="">
								<select name="searchType" id="searchType">
									<option value="1">제목</option>
									<option value="2">작성자</option>
									<option value="3">제목+내용</option>
								</select>
								<input type="text" name="searchVal" id="searchVal" value="" style="width:180px;" />
								<input type="hidden" name="form1" value="form1"/>
								<input type="submit" class="btn" value="검색" />														
							</form>
							<br/><a href="review_insert.php" class="button" >글쓰기</a>
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