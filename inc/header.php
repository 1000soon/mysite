<?php include('/conf/functions.php');?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Banklist</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />	
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/skel.min.js"></script>
		<script type="text/javascript" src="js/skel-panels.min.js"></script>
		<script type="text/javascript" src="js/init.js"></script>
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
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div class="container">					
				<!-- Logo -->
				<div id="logo">
					<h1><a href="index.php">Bank<b style="color:#e95d3c">l</b>ist</a></h1>
				</div>				
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="my.php">나의 금리 진단받기</a></li>
						<li><a href="compare.php">담보대출 금리 비교</a></li>
						<li><a href="help.php">대출 도우미</a></li>
						<li><a href="board.php">고객센터</a></li>
					</ul>
				</nav>
			</div>
		</div>
	<!-- Header -->
		
	<!-- Banner -->
		<div id="banner">
			<div class="container">
			</div>
		</div>
	<!-- /Banner -->