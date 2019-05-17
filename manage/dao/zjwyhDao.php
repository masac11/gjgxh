<?php
	include_once '../model/Zjwyh.class.php';
	$Zjwyh = new Zjwyh;
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
		case 'selectAllProcedure':
			return $Zjwyh->selectAllProcedure();
			break;
		case 'editZjglbf':
			$admissionId = $_REQUEST['admissionId'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			/*$category = $_REQUEST['category'];*/
			$Zjwyh->editProcedure($admissionId,$content);
			echo "<script>alert('保存成功');location.href='../page/zjglbf/zjglbfEdit.php';</script>";
			break;

			case 'selectAllTable':
			return $Zjwyh->selectAllTable();
			break;
		case 'editZjsqb':
			$admissionId = $_REQUEST['admissionId'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			/*$category = $_REQUEST['category'];*/
			$Zjwyh->editTable($admissionId,$content);
			echo "<script>alert('保存成功');location.href='../page/zjsqb/zjsqbEdit.php';</script>";
			break;

		default:
			break;
	}