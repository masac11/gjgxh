<?php
if(!session_id())session_start();
require_once('User.class.php');
class passwordService{
	private $conn;
	function __construct()
	{ 
		require_once $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
		$this->conn = $conn;
	}
	/**
	  *函数名：passwordEdit()
	  *功 能：修改密码

	  *参 数：$user
	  *返回值：$result
	  */
	public function passwordEdit($oldpass,$newpass){

		    $sql = "select password from user where username=?";

		    $username = $_SESSION['username'];
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$username);
			$stmt->bind_result($password);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $passwordItem = array(
			        "password"=>$password
			        );
			    $result[] = $passwordItem;
			}
			
		if($oldpass == $result[0]['password']){
			$sql="update user set password=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$newpass);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		  return true; //修改成功
		}
		else{
		  return false; //修改失败
		}
	}
}