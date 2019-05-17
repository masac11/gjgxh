<?php
header('content-type: text/html; charset=utf-8');
	include_once '../model/Policy.class.php';
	$Policy = new Policy;
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
			return $Policy->selectAllPolicy();
			break;
		case 'edit':
		    $policyId = $_REQUEST['policyId'];
			$policyTitle = $_REQUEST['policyTitle'];
			if (!isset($_REQUEST['policyContent'])) {
				$policyContent = "";
			}else {
				$policyContent = $_REQUEST['policyContent'];
			}
			$policyTime = $_REQUEST['policyTime'];
			$Policy->editPolicy($policyId, $policyTitle, $policyContent, $policyTime);
			echo "<script>alert('保存成功');location.href='../page/policy/policyList.php';</script>";
			break;
		case 'del':
			$policyId = $_REQUEST['policyId'];
			$Policy->delPolicyByPolicyId($policyId);
			echo "<script>alert('删除成功');self.location=document.referrer;</script>";
			break;
		case 'add':
			$policyTitle = $_REQUEST['policyTitle'];
			if (!isset($_REQUEST['policyContent'])) {
				$policyContent = "";
			}else {
				$policyContent = $_REQUEST['policyContent'];
			}
			$policyTime = $_REQUEST['policyTime'];
			$Policy->addPolicy($policyTitle, $policyContent, $policyTime);
			echo "<script>alert('保存成功');location.href='../page/policy/policyList.php';</script>";
			break;
		default:
			break;
	}