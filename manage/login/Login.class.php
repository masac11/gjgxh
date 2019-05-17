<?php

class Login{ 
	private $username; //用户名
	private $password; //密码

	public function setUsername($username){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getPassword(){
		return $this->password;
	}
	
}
?>