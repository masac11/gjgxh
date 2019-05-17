<?php
	/**
	 * 
	 */
	class Law
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllLaw()
		{
			$sql = "select * from law order by time desc";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($lawId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "lawId"=>$lawId,
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

		public function selectLawByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from law  order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($lawId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "lawId"=>$lawId,
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


		public function addLaw($title, $content, $time)
		{
			$sql="insert into law (title, content, time) values (?, ?, ?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$title, $content, $time);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}


		public function getLawByLawId($lawId)
		{
			$sql = "select * from law where lawId=? ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$lawId);
			$stmt->bind_result($lawId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "lawId"=>$lawId,
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



		public function delLawByLawId($lawId)
		{
			$sql="delete from law where lawId=? ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$lawId);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}



		public function editLaw($lawId, $title, $content, $time)
		{
			$sql="update law set title=?,content=?,time=? where lawId=? ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$title,$content,$time,$lawId);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectLawguerByKeyword($keyword)
		{
			$sql = "select * from law where title like ?  order by time desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($lawId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "lawId"=>$lawId,
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





		public function selectlawguerByPageKeyword($offset, $pageSize, $keyword)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from law where title like ? order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($lawId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "lawId"=>$lawId,
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