<?php
require_once('LoginService.class.php');
$loginService = new LoginService();
require_once('Login.class.php');
$login = new Login();
header('Content-type:text/html; charset=utf-8');
if(isset($_REQUEST['flag'])){


	/**
	 *登录
	 */
	if($_REQUEST['flag']=='login'){
		$username = $_REQUEST['username'];
		$password = md5($_REQUEST['password']);
				
				$result = $loginService->login($username,$password); //查询数据库用户名和密码是否正确
				
				if($result==false){
					
					header('Location:login.php?errno=1');
					exit();
				}else{
					if(!session_id())session_start();
					$_SESSION['username']=$username;
					header('Location:../index.php');
					exit();
				}

	    
	}



}
