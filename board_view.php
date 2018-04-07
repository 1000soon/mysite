<?php 
include("inc/header.php");
$num = isset($_REQUEST['num'])?is_number($_REQUEST['num']):0;
$conn = new Connection();
$dbh = $conn->setConnection();
$query = "SELECT *, DATE(date_ins) as dt FROM tb_board_qa WHERE idx=".$num;
$stmt = $dbh->prepare($query);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
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
								<li class="active"><a href="board.php">Q&amp;A</a></li>
								<li><a href="review.php">사용후기</a></li>
							</ul>	
					</section>					
				</div>
				<div class="9u content">					
					<section>
						<article style="min-height:200px;">
							<h3><?=$data['v_title'] ?></h3>	
							<p><?=$data['v_name'] ?> (<?=$data['dt'] ?>)</p>						
							<p><?=$data['v_content'] ?></p>
						</article>
						비밀번호 <input type="text" name="pw" id="pw" style="width:150px;" />&nbsp;
						<a href="javascript:chageform('r',<?=$data['v_idx']?>)" class="btn">수정</a>&nbsp;&nbsp;<a href="javascript:deleteform('r',<?=$data['v_idx']?>)" class="btn">삭제</a>
						<hr/>						
						<a href="board.php" class="button">목록으로</a>							
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