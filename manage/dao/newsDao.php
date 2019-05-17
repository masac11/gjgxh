<?php
	include_once '../model/News.class.php';
	$News = new News;
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
		case 'selectAllHyNews':
			return $News->selectAllAppraise("行业动态");
			break;
		case 'selectAllXhNews':
			return $News->selectAllAppraise("协会动态");
			break;
		case 'selectAllGgNews':
			return $News->selectAllAppraise("通知公告");
			break;
		case 'edit':
		    $newsId = $_REQUEST['newsId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$News->editNews($newsId, $title, $content, $time);
			echo "<script>alert('保存成功');window.history.go(-1);</script>";
			break;
		case 'del':
			$newsId = $_REQUEST['newsId'];
			$News->delNewsByNewsId($newsId);
			echo "<script>alert('删除成功');self.location=document.referrer;</script>";
			break;
		case 'addHyNews':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$News->addNews($title, $content, $time, "行业动态");
			echo "<script>alert('保存成功');location.href='../page/hynews/hynewsList.php';</script>";
			break;
		case 'addGgNews':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$News->addNews($title, $content, $time, "通知公告");
			echo "<script>alert('保存成功');location.href='../page/ggnews/ggnewsList.php';</script>";
			break;
		case 'addXhNews':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$News->addNews($title, $content, $time, "协会动态");
			echo "<script>alert('保存成功');location.href='../page/xhnews/xhnewsList.php';</script>";
			break;
		default:
			break;
	}