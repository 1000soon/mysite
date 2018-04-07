<?php
@session_start();
error_reporting(E_ALL); ini_set("display_errors", 1);
@require_once("dbconfig.php");
function alert($msg){
	$str= "<script type=\"text/javascript\">";
	$str.= "alert('$msg');";
	$str.= "</script>";
	echo $str;
}
function location_replace($msg,$url){
	$str= "<script type=\"text/javascript\">";
	$str.= "alert('$msg');";
	$str.= "location.replace('$url');";
	$str.= "</script>";
	echo $str;
	exit;
}
function alertBack($msg){
	$str= "<script type=\"text/javascript\">";
	$str.= "alert('$msg');";
	$str.= "history.go(-1);";
	$str.= "</script>";
	echo $str;
	exit;
}
function alertClose($msg){
	$str= "<script type=\"text/javascript\">";
	$str.= "alert('$msg');self.close();";
	$str.= "</script>";
	echo $str;
	exit;
}
function getlocation($type, $code){
	$conn = new Connection();
	$dbh = $conn->setConnection();
	$stmt = $dbh->query("SELECT local_name FROM tb_".$type." WHERE idx=".$code);
	$localname = $stmt->fetchColumn();
	$dbh = $conn->closeConn();
	return $localname;
}
function get_nodata($num){
	$rtn = "";
	if ($num < 1)
	$rtn = "<div style='text-align:center;line-height:32px; border:#dedede 1px solid;'>등록 된 글이 없습니다.</div>";
	return $rtn;
}

/** 파라미터 체크 **/
// 숫자인덱스인 경우
function is_number($get_str){
	if(is_numeric($get_str)==true){
		return $get_str;
	}else{
		return false;
	}
}

// 인젝션 방지
function sqlparam($val) {
	 $str = preg_replace("/select| union| insert| update| delete| drop| truncate| and| or| CR| LF| SELECT| UNION| INSERT| UPDATE| DELETE| DROP| TRUNCATE/","", $val);
	 $str = htmlspecialchars($str);
	 xssClear($str);
	 return $str;
}

// xss 방지
function xssClear($val) {
 // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
 // this prevents some character re-spacing such as <java\0script>
 // note that you have to handle splits with \n, \r, and \t later since they *are*
 // allowed in some inputs

 $val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);

 // straight replacements, the user should never need these since they're normal characters
 // this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&
 // #X3A&#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29>

  $search = 'abcdefghijklmnopqrstuvwxyz';
  $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $search .= '1234567890!@#$%^&*()';
  $search .= '~`";:?+/={}[]-_|\'\\';

   for ($i = 0; $i < strlen($search); $i++) {
	  // ;? matches the ;, which is optional
	  // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars
	  // &#x0040 @ search for the hex values

	 $val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);

	  // with a ;
	  // &#00064 @ 0{0,7} matches '0' zero to seven times

	 $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
   }

	 // now the only remaining whitespace attacks are \t, \n, and \r

	 $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'style',
	 'script', 'embed', 'object', 'iframe', 'frameset', 'ilayer', 'layer', 'bgsound', 'base');
	 $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
	 $ra = array_merge($ra1, $ra2);

	 $found = true; // keep replacing as long as the previous round replaced something
	 while ($found == true) {
		 $val_before = $val;
		 for ($i = 0; $i < sizeof($ra); $i++) {
			 $pattern = '/';
			 for ($j = 0; $j < strlen($ra[$i]); $j++) {
				 if ($j > 0) {
					 $pattern .= '(';
					 $pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
					 $pattern .= '|(&#0{0,8}([9][10][13]);?)?';
					 $pattern .= ')?';
				 }
				$pattern .= $ra[$i][$j];
			 }
			$pattern .= '/i';
			strip_tags($val, '<br>');
			$replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
			$val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
			if ($val_before == $val) {
			   // no replacements were made, so exit the loop
			   $found = false;
			}
		 }
	 }
	return $val;
}


/* 페이징 처리 클래스 */
class Page{
	private $total_num; //전체 게시물 수
	private $list_num; //목록에 표시할 글 갯수
	private $total_num_pages; //전체 페이지 수
	private $current_page; //현재페이지

	private $page_block; //블록 당 페이지 갯수
	private $total_num_block; //전체 블록 수
	private $current_block; //현재 블록

	private $link_url; //페이지 url(현재 주소)
	private $page_result; //html 출력

	private $start_num;
	private $end_num;
	private $parameter;

	//초기화설정
	public function init($param = array()){
		$this->total_num = $param['total_num'];
		$this->list_num = $param['list_num'];
		$this->total_num_pages = ceil($this->total_num / $this->list_num);
		$this->current_page = $param['current_page'];

		$this->page_block = $param['page_block'];
		$this->total_num_block = ceil($this->total_num_pages / $this->page_block);
		$this->current_block = ceil($this->current_page / $this->page_block);

		$this->link_url = $param['link_url'];
		$this->parameter = $param['link_param'];
	}

	public function getPaging(){
		$this->start_num = ($this->current_block-1)*$this->page_block;
		$this->end_num = $this->current_block*$this->page_block;
			if($this->end_num > $this->total_num_pages) $this->end_num = $this->total_num_pages;

		$this->page_result = "<div class='paging'>";
		//맨앞
		if($this->current_page ==1){
			$this->page_result .= "<span><img src='/admin/common/images/btn_first.gif' alt='first'/></span>&nbsp;&nbsp;";
		}else{
			$this->page_result .= "<a href='".$this->link_url."?page=1".$this->parameter."' class='first'><img src='/admin/common/images/btn_first.gif' alt='first'/></a>&nbsp;&nbsp;";
		}

		//이전페이지
		if($this->current_page ==1){
			$this->page_result .= "<span class=''><img src='/admin/common/images/btn_prev.gif' alt=''/></span>&nbsp;&nbsp;";
		}else{
			$movepage = ($this->current_page)-1;
			$this->page_result .= "<a href='".$this->link_url."?page=".$movepage.$this->parameter."' class=''><img src='/admin/common/images/btn_prev.gif' alt=''/></a>&nbsp;&nbsp;";
		}

		//페이지번호 링크
		if($this->total_num==0){
			$this->page_result .= "<span class='sel'>1</span>&nbsp;&nbsp;";
		}else{
			for($i=$this->start_num+1;$i<=$this->end_num;$i++){
				if($i==$this->current_page){
					$this->page_result .= "<span class='sel'>".$i."</span>&nbsp;&nbsp;";
				}else{
					$this->page_result .= "<a href='".$this->link_url."?page=".$i.$this->parameter."'>".$i."</a>&nbsp;&nbsp;";
				}
			}
		}

		//다음페이지
		if($this->current_page == $this->total_num_pages){
			$this->page_result .= "<span class=''><img src='/admin/common/images/btn_next.gif' alt=''/></span>&nbsp;&nbsp;";
		}else{
			$movepage = ($this->current_page)+1;
			$this->page_result .= "<a href='".$this->link_url."?page=".$movepage.$this->parameter."' class=''><img src='/admin/common/images/btn_next.gif' alt=''/></a>&nbsp;&nbsp;";
		}

		//맨끝
		if($this->current_page ==$this->total_num_pages){
			$this->page_result .= "<span class='last'><img src='/admin/common/images/btn_last.gif' alt='last'/></span>";
		}else{
			$this->page_result .= "<a href='".$this->link_url."?page=".$this->total_num_pages.$this->parameter."' class='last'><img src='/admin/common/images/btn_last.gif' alt='last'/></a>";
		}

		$this->page_result .= "</div>";

		return $this->page_result;
	}
}
?>