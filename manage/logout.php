<?php  
	session_start(); 
	unset($_SESSION['username']); 
	$uri = 'http://';
    $uri .= $_SERVER['HTTP_HOST'];
    $uri .= '/gjgxh/manage/login/login.php';
    header("Location:".$uri); 
    exit(); 
?>