<?php
	/**
	 * 
	 */
	class News
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllNews($category)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql = "select * from news where category='$category' order by time desc";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_result($newsId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "newsId"=>$newsId,
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

		public function getNewsByNewsId($newsId)
		{
			$sql = "select * from news where newsId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$newsId);
			$stmt->bind_result($newsId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "newsId"=>$newsId,
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

		public function delNewsByNewsId($newsId)
		{
			$sql="delete from news where newsId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$newsId);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}

		public function addNews($title, $content, $time, $category)
		{
			$sql="insert into news (title, content, time, category) values (?,?,?,?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("ssss",$title, $content, $time, $category);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

		public function editNews($newsId, $title, $content, $time)
		{
			$sql="update news set title=?,content=?,time=? where newsId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$title,$content,$time,$newsId);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectNewsByKeyword($keyword, $category)
		{
			$sql = "select * from news where title like ? and category='$category' order by time desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($newsId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "newsId"=>$newsId,
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

		public function selectNewsByPage($offset, $pageSize, $category)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from news where category='$category' order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($newsId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "newsId"=>$newsId,
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

		public function selectNewsByPageKeyword($offset, $pageSize, $keyword, $category)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from news where title like ? and category='$category' order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($newsId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "newsId"=>$newsId,
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