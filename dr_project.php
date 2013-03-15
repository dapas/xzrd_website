<?php
/**
 * FileName: 	dr_project.php
 * Summary:		project admin
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//update project
if (!empty($_POST) && isset($_POST)) {
	$newProjectList = $_POST;
	$project->insert_project($newProjectList);
}

//get projects
$projectList = $project->list_project();

//translate to smarty
$smarty->assign('projectList',$projectList);

//smarty display
$smarty->display('admin_project.html');
?>