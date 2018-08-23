<?php 
include("inc/header.php");
include("lib/captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
$num = isset($_REQUEST['num'])?is_number($_REQUEST['num']):0;
// 게시글 정보
$conn = new Connection();
$dbh = $conn->setConnection();
$query = "SELECT * FROM tb_board_qa WHERE idx=".$num;
$stmt = $dbh->prepare($query);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['form1']) && $_POST['form1']=="form1"){
	$idx = $_POST['idx'];
	$title = $_POST['p_title'];
	$name = $_POST['p_name'];
	$content = $_POST['p_content'];
	$pw = hash("sha256", $_POST['pw']);
	$ip = $_SERVER['REMOTE_ADDR'];	
	if(trim($title)=="" || trim($name)=="" || trim($content)==""){
		alertBack("이름, 제목, 내용은 필수 입력 사항입니다."); exit;
	}
	else if(strtolower($_POST['capt']) != strtolower($_POST['captcha'])){
		alertBack("자동입력방지 문자를 정확히 입력 해 주세요."); exit;
	}
	if($idx>0){
		$query="UPDATE tb_board_qa SET v_title=:title, v_name=:name, v_content=:content, v_pass=:pw, ip_addr=:ip WHERE idx=:idx";	
		$stmt = $dbh->prepare($query);
		$stmt->bindParam(":idx", $idx, PDO::PARAM_INT);
	}
	else{
		$query="INSERT INTO tb_board_qa (v_title, v_name, v_content, v_pass, ip_addr) VALUES (:title, :name, :content, :pw, :ip)";	
		$stmt = $dbh->prepare($query);
	}
	$stmt->bindParam(":title", $title, PDO::PARAM_STR);
	$stmt->bindParam(":name", $name, PDO::PARAM_STR);
	$stmt->bindParam(":content", $content, PDO::PARAM_STR);
	$stmt->bindParam(":pw", $pw, PDO::PARAM_STR);
	$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->closeCursor();
	$dbh=$conn->closeConn();
	location_replace("글이 등록 되었습니다.", "board.php");
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
								<li class="active"><a href="board.php">Q&amp;A</a></li>
								<li><a href="review.php">사용후기</a></li>
							</ul>		
					</section>					
				</div>
				<div class="9u content">
					<h3>Q&amp;A</h3>
					<br/>
					<section>					
						<!--검색-->
						<form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="form1" onsubmit="return valCheck();">
							<table>
								<tr>
									<th style="width:20%">이름</th>
									<td>&nbsp;<input type="text" name="p_name" id="p_name" value="<?=$data['v_name']?>"/></td>
								</tr>								
								<tr>
									<th>제목</th>
									<td>&nbsp;<input type="text" name="p_title" id="p_title" value="<?=$data['v_title']?>" style="width:95%"/></td>
								</tr>
								<tr>
									<th>문의 내용</th>
									<td>&nbsp;<textarea name="p_content" id="p_content" cols="" rows="5" style="width:95%"><?=$data['v_content']?></textarea></td>
								</tr>
								<tr>
									<th>비밀번호 설정</th>
									<td>&nbsp;<input type="password" name="pw" id=""/> * 글 수정, 삭제 시 필요합니다.</td>
								</tr>
								<tr>
									<th>							
										자동입력 방지
									</th>
									<td style="vertical-align:top;">										
										&nbsp;
										<img src="<?=$_SESSION['captcha']['image_src']?>" alt="자동입력방지"/><br/>
										&nbsp;<input type="text" name="captcha" id="captcha"/> 
									</td>
								</tr>
							</table>
							<input type="hidden" name="form1" value="form1"/>
							<input type="hidden" name="capt" value="<?=$_SESSION['captcha']['code']?>"/>
							<input type="hidden" name="idx" value="<?=$num?>" />
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
	$(function(){
		$("#nav ul li").eq(2).addClass("active").siblings("li").removeClass("active");
	});
	
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