<?php
@session_start();
function alert($msg){
	$str.= "<script type=\"text/javascript\">";
	$str.= "alert('$msg');";
	$str.= "</script>";
	echo $str;
}
function location_replace($msg,$url){
	$str.= "<script type=\"text/javascript\">";
	$str.= "alert('$msg');";
	$str.= "location.replace('$url');";
	$str.= "</script>";
	echo $str;
	exit;
}
function alertBack($msg){
	$str.= "<script type=\"text/javascript\">";
	$str.= "alert('$msg');";
	$str.= "history.go(-1);";
	$str.= "</script>";
	echo $str;
	exit;
}
function alertClose($msg){
	$str.= "<script type=\"text/javascript\">";
	$str.= "alert('$msg');self.close();";
	$str.= "</script>";
	echo $str;
	exit;
}
?>