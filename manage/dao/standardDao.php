<?php
	include_once '../model/Standard.class.php';
	$Standard = new Standard;
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
			return $Standard->selectAllStandard();
			break;
		case 'edit':
		    $standardId = $_REQUEST['standardId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Standard->editStandard($standardId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/standard/standardList.php';</script>";
			break;
		case 'del':
			$standardId = $_REQUEST['standardId'];
			$Standard->delStandardByStandardId($standardId);
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
			$Standard->addStandard($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/standard/standardList.php';</script>";
			break;
		default:
			break;
	}