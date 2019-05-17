<?php
	/**
	 * 
	 */
	class Leaguer
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}
//会员信息
		public function selectAllLea()
		{
			$sql = "select * from leaguer where category='会员' order by time desc";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}
//会员分页
		public function selectLeaByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from leaguer where category='会员' order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$conn->close();
			return $result;
		}

//增加会员
		public function addLea($title, $content, $time)
		{
			$sql="insert into leaguer (title, content, time, category) values (?, ?, ?, '会员')";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$title, $content, $time);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

//副会长信息                 
		public function selectAllPre()
		{
			$sql = "select * from leaguer where category='副会长' order by time desc";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

//增加副会长
		public function addPre($title, $content, $time)
		{
			$sql="insert into leaguer (title, content, time, category) values (?, ?, ?, '副会长')";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$title, $content, $time);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

//副会长分页
			public function selectPreByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from leaguer where category='副会长' order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$conn->close();
			return $result;
		}

//常务理事
		public function selectAllRout()
		{
			$sql = "select * from leaguer where category='常务理事' order by time desc";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

//增加常务理事
		public function addRout($title, $content, $time)
		{
			$sql="insert into leaguer (title, content, time, category) values (?, ?, ?, '常务理事')";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$title, $content, $time);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

//常务理事分页
			public function selectRoutByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from leaguer where category='常务理事' order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$conn->close();
			return $result;
		}

//理事信息                 
		public function selectAllDir()
		{
			$sql = "select * from leaguer where category='理事' order by time desc";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

//增加理事
		public function addDir($title, $content, $time)
		{
			$sql="insert into leaguer (title, content, time, category) values (?, ?, ?, '理事')";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$title, $content, $time);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

//理事分页
			public function selectDirByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from leaguer where category='理事' order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$conn->close();
			return $result;
		}



//公用的方法
		public function getLeaguerByLeaguerId($leaguerId)
		{
			$sql = "select * from leaguer where leaguerId=? ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$leaguerId);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}



		public function delLeaguerByLeaguerId($leaguerId)
		{
			$sql="delete from leaguer where leaguerId=? ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$leaguerId);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}



		public function editLeaguer($leaguerId, $title, $content, $time)
		{
			$sql="update leaguer set title=?,content=?,time=? where leaguerId=? ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$title,$content,$time,$leaguerId);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectLeaguerByKeyword($keyword)
		{
			$sql = "select * from leaguer where title like ?  order by time desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($leaguerId,$title,$content,$time);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
			        );
			    $result[] = $newItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}





		public function selectleaguerByPageKeyword($offset, $pageSize, $keyword)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from leaguer where title like ? order by time desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($leaguerId,$title,$content,$time,$category);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $newItem = array(
			        "leaguerId"=>$leaguerId,
			        "title"=>$title,
			        "content"=>$content,
			        "time"=>$time,
			        "category"=>$category
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