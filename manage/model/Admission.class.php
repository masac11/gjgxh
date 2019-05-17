<?php
	/**
	 * 
	 */
	class Admission
	{
		
		private $conn;
		function __construct()
		{ 
			require_once $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}
		
		public function selectAllProcedure()
		{
			$sql = "select * from admission where category='procedure'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($admissionId,$content,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $procedureItem = array(
			    	"admissionId"=>$admissionId,
			        "content"=>$content,
			        "category"=>$category
			        );
			    $result[] = $procedureItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function selectAllTable()
		{
			$sql = "select * from admission where category='table'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($admissionId,$content,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $tableItem = array(
			    	"admissionId"=>$admissionId,
			        "content"=>$content,
			        "category"=>$category
			        );
			    $result[] = $tableItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}
		
		public function editProcedure($admissionId,$content)
		{	
			if ($content=="null") {
			$sql="insert into admission (content) values (?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s", $content);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
			}
			else{
			$sql="update admission set content=? where category='procedure'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$content);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
			}
		}
		public function editTable($admissionId,$content)
		{
			if ($content=="null") {
			$sql="insert into admission (content) values (?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s", $content);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
			}
			else{
			$sql="update admission set content=? where category='table'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$content);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
			}
		}

		
	}