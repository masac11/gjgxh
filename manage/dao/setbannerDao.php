<?php
	include_once '../model/SetBanner.class.php';
	$setBanner = new SetBanner();
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
		case 'edit':
		    $id = $_REQUEST['id'];

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
				$img_path = "../../images/banner-".$id.".png";

			    move_uploaded_file($_FILES["file"]["tmp_name"], $img_path);
			  }
			}
			else
			  {
			  	echo "<script>alert('只允许上传jpg/png文件');location.href='../page/setbanner/setbannerList.php';</script>";
				break;
			  	die();
			  }
			echo "<script>alert('保存成功');window.history.go(-1);</script>";
			break;
		case 'editTitle':
		    $id = $_REQUEST['id'];
			$title = $_REQUEST['title'];
			$setBanner->editBanner($id, $title);
			echo "<script>alert('保存成功');window.history.go(-1);</script>";
			break;
		case 'del':
			$id = $_REQUEST['id'];
			$img_path = ($setBanner->getsetBannerBysetBannerId($id ))[0]['img_path'];
			unlink("../../upload/" . $img_path);
			$setBanner->delsetBannerBysetBannerId($id);
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

			$setBanner->addsetBanner($title, $content, $time, $img_path, "山东省钢结构金奖");
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

			$setBanner->addsetBanner($title, $content, $time, $img_path, "山东省钢结构行业明星企业");
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

			$setBanner->addsetBanner($title, $content, $time, $img_path, "山东省钢结构行业优秀企业家");
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

			$setBanner->addsetBanner($title, $content, $time, $img_path, "山东省钢结构行业优秀项目经理");
			echo "<script>alert('保存成功');location.href='../page/jlappraise/jlappraiseList.php';</script>";
			break;
		default:
			break;
	}