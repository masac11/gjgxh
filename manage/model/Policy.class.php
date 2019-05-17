<?php
	/**
	 * 
	 */
	class Policy
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllPolicy()
		{

			$sql = "select * from policy order by policyTime desc";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_result($policyId,$policyTitle,$policyContent,$policyTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "policyId"=>$policyId,
			        "policyTitle"=>$policyTitle,
			        "policyContent"=>$policyContent,
			        "policyTime"=>$policyTime
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function getPolicyByPolicyId($policyId)
		{
			$sql = "select * from policy where policyId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$policyId);
			$stmt->bind_result($policyId,$policyTitle,$policyContent,$policyTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "policyId"=>$policyId,
			        "policyTitle"=>$policyTitle,
			        "policyContent"=>$policyContent,
			        "policyTime"=>$policyTime
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function delPolicyByPolicyId($policyId)
		{
			$sql="delete from policy where policyId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$policyId);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}

		public function addPolicy($policyTitle,$policyContent,$policyTime)
		{
			$sql="insert into policy (policyTitle,policyContent,policyTime) values (?,?,?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$policyTitle,$policyContent,$policyTime);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

		public function editPolicy($policyId,$policyTitle,$policyContent,$policyTime)
		{
			$sql="update policy set policyTitle=?,policyContent=?,policyTime=? where policyId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$policyTitle,$policyContent,$policyTime,$policyId);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectPolicyByKeyword($keyword)
		{
			$sql = "select * from policy where policyTitle like ? order by policyTime desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($policyId,$policyTitle,$policyContent,$policyTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			       "policyId"=>$policyId,
			        "policyTitle"=>$policyTitle,
			        "policyContent"=>$policyContent,
			        "policyTime"=>$policyTime
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function selectPolicyByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from policy  order by policyTime desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($policyId,$policyTitle,$policyContent,$policyTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			       "policyId"=>$policyId,
			        "policyTitle"=>$policyTitle,
			        "policyContent"=>$policyContent,
			        "policyTime"=>$policyTime
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$conn->close();
			return $result;
		}

		public function selectPolicyByPageKeyword($offset, $pageSize, $keyword)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from policy where policyTitle like ? order by policyTime desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($policyId,$policyTitle,$policyContent,$policyTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			       "policyId"=>$policyId,
			        "policyTitle"=>$policyTitle,
			        "policyContent"=>$policyContent,
			        "policyTime"=>$policyTime
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$conn->close();
			return $result;
		}
	}