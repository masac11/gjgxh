<?php
	include_once '../model/Law.class.php';
	$Law = new Law;
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

		case 'selectAllLaw':
			return $Law->selectAllLaw();
			break;
		case 'addLaw':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Law->addLaw($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/law/LawList.php';</script>";
			break;
		case 'editLaw':
		    $lawId = $_REQUEST['lawId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Law->editLaw($lawId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/law/LawList.php';</script>";
			break;
		
		case 'del':
			$lawId = $_REQUEST['lawId'];
			$Law->delLawByLawId($lawId);
			echo "<script>alert('删除成功');self.location=document.referrer;</script>";
			break;
		
		default:
			break;
	}