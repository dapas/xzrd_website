<?php
/**
 * FileName: 	dr_hunter.php
 * Summary:		admin hunter
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//update job information
if (!empty($_POST) && isset($_POST)) {
	$newJobList = $_POST;
	$hunter->insert_job($newJobList);
}

//get job information
$recruitment = $hunter->list_jobs();

//translate to smarty
$smarty->assign('jobList',$recruitment);

//smarty display
$smarty->display('admin_hunter.html');
?>