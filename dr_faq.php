<?php
/**
 * FileName: 	dr_faq.php
 * Summary:		answer faq
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//update faq
if (!empty($_POST) && isset($_POST)) {
	$newFaqList = $_POST;
	$comment->answer_content($newFaqList, $newFaqList['Save']);
}

//get faq
$faqList = $comment->list_faq();

//translate to smarty
$smarty->assign('faqList',$faqList);

//smarty display
$smarty->display('admin_faq.html');
?>