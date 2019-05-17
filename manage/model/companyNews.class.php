<?php
	/**
	 * 
	 */
	class companyNews
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllcompanyNews()
		{
			$sql = "select * from companyNews order by time desc";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($companyNewsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyNewsId"=>$companyNewsId,
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

		public function getcompanyNewsBycompanyNewsId($companyNewsId)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql = "select * from companyNews where companyNewsId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$companyNewsId);
			$stmt->bind_result($companyNewsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyNewsId"=>$companyNewsId,
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

		public function delcompanyNewsBycompanyNewsId($companyNewsId)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql="delete from companyNews where companyNewsId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$companyNewsId);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}

		public function addcompanyNews($title, $content, $time)
		{
			$sql="insert into companyNews (title, content, time) values (?,?,?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$title, $content, $time);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

		public function editcompanyNews($companyNewsId, $title, $content, $time)
		{
			$sql="update companyNews set title=?,content=?,time=? where companyNewsId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$title,$content,$time,$companyNewsId);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectcompanyNewsByKeyword($keyword)
		{
			$sql = "select * from companyNews where title like ? order by time desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($companyNewsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyNewsId"=>$companyNewsId,
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

		public function selectcompanyNewsByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from companyNews  order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($companyNewsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyNewsId"=>$companyNewsId,
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

		public function selectcompanyNewsByPageKeyword($offset, $pageSize, $keyword)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from companyNews where title like ? order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($companyNewsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "companyNewsId"=>$companyNewsId,
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