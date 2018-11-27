<?php include('conf/functions.php');?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>새봄</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width">
		<meta name="keywords" content="새봄, 개인회생, 파산" />	
		<meta name="description" content="새봄, 개인회생, 파산" />	
		<meta property="og:type" content="article">
		<meta property="og:title" content="새봄">
		<meta property="og:url" content="http://bom.banklist.co.kr">
		<meta property="og:site_name" content="banklist">
		<meta property="og:description" content="개인회생, 파산, 저희 새봄이 도와드립니다.">
		<meta property="og:image" content="http://bom.banklist.co.kr/images/og.jpg">
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/skel.min.js"></script>
		<script type="text/javascript" src="js/skel-panels.min.js"></script>
		<script type="text/javascript" src="js/init.js"></script>
		<script src="js/kakao.min.js"></script>
		
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
					<h1 class="mobile"><a href="index.php">새봄 - 개인회생, 파산</a></h1>
					<h1 class="pc"><img src="images/logo.png" alt="새봄"/></h1>
				</div>			
	
			</div>
		</div>
	<!-- Header -->
		
	<!-- Banner -->
		<div id="banner">
			
		</div>
	<!-- /Banner -->