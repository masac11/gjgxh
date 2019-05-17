<?php
	/**
	 * 
	 */
	class Message
	{
		
		private $conn;
		function __construct()
		{ 
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllMessages()
		{
			$sql = "select * from message order by messageTime desc";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($messageId,$messageTitle,$messageContent,$messageTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $messageItem = array(
			        "messageId"=>$messageId,
			        "messageTitle"=>$messageTitle,
			        "messageContent"=>$messageContent,
			        "messageTime"=>$messageTime
			        );
			    $result[] = $messageItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function getMessagesByMessageId($messageId)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql = "select * from message where messageId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$messageId);
			$stmt->bind_result($messageId,$messageTitle,$messageContent,$messageTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			     $messageItem = array(
			        "messageId"=>$messageId,
			        "messageTitle"=>$messageTitle,
			        "messageContent"=>$messageContent,
			        "messageTime"=>$messageTime
			        );
			    $result[] = $messageItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function delMessageByMessageId($messageId)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
			$sql="delete from message where messageId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("i",$messageId);
			$stmt->execute();
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
		}

		public function addMessage($messageTitle, $messageContent, $messageTime)
		{
			$sql="insert into message (messageTitle, messageContent,messageTime) values (?,?,?)";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sss",$messageTitle, $messageContent, $messageTime);
			$stmt->execute();
			$stmt->close();
			$this->conn->close();
		}

		public function editMessage($messageId, $messageTitle, $messageContent, $messageTime)
		{
			$sql="update message set messageTitle=?,messageContent=?,messageTime=? where messageId=?";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("sssi",$messageTitle,$messageContent,$messageTime,$messageId);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

		public function selectMessageByKeyword($keyword)
		{
			$sql = "select * from message where messageTitle like ? order by messageTime desc";
			$stmt=$this->conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("s",$keyword);
			$stmt->bind_result($messageId,$messageTitle,$messageContent,$messageTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			 $messageItem = array(
			        "messageId"=>$messageId,
			        "messageTitle"=>$messageTitle,
			        "messageContent"=>$messageContent,
			        "messageTime"=>$messageTime
			        );
			    $result[] = $messageItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function selectMessageByPage($offset,$pageSize)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from message  order by messageTime desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("ss",$offset, $pageSize);
			$stmt->bind_result($messageId,$messageTitle,$messageContent,$messageTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $messageItem = array(
			        "messageId"=>$messageId,
			        "messageTitle"=>$messageTitle,
			        "messageContent"=>$messageContent,
			        "messageTime"=>$messageTime
			        );
			    $result[] = $messageItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$conn->close();
			return $result;
		}

		public function selectMessageByPageKeyword($offset, $pageSize, $keyword)
		{
			require $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$sql = "select * from message where messageTitle like ? order by messageTime desc limit ?,?";
			$stmt=$conn->prepare($sql);
			$keyword = "%".$keyword."%";
			$stmt->bind_param("sss",$keyword, $offset, $pageSize);
			$stmt->bind_result($messageId,$messageTitle,$messageContent,$messageTime);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $messageItem = array(
			        "messageId"=>$messageId,
			        "messageTitle"=>$messageTitle,
			        "messageContent"=>$messageContent,
			        "messageTime"=>$messageTime
			        );
			    $result[] = $messageItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$conn->close();
			return $result;
		}
	}