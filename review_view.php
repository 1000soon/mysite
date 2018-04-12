<?php 
include("inc/header.php");
$num = isset($_REQUEST['num'])?is_number($_REQUEST['num']):0;
$conn = new Connection();
$dbh = $conn->setConnection();
$query = "SELECT *, DATE(date_ins) as dt FROM tb_board_review WHERE idx=".$num;
$stmt = $dbh->prepare($query);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// 댓글
$query = "SELECT * FROM tb_reply WHERE board_type=2 AND parent_idx=".$num;
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
					<section>
						<article style="min-height:200px;">
							<h3><?=$data['v_title'] ?></h3>	
							<p><?=$data['v_name'] ?> (<?=$data['dt'] ?>)</p>						
							<p><?=$data['v_content'] ?></p>
						</article>
						<p>
							비밀번호 <input type="password" name="pw" id="pw" style="width:150px;" />&nbsp;
							<a href="javascript:passform('b',<?=$data['idx']?>,'m')" class="btn">수정</a>&nbsp;&nbsp;<a href="javascript:passform('b',<?=$data['idx']?>,'d')" class="btn">삭제</a>	
						</p>
						<br/>
						<?while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){?>					
						<table>
						<tr style="border:0;">
							<td style="width:30px;vertical-align:top;border:0;padding-top:8px;padding-left:8px;"><img src="images/ico/ico_reply.png" alt=""/></td>
							<td style="border:0;vertical-align:top;padding-left:10px;"><?=$rows['content']?></td>
						</tr>
						</table>
						<?}?><hr/>
						<a href="review.php" class="button">목록으로</a>							
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
		$("#nav ul li").eq(3).addClass("active").siblings("li").removeClass("active");
	});
	function passform(page, idx, proc){
		var pw = $("#pw").val();
		if(proc=='d' && !confirm("정말 삭제하시겠습니까?")){
			return false;
		}
		$.post("pwcheck.php", {tb:page, num:idx, proc:proc, pw:pw}).done(function(result){
			if(result=='err1'){
				alert("글이 존재하지 않습니다.");
			}
			else if(result=='err2'){
				alert("테이블이 존재하지 않습니다.");
			}
			else if(result=='err3'){
				alert("비밀번호가 일치하지 않습니다.");
			}
			else if(result=='err4'){
				alert("DB장애가 발생하였습니다.");
			}
			else if(result=='delete'){
				alert("삭제되었습니다."); location.replace("review.php");
			}
			else{
				location.replace(result);
			}
		});
	}
</script>
<?php include("inc/footer.php");?>
