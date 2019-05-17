<?php
	include_once '../model/Admission.class.php';
	$Admission = new Admission;
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
			return $Admission->selectAllProcedure();
			break;
		case 'editProcedure':
			$admissionId = $_REQUEST['admissionId'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			/*$category = $_REQUEST['category'];*/
			$Admission->editProcedure($admissionId,$content);
			echo "<script>alert('保存成功');location.href='../page/procedure/procedureEdit.php';</script>";
			break;

			case 'selectAllTable':
			return $Admission->selectAllTable();
			break;
		case 'editTable':
			$admissionId = $_REQUEST['admissionId'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			/*$category = $_REQUEST['category'];*/
			$Admission->editTable($admissionId,$content);
			echo "<script>alert('保存成功');location.href='../page/table/tableEdit.php';</script>";
			break;

		default:
			break;
	}