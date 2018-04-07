<?php 
include("inc/header.php");
include("lib/captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

if(isset($_POST['form1']) && $_POST['form1']=="form1"){
	$title = $_POST['p_title'];
	$name = $_POST['p_name'];
	$content = $_POST['p_content'];
	$pw = hash("sha256", $_POST['pw']);
	$ip = $_SERVER['REMOTE_ADDR'];
	$code = $_SESSION['captcha']['code'];
	if(trim($title)=="" || trim($name)=="" || trim($content)==""){
		alertBack("이름, 제목, 내용은 필수 입력 사항입니다."); exit;
	}
	else if($code != $_POST['captcha']){
		alertBack("자동입력방지 문구를 정확히 입력 해 주세요."); exit;
	}
	
	$query="INSERT INTO tb_board_review (v_title, v_name, v_content, v_pass, ip_addr) VALUES (:title, :name, :content, :pw, :ip)";	
	$conn = new Connection();
	$dbh = $conn->setConnection();
	$stmt = $dbh->prepare($query);
	$stmt->bindParam(":title", $title, PDO::PARAM_STR);
	$stmt->bindParam(":name", $name, PDO::PARAM_STR);
	$stmt->bindParam(":content", $content, PDO::PARAM_STR);
	$stmt->bindParam(":pw", $pw, PDO::PARAM_STR);
	$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->closeCursor();
	$dbh=$conn->closeConn();
	location_replace("글이 등록 되었습니다.", "review.php");
}
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
					<h3>사용 후기</h3>
					<section>					
						<!--검색-->
						<form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="form1" onsubmit="return valCheck()">
							<table>
								<tr>
									<th style="width:20%">이름</th>
									<td>&nbsp;<input type="text" name="p_name" id="p_name" value=""/></td>
								</tr>								
								<tr>
									<th>제목</th>
									<td>&nbsp;<input type="text" name="p_title" id="p_title" value="" style="width:99%"/></td>
								</tr>
								<tr>
									<th>문의 내용</th>
									<td>&nbsp;<textarea name="p_content" id="p_content" cols="" rows="5" style="width:99%"></textarea></td>
								</tr>
								<tr>
									<th>비밀번호 설정</th>
									<td>&nbsp;<input type="password" name="pw" id=""/> * 글 수정, 삭제 시 필요합니다.</td>
								</tr>
								<tr>
									<td>							
										<img src="<?=$_SESSION['captcha']['image_src']?>" alt="자동입력방지"/>
									</td>
									<td>
										<span>왼쪽에 보이는 글자를 입력 해 주세요.</span><br/>
										&nbsp;<input type="text" name="captcha" id="captcha"/> 
									</td>
								</tr>
							</table>
							<input type="hidden" name="form1" value="form1"/>
							<input type="submit" class="button" value="확인"/>				
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
function valCheck(){
	if($("#p_name").val()==""){
		$("#p_name").focus(); return false;
	}
	else if($("#p_title").val()==""){
		$("#p_title").focus(); return false;
	}
	else if($("#p_content").val()==""){
		$("#p_content").focus(); return false;
	}
	else if($("#captcha").val()==""){
		$("#captcha").focus(); return false;
	}
}
</script>
<?php include("inc/footer.php");?>