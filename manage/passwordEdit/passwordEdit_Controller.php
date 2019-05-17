<?php
require_once('passwordEdit_Model.php');
$passwordService = new passwordService();
require_once('User.class.php');
$User = new User();
header('Content-type:text/html; charset=utf-8');
if(isset($_REQUEST['flag'])){
	/**
	 *修改密码
	 */
	if($_REQUEST['flag']=='passwordEdit'){
		$oldpass = md5($_REQUEST['Password']);
		$newpass = md5($_REQUEST['NewPassword']);
		$result = $passwordService->passwordEdit($oldpass,$newpass);
		if($result==true){
				header('location:passwordEdit.php?errno=1');
				exit();
		}else{
				header('location:passwordEdit.php?errno=2');
				exit(); 
		    }
	}

}
