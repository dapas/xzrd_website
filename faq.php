<?php
/**
 * FileName: 	faq.php
 * Summary:		faq
 * Author:		DingRen
 */

require_once('commom.php');

//post a question
if (!empty($_POST) &&isset($_POST)) {
	$question1 = text_filter($_POST['question']);
	$comment->insert_content($question1);
}

//get faq
$faqList = $comment->list_faq();

//translate to smarty
$smarty->assign('faqList',$faqList);

//smarty display
$smarty->display('faq.html');
?>