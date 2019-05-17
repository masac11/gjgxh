<?php
	/**
	 * 
	 */
	class Appraise
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllAppraise($category)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql = "select * from appraise where category='$category' order by time desc";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_result($appraise_id,$title,$content,$img_path,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "appraise_id"=>$appraise_id,
			        "title"=>$title,
			        "content"=>$content,
			        "img_path"=>$img_path,
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

		public function getAppraiseByAppraiseId($appraise_id)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql = "select * from appraise where appraise_id=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$appraise_id);
			$stmt->bind_result($appraise_id,$title,$content,$img_path,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "appraise_id"=>$appraise_id,
			        "title"=>$title,
			        "content"=>$content,
			        "img_path"=>$img_path,
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

		public function delAppraiseByAppraiseId($appraise_id)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql="delete from appraise where appraise_id=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$appraise_id);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}

		public function addAppraise($title, $content, $time, $img_path, $category)
		{
			$sql="insert into appraise (title, content, time, img_path, category) values (?,?,?,?,?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssss",$title, $content, $time, $img_path,$category);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

		public function editAppraise($appraise_id, $title, $content, $time)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql="UPDATE `appraise` SET `title`=?, `content`=?, `time`=? WHERE (`appraise_id`=?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$title,$content,$time,$appraise_id);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectAppraiseByKeyword($keyword, $category)
		{
			$sql = "select * from appraise where title like ? and category='$category' order by time desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($appraise_id,$title,$content,$img_path,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "appraise_id"=>$appraise_id,
			        "title"=>$title,
			        "content"=>$content,
			        "img_path"=>$img_path,
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

		public function selectAppraiseByPage($offset,$pageSize,$category)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from appraise where category='$category' order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($appraise_id,$title,$content,$img_path,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "appraise_id"=>$appraise_id,
			        "title"=>$title,
			        "content"=>$content,
			        "img_path"=>$img_path,
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

		public function selectAppraiseByPageKeyword($offset, $pageSize, $keyword, $category)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from appraise where title like ? and category='$category' order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($appraise_id,$title,$content,$img_path,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "appraise_id"=>$appraise_id,
			        "title"=>$title,
			        "content"=>$content,
			        "img_path"=>$img_path,
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
	