<?php
/**
 * FileName: 	dr_hunter_del.php
 * Summary:		job delete
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag'] == 0) {
	header("Location: dr_login.php");
}

//delete selected job
if (!empty($_POST) && isset($_POST)) {
	$hunter->drop_job($_POST['Del']);
}

//get job information
$recruitment = $hunter->list_jobs();

//translate to smarty
$smarty->assign('jobList',$recruitment);

//smarty display
$smarty->display('admin_hunter_del.html');
?>