<?php
/**
 * FileName: 	projectIntroduction.php
 * Summary:		project introduction
 * Author:		DingRen
 */

require_once('commom.php');

//get projects
$projectList = $project->list_project();

//translate to smarty
$smarty->assign('projectList',$projectList);

//smarty display
$smarty->display('projectIntroduction.html');
?>