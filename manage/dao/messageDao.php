<?php
	include_once '../model/Message.class.php';
	$Message = new Message;
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
			return $Message->selectAllMessage();
			break;
		case 'edit':
		    $messageId = $_REQUEST['messageId'];
			$messageTitle = $_REQUEST['messageTitle'];
			if (!isset($_REQUEST['messageContent'])) {
				$messageContent = "";
			}else {
				$messageContent = $_REQUEST['messageContent'];
			}
			$messageTime = $_REQUEST['messageTime'];
			$Message->editMessage($messageId,$messageTitle,$messageContent,$messageTime);
			echo "<script>alert('保存成功');location.href='../page/message/messageList.php';</script>";
			break;
		case 'del':
			$messageId = $_REQUEST['messageId'];
			$Message->delMessageByMessageId($messageId);
			echo "<script>alert('删除成功');self.location=document.referrer;</script>";
			break;
		case 'add':
			$messageTitle = $_REQUEST['messageTitle'];
			if (!isset($_REQUEST['messageContent'])) {
				$messageContent = "";
			}else {
				$messageContent = $_REQUEST['messageContent'];
			}
			$messageTime = $_REQUEST['messageTime'];
			$Message->addMessage($messageTitle, $messageContent, $messageTime);
			echo "<script>alert('保存成功');location.href='../page/message/messageList.php';</script>";
			break;
		default:
			break;
	}