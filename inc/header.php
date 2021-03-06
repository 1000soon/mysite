<?php include('conf/functions.php');?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>뱅크리스트</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width">
		<meta name="keywords" content="뱅크리스트, bankllist, bank, 대출, 대출상담, 후순위 추가대출, 무설정, 저신용, 수수료면제, 사업자대출, 최대한도, 신용불량대출, 전세대출, 이자계산기" />	
		<meta name="description" content="뱅크리스트는 각 금융권과 제휴하여 전국 은행 상품을 빠르고 쉽게 비교해 드립니다." />	
		<meta name="naver-site-verification" content="e7ef4c64434abcaedc5f0b95aaaab3cf6f5d1fa0"/>
		<meta property="og:type" content="article">
		<meta property="og:title" content="뱅크리스트">
		<meta property="og:url" content="https://banklist.co.kr">
		<meta property="og:site_name" content="banklist">
		<meta property="og:description" content="모든 금융권 금리와 한도 비교 상담. 대출상담, 후순위 추가대출, 저신용, 사업자대출, 전세대출">
		<meta property="og:image" content="https://banklist.co.kr/images/og.jpg">
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/skel.min.js"></script>
		<script type="text/javascript" src="js/skel-panels.min.js"></script>
		<script type="text/javascript" src="js/init.js"></script>
		<script src="js/kakao.min.js"></script>
		
		<link rel="canonical" href="https://banklist.co.kr/">
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<script type="text/javascript">
			function loadlocal(t,v){
				$.post("get_address.php", {t:t, v:v}).done(function(result){
					$("#area"+t).empty().append(result);
				});
			}
		</script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127829552-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127829552-1');
</script>

	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div class="container">					
				<!-- Logo -->
				<div id="logo">
					<h1 class="mobile"><a href="index.php">Bank<b style="color:#e95d3c">l</b>ist</a></h1>
					<h1 class="pc"><a href="index.php"><img src="/images/logo.png" alt="banklist"/></a></h1>
				</div>				
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="active"><a href="index.php">Home</a></li>
						<!--<li><a href="my.php">나의 금리 진단받기</a></li>--?
						<!--<li><a href="compare.php">담보대출 금리 비교</a></li>-->
						<li><a href="help.php">대출 도우미</a></li>
						<li><a href="board.php">고객센터</a></li>
					</ul>
				</nav>
			</div>
		</div>
	<!-- Header -->
		
	<!-- Banner -->
		<div id="banner">
			<div class="container pc" style="background:rgba(0,0,0,.3);padding:3em 2em 3em;text-indent:20px;">
				<h3 style="font-size:24px;">대출 한도와 금리, 뱅크리스트와 상의하세요!</h3>
				<br/>
				<p style="font-size:16px;">뱅크리스트는 각 금융권과 제휴하여 전국 은행 상품을 빠르고 쉽게 비교해 드립니다.</p>
				<p style="font-size:16px;">* 상담 및 중개 수수료가 발생하지 않습니다.</p>
				<p style="font-size:14px;">* 제2금융권 및 보험사, 캐피탈사 상품을 포함합니다.</p>
				<p style="font-size:16px;">#후순위대출 #추가대출 #무설정신용대출 #사업자대출 #신용대출 #전세대출 #최대한도 #최저금리</p>
			</div>
		</div>
	<!-- /Banner -->