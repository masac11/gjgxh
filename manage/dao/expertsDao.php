<?php
	include_once '../model/experts.class.php';
	$experts = new experts;
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
			return $experts->selectAllexperts();
			break;
		case 'edit':
		    $expertsId = $_REQUEST['expertsId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$experts->editexperts($expertsId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/experts/expertsList.php';</script>";
			break;
		case 'del':
			$expertsId = $_REQUEST['expertsId'];
			$experts->delexpertsByexpertsId($expertsId);
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
			$experts->addexperts($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/experts/expertsList.php';</script>";
			break;
		default:
			break;
	}