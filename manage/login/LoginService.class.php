<?php
require_once('Login.class.php');
class LoginService{
	private $conn;
	function __construct()
	{ 
		require_once $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
		$this->conn = $conn;
	}
    
	/**
	  *函数名：login()
	  *功 能：登录

	  *参 数：$user
	  *返回值：$result
	  */
	public function login($username,$password){

		    $sql = "select password from user where username=?";

			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$username);
			$stmt->bind_result($password1);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $loginItem = array(
			        "password"=>$password1
			        );
			    $result[] = $loginItem;
			}

			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			
		if($password == $result[0]['password']){
		  return true; //登录成功
		}else{
		  return false; //登录失败
		}
	}
}
