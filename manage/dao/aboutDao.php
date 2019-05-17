<?php

header('content-type: text/html; charset=utf-8');
	include_once '../model/About.class.php';
	$About = new About;
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
			return $About->selectAllAbout();
			break;
		case 'selectXhjiagou':
		return $About->selectXhjiagou();
		break;

		case 'selectXhjianjie':
		return $About->selectXhjianjie();
		break;

		case 'selectXhlianxi':
		return $About->selectXhlianxi();
		break;

		case 'selectXhlingdao':
		return $About->selectXhlingdao();
		break;

		case 'selectXhzhangcheng':
		return $About->selectXhzhangcheng();
		break;

		case 'selectXhzizhi':
		return $About->selectXhzizhi();
		break;

		case 'editXhjiagou':
			if (!isset($_REQUEST['aboutInfo'])) {
				$aboutInfo = "";
			}else {
				$aboutInfo = $_REQUEST['aboutInfo'];
			}
			$About->editXhjiagou($aboutInfo);
			echo "<script type='text/jscript' charset='utf-8' >alert('保存成功');location.href='../page/xhjiagou/xhjiagou.php';</script>";
			break;
		case 'editXhjianjie':
			if (!isset($_REQUEST['aboutInfo'])) {
				$aboutInfo = "";
			}else {
				$aboutInfo = $_REQUEST['aboutInfo'];
			}
			$About->editXhjianjie($aboutInfo);
			echo "<script>alert('保存成功');location.href='../page/xhjianjie/xhjianjie.php';</script>";
		break;
		case 'editXhlianxi':
			if (!isset($_REQUEST['aboutInfo'])) {
				$aboutInfo = "";
			}else {
				$aboutInfo = $_REQUEST['aboutInfo'];
			}
			$About->editXhlianxi($aboutInfo);
			echo "<script>alert('保存成功');location.href='../page/xhlianxi/xhlianxi.php';</script>";
		break;
		case 'editXhlingdao':
			if (!isset($_REQUEST['aboutInfo'])) {
				$aboutInfo = "";
			}else {
				$aboutInfo = $_REQUEST['aboutInfo'];
			}
			$About->editXhlingdao($aboutInfo);
			echo "<script>alert('保存成功');location.href='../page/xhlingdao/xhlingdao.php';</script>";
		break;
		case 'editXhzhangcheng':
			if (!isset($_REQUEST['aboutInfo'])) {
				$aboutInfo = "";
			}else {
				$aboutInfo = $_REQUEST['aboutInfo'];
			}
			$About->editXhzhangcheng($aboutInfo);
			echo "<script>alert('保存成功');location.href='../page/xhzhangcheng/xhzhangcheng.php';</script>";
		break;
		case 'editXhzizhi':
			if (!isset($_REQUEST['aboutInfo'])) {
				$aboutInfo = "";
			}else {
				$aboutInfo = $_REQUEST['aboutInfo'];
			}
			$About->editXhzizhi($aboutInfo);
			echo "<script>alert('保存成功');location.href='../page/xhzizhi/xhzizhi.php';</script>";
		break;
	
		default:
			break;
	}