<?php
	include_once '../model/companyNews.class.php';
	$companyNews = new companyNews;
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
			return $companyNews->selectAllcompanyNews();
			break;
		case 'edit':
		    $companyNewsId = $_REQUEST['companyNewsId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$companyNews->editcompanyNews($companyNewsId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/companyNews/companyNewsList.php';</script>";
			break;
		case 'del':
			$companyNewsId = $_REQUEST['companyNewsId'];
			$companyNews->delcompanyNewsBycompanyNewsId($companyNewsId);
			echo "<script>alert('删除成功');self.location=document.referrer;</script>";
			break;
		case 'add':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$companyNews->addcompanyNews($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/companyNews/companyNewsList.php';</script>";
			break;
		default:
			break;
	}