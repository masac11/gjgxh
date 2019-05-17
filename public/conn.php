<?php
	$dbConf=include 'config.php';
    
    $conn=new mysqli($dbConf['host'],$dbConf['user'],$dbConf['password'],$dbConf['dbName'],$dbConf['port']);
    mysqli_query($conn , "set names utf8");
    if(!$conn){
        die('数据库连接失败');
    }