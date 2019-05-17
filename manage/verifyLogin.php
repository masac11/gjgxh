<?php 
/**
 * 文件名：verifyLogin.php
 * 描 述：用于验证是正常登录，还是未登录非法访问，使用方法，在站内所有页面添 加 require 'vefiryLogin.php'; 
 *作  者：张宏宽
 *时  间：2018年8月19日
 *版  权：济南洋洋信息技术有限公司
 *版本号：V3.0
 */ 
if (!session_id()) session_start(); 
	if(!isset($_SESSION['username'])){
	$uri = 'http://';
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/gjgxh/manage/login/login.php');
	exit;
	}
?>
