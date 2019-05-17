<?php
	include_once '../model/Appraise.class.php';
	$Appraise = new Appraise;
	if(!isset($_REQUEST['mode'])){
		die('参数错误！');
	}
	$mode = $_REQUEST['mode'];
	//选择传递过来的参数并调用对应的方法
	// if($getVars['flag']!="selectAll"){
	// 		 if(!isset($_SESSION))
	// 					session_start();
	// 		 if (!isset($_SESSION['username']))
	// 					die("无权限");
	// }

	switch ($mode) {
		case 'selectAll': 
			return $Appraise->selectAllAppraise();
			break;
		case 'selectAllJj':
			return $News->selectAllNews("山东省钢结构金奖");
			break;
		case 'selectAllMx':
			return $News->selectAllNews("山东省钢结构行业明星企业");
			break;
		case 'selectAllYx':
			return $News->selectAllNews("山东省钢结构行业优秀企业家");
			break;
		case 'selectAllJl':
			return $News->selectAllNews("山东省钢结构行业优秀项目经理");
			break;
		case 'edit':
		    $appraise_id = $_REQUEST['appraise_id'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			if ($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png")
			  {
			  if ($_FILES["file"]["error"] > 0)
			    {
			    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			    }
			  else
			    {
			    date_default_timezone_set('PRC');
			    $arr = explode('.', $_FILES["file"]["name"]);
				$img_path = ($Appraise->getAppraiseByAppraiseId($appraise_id ))[0]['img_path'];

			    move_uploaded_file($_FILES["file"]["tmp_name"],"../../upload/" . $img_path);
			  }
			}
			else
			  {
			  	echo "<script>alert('只允许上传jpg/png文件');location.href='../page/appraise/appraiseList.php';</script>";
				break;
			  	die();
			  }
			$Appraise->editAppraise($appraise_id, $title, $content, $time);
			echo "<script>alert('保存成功');window.history.go(-1);</script>";
			break;
		case 'del':
			$appraise_id = $_REQUEST['appraise_id'];
			$img_path = ($Appraise->getAppraiseByAppraiseId($appraise_id ))[0]['img_path'];
			unlink("../../upload/" . $img_path);
			$Appraise->delAppraiseByAppraiseId($appraise_id);
			echo "<script>alert('删除成功');self.location=document.referrer;</script>";
			break;
		case 'addJj':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time']; 
			 if ($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png")
			  {
			  if ($_FILES["file"]["error"] > 0)
			    {
			    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			    }
			  else
			    {
			    date_default_timezone_set('PRC');
			    $arr = explode('.', $_FILES["file"]["name"]);
				$last = end($arr);
				$name = time();
				// $img_path = "http://".$_SERVER['HTTP_HOST'] . "/gjgxh/upload/" . $name . "." . $last;
				$img_path = $name . "." . $last;
			    move_uploaded_file($_FILES["file"]["tmp_name"],"../../upload/" . $name .".".$last);
			  }
			}
			else
			  {
			  	echo "<script>alert('只允许上传jpg/png文件');location.href='../page/jjappraise/jjappraiseList.php';</script>";
				break;
			  	die();
			  }

			$Appraise->addAppraise($title, $content, $time, $img_path, "山东省钢结构金奖");
			echo "<script>alert('保存成功');location.href='../page/jjappraise/jjappraiseList.php';</script>";
			break;
		case 'addMx':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time']; 
			 if ($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png")
			  {
			  if ($_FILES["file"]["error"] > 0)
			    {
			    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			    }
			  else
			    {
			    date_default_timezone_set('PRC');
			    $arr = explode('.', $_FILES["file"]["name"]);
				$last = end($arr);
				$name = time();
				// $img_path = "http://".$_SERVER['HTTP_HOST'] . "/gjgxh/upload/" . $name . "." . $last;
				$img_path = $name . "." . $last;
			    move_uploaded_file($_FILES["file"]["tmp_name"],"../../upload/" . $name .".".$last);
			  }
			}
			else
			  {
			  	echo "<script>alert('只允许上传jpg/png文件');location.href='../page/mxappraise/mxappraiseList.php';</script>";
				break;
			  	die();
			  }

			$Appraise->addAppraise($title, $content, $time, $img_path, "山东省钢结构行业明星企业");
			echo "<script>alert('保存成功');location.href='../page/mxappraise/mxappraiseList.php';</script>";
			break;
		case 'addYx':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time']; 
			 if ($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png")
			  {
			  if ($_FILES["file"]["error"] > 0)
			    {
			    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			    }
			  else
			    {
			    date_default_timezone_set('PRC');
			    $arr = explode('.', $_FILES["file"]["name"]);
				$last = end($arr);
				$name = time();
				// $img_path = "http://".$_SERVER['HTTP_HOST'] . "/gjgxh/upload/" . $name . "." . $last;
				$img_path = $name . "." . $last;
			    move_uploaded_file($_FILES["file"]["tmp_name"],"../../upload/" . $name .".".$last);
			  }
			}
			else
			  {
			  	echo "<script>alert('只允许上传jpg/png文件');location.href='../page/yxappraise/yxappraiseList.php';</script>";
				break;
			  	die();
			  }

			$Appraise->addAppraise($title, $content, $time, $img_path, "山东省钢结构行业优秀企业家");
			echo "<script>alert('保存成功');location.href='../page/yxappraise/yxappraiseList.php';</script>";
			break;
		case 'addJl':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time']; 
			 if ($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png")
			  {
			  if ($_FILES["file"]["error"] > 0)
			    {
			    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			    }
			  else
			    {
			    date_default_timezone_set('PRC');
			    $arr = explode('.', $_FILES["file"]["name"]);
				$last = end($arr);
				$name = time();
				// $img_path = "http://".$_SERVER['HTTP_HOST'] . "/gjgxh/upload/" . $name . "." . $last;
				$img_path = $name . "." . $last;
			    move_uploaded_file($_FILES["file"]["tmp_name"],"../../upload/" . $name .".".$last);
			  }
			}
			else
			  {
			  	echo "<script>alert('只允许上传jpg/png文件');location.href='../page/jlappraise/jlappraiseList.php';</script>";
				break;
			  	die();
			  }

			$Appraise->addAppraise($title, $content, $time, $img_path, "山东省钢结构行业优秀项目经理");
			echo "<script>alert('保存成功');location.href='../page/jlappraise/jlappraiseList.php';</script>";
			break;
		default:
			break;
	}