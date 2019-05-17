<?php
	include_once '../model/facilities.class.php';
	$facilities = new facilities;
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
			return $facilities->selectAllfacilities();
			break;
		case 'edit':
		    $facilitiesId = $_REQUEST['facilitiesId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$facilities->editfacilities($facilitiesId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/facilities/facilitiesList.php';</script>";
			break;
		case 'del':
			$facilitiesId = $_REQUEST['facilitiesId'];
			$facilities->delfacilitiesByfacilitiesId($facilitiesId);
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
			$facilities->addfacilities($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/facilities/facilitiesList.php';</script>";
			break;
		default:
			break;
	}