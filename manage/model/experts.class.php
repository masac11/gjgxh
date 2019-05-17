<?php
	/**
	 * 
	 */
	class experts
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllexperts()
		{
			$sql = "select * from experts order by time desc";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($expertsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "expertsId"=>$expertsId,
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

		public function getexpertsByexpertsId($expertsId)
		{	
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql = "select * from experts where expertsId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$expertsId);
			$stmt->bind_result($expertsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "expertsId"=>$expertsId,
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

		public function delexpertsByexpertsId($expertsId)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql="delete from experts where expertsId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$expertsId);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}

		public function addexperts($title, $content, $time)
		{
			$sql="insert into experts (title, content, time) values (?,?,?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$title, $content, $time);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

		public function editexperts($expertsId, $title, $content, $time)
		{
			$sql="update experts set title=?,content=?,time=? where expertsId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$title,$content,$time,$expertsId);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectexpertsByKeyword($keyword)
		{
			$sql = "select * from experts where title like ? order by time desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($expertsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "expertsId"=>$expertsId,
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

		public function selectexpertsByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from experts  order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($expertsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "expertsId"=>$expertsId,
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

		public function selectexpertsByPageKeyword($offset, $pageSize, $keyword)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from experts where title like ? order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($expertsId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "expertsId"=>$expertsId,
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