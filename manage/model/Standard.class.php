<?php
	/**
	 * 
	 */
	class Standard
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllStandard()
		{

			$sql = "select * from standard order by time desc";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_result($standardId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "standardId"=>$standardId,
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

		public function getStandardByStandardId($standardId)
		{
			$sql = "select * from standard where standardId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$standardId);
			$stmt->bind_result($standardId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "standardId"=>$standardId,
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

		public function delStandardByStandardId($standardId)
		{
			$sql="delete from standard where standardId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$standardId);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}

		public function addStandard($title, $content, $time)
		{
			$sql="insert into standard (title, content, time) values (?,?,?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$title, $content, $time);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

		public function editStandard($standardId, $title, $content, $time)
		{
			$sql="update standard set title=?,content=?,time=? where standardId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$title,$content,$time,$standardId);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectStandardByKeyword($keyword)
		{
			$sql = "select * from standard where title like ? order by time desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($standardId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "standardId"=>$standardId,
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

		public function selectStandardByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from standard  order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($standardId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "standardId"=>$standardId,
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

		public function selectStandardByPageKeyword($offset, $pageSize, $keyword)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from standard where title like ? order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($standardId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "standardId"=>$standardId,
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