<?php
	/**
	 * 
	 */
	class About
	{
		
		private $conn;
		function __construct()
		{ 
			require_once $_SERVER['DOCUMENT_ROOT'] . "/gjgxh/public/conn.php";
			$this->conn = $conn;
		}

		public function selectAllAbout()
		{
			$sql = "select * from about ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($aboutInfo);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $aboutItem = array(
			        "aboutInfo"=>$aboutInfo
			        );
			    $result[] = $aboutItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function selectXhjiagou()
		{
			$sql = "select aboutInfo from about where category='组织架构' ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($aboutInfo);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $aboutItem = array(
			        "aboutInfo"=>$aboutInfo
			        );
			    $result[] = $aboutItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}



		public function selectXhjianjie()
		{
			$sql = "select aboutInfo from about where category='协会简介' ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($aboutInfo);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $aboutItem = array(
			        "aboutInfo"=>$aboutInfo
			        );
			    $result[] = $aboutItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

        public function selectXhlianxi()
		{
			$sql = "select aboutInfo from about where category='联系协会' ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($aboutInfo);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $aboutItem = array(
			        "aboutInfo"=>$aboutInfo
			        );
			    $result[] = $aboutItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}
        
        public function selectXhlingdao()
		{
			$sql = "select aboutInfo from about where category='协会领导' ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($aboutInfo);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $aboutItem = array(
			        "aboutInfo"=>$aboutInfo
			        );
			    $result[] = $aboutItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function selectXhzhangcheng()
		{
			$sql = "select aboutInfo from about where category='协会章程' ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($aboutInfo);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $aboutItem = array(
			        "aboutInfo"=>$aboutInfo
			        );
			    $result[] = $aboutItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

        public function selectXhzizhi()
		{
			$sql = "select aboutInfo from about where category='协会资质' ";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_result($aboutInfo);
			$stmt->execute();
			$stmt->store_result();
			$count = $stmt->num_rows();
			$result = null;
			while($stmt->fetch()){
			    $aboutItem = array(
			        "aboutInfo"=>$aboutInfo
			        );
			    $result[] = $aboutItem;
			}
			//关闭结果集
			$stmt->free_result();
			$stmt->close();
			$this->conn->close();
			return $result;
		}

		public function editXhjiagou($aboutInfo)
		{
			$sql="update about set  aboutInfo=? where category='组织架构'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$aboutInfo);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}

			public function editXhjianjie($aboutInfo)
		{
			$sql="update about set  aboutInfo=? where category='协会简介'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$aboutInfo);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}
        

			public function editXhlianxi($aboutInfo)
		{
			$sql="update about set  aboutInfo=? where category='联系协会'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$aboutInfo);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}
       

			public function editXhlingdao($aboutInfo)
		{
			$sql="update about set  aboutInfo=? where category='协会领导'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$aboutInfo);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}


			public function editXhzhangcheng($aboutInfo)
		{
			$sql="update about set  aboutInfo=? where category='协会章程'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$aboutInfo);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}


			public function editXhzizhi($aboutInfo)
		{
			$sql="update about set  aboutInfo=? where category='协会资质'";
			$stmt=$this->conn->prepare($sql);
			$stmt->bind_param("s",$aboutInfo);
			$stmt->execute();
			$stmt->close(); 
			$this->conn->close();
		}
	}