<?php
	/**
	 * 
	 */
	class companyStyle
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllcompanyStyle()
		{
			$sql = "select * from companyStyle order by time desc";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($companyStyleId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyStyleId"=>$companyStyleId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function getcompanyStyleBycompanyStyleId($companyStyleId)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql = "select * from companyStyle where companyStyleId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$companyStyleId);
			$stmt->bind_result($companyStyleId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyStyleId"=>$companyStyleId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function delcompanyStyleBycompanyStyleId($companyStyleId)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql="delete from companyStyle where companyStyleId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$companyStyleId);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}

		public function addcompanyStyle($title, $content, $time)
		{
			$sql="insert into companyStyle (title, content, time) values (?,?,?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$title, $content, $time);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

		public function editcompanyStyle($companyStyleId, $title, $content, $time)
		{
			$sql="update companyStyle set title=?,content=?,time=? where companyStyleId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$title,$content,$time,$companyStyleId);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectcompanyStyleByKeyword($keyword)
		{
			$sql = "select * from companyStyle where title like ? order by time desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($companyStyleId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyStyleId"=>$companyStyleId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function selectcompanyStyleByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from companyStyle  order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($companyStyleId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyStyleId"=>$companyStyleId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$conn->close();
			return $result;
		}

		public function selectcompanyStyleByPageKeyword($offset, $pageSize, $keyword)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from companyStyle where title like ? order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($companyStyleId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyStyleId"=>$companyStyleId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time
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