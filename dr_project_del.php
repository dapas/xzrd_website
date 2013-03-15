<?php
/**
 * FileName: 	dr_project_del.php
 * Summary:		faq
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//delete selected project
if (!empty($_POST) && isset($_POST)) {
	$project->drop_project($_POST['Del']);
}

//get projects
$projectList = $project->list_project();

//translate to smarty
$smarty->assign('projectList',$projectList);

//smarty display
$smarty->display('admin_project_del.html');
?>