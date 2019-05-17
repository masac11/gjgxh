<?php
	include_once '../model/companyStyle.class.php';
	$companyStyle = new companyStyle;
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
			return $companyStyle->selectAllcompanyStyle();
			break;
		case 'edit':
		    $companyStyleId = $_REQUEST['companyStyleId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$companyStyle->editcompanyStyle($companyStyleId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/companyStyle/companyStyleList.php';</script>";
			break;
		case 'del':
			$companyStyleId = $_REQUEST['companyStyleId'];
			$companyStyle->delcompanyStyleBycompanyStyleId($companyStyleId);
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
			$companyStyle->addcompanyStyle($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/companyStyle/companyStyleList.php';</script>";
			break;
		default:
			break;
	}