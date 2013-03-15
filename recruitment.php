<?php
/**
 * FileName: 	recruitment.php
 * Summary:		recruitment
 * Author:		DingRen
 */

require_once('commom.php');

//get job information
$recruitment = $hunter->list_jobs();

//translate to smarty
$smarty->assign('jobList',$recruitment);

//smarty display
$smarty->display('recruitment.html');
?>