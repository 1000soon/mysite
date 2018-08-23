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
$query_rs1 = "SELECT count(*) FROM tb_board_review";
$rs1 = $dbh->query($query_rs1);
$total=$rs1->fetchColumn();
$limit =15;
$pages = ceil($total/$limit);
$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options'=>array('default'=>1,'min_range'=>1)
)));

$offset = ($page-1)*$limit;
$current_num=$total-$limit*($page-1);

$query = "SELECT idx, v_name, v_title, DATE(date_ins) as dt, reply_cnt FROM tb_board_review ".$whereStr." ORDER BY idx DESC LIMIT ?,?" ;
$stmt = $dbh->prepare($query);
$stmt->bindParam(1,$offset,PDO::PARAM_INT);
$stmt->bindParam(2,$limit,PDO::PARAM_INT);
$stmt->execute();

$page_param = array();
$page_param['total_num']  = $total;
$page_param['list_num']  = $limit;
$page_param['page_block'] = 5;
$page_param['current_page'] = $page;
$page_param['link_url']  = $_SERVER['PHP_SELF'];
$page_class = new Page();
$page_class->init($page_param);
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
							total <?=$total?>건, <?=$page."/".$pages?>page
							<table class="gray border boardlist" style="width:100%;">
								<colgroup>
									<col style="width:50px" />
									<col style="width:;" />
									<col style="width:7%" />
									<col style="width:12%" />
								</colgroup>
								<thead>
									<tr>						
										<th class="pc">번호</th>															
										<th>제목</th>
										<th class="pc">글쓴이</th>
										<th class="pc">날짜</th>				
									</tr>
								</thead>
								<tbody>				
									<?while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){?>
									<tr>
										<td><?=$rows['idx']?></td>																				
										<td style="text-align:left; text-indent:3px;"><a href="review_view.php?num=<?=$rows['idx']?>"><?=$rows['v_title']?></a>
										<?if($rows['reply_cnt']>0){?>
										<span style="color:red">&nbsp;(<?=$rows['reply_cnt']?>)</span>
										<?}?>
										<br/>
										<span class="mobile"><?=$rows['v_name']?> (<?=$rows['dt']?>)</span>
										</td>
										<td class="pc"><?=$rows['v_name']?></td>
										<td class="pc"><?=$rows['dt']?></td>
									</tr>
									<?}?>							
								</tbody>
							</table>
							<?=get_nodata($stmt->rowCount())?>
							<!--페이징-->
							<?=$page_class->getPaging();?>
							<br/>							
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
				
				<br/>
				<p  style="text-align:right"><a href="#header" id="anchor1" class="anchorLink" title="페이지 상단으로 이동"><img src="/images/btn_top.gif" alt="페이지상단 이동버튼"></a></p>
			</div>
			<!-- Main -->
		</div>
	<!-- /Main -->
	<br>
<script type="text/javascript">
	$(function(){
		$("#nav ul li").eq(2).addClass("active").siblings("li").removeClass("active");
	});
</script>
<?php include("inc/footer.php");?>