<?php
/**
 * FileName: 	dr_faq_del.php
 * Summary:		admin faq del
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//drop selected faq
if (!empty($_POST) && isset($_POST)) {
	$comment->drop_content($_POST['Del']);
}

//get faq
$faqList = $comment->list_faq();

//translate to smarty
$smarty->assign('faqList',$faqList);

//smarty display
$smarty->display('admin_faq_del.html');
?>