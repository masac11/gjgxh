<?php
	include_once '../model/Leaguer.class.php';
	$Leaguer = new Leaguer;
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
//会员
		case 'selectAllLea':
			return $Leaguer->selectAllLea();
			break;
		case 'addLea':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Leaguer->addLea($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/leaguer/leaguerList.php';</script>";
			break;
		case 'editLea':
		    $leaguerId = $_REQUEST['leaguerId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Leaguer->editLeaguer($leaguerId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/leaguer/leaguerList.php';</script>";
			break;
//副会长
		case 'selectAllPre':
			return $Leaguer->selectAllPre();
			break;
		case 'addPre':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Leaguer->addPre($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/president/presidentList.php';</script>";
			break;
		case 'editPre':
		    $leaguerId = $_REQUEST['leaguerId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Leaguer->editLeaguer($leaguerId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/president/presidentList.php';</script>";
			break;

//常务理事
		case 'selectAllRout':
			return $Leaguer->selectAllRout();
			break;
		case 'addRout':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Leaguer->addRout($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/routine/routineList.php';</script>";
			break;
		case 'editRout':
		    $leaguerId = $_REQUEST['leaguerId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Leaguer->editLeaguer($leaguerId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/routine/routineList.php';</script>";
			break;

//理事
		case 'selectAllDir':
			return $Leaguer->selectAllDir();
			break;
		case 'addDir':
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Leaguer->addDir($title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/director/directorList.php';</script>";
			break;
		case 'editDir':
		    $leaguerId = $_REQUEST['leaguerId'];
			$title = $_REQUEST['title'];
			if (!isset($_REQUEST['content'])) {
				$content = "";
			}else {
				$content = $_REQUEST['content'];
			}
			$time = $_REQUEST['time'];
			$Leaguer->editLeaguer($leaguerId, $title, $content, $time);
			echo "<script>alert('保存成功');location.href='../page/director/directorList.php';</script>";
			break;

		
		case 'del':
			$leaguerId = $_REQUEST['leaguerId'];
			$Leaguer->delLeaguerByLeaguerId($leaguerId);
			echo "<script>alert('删除成功');self.location=document.referrer;</script>";
			break;
		
		default:
			break;
	}