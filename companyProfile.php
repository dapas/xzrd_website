<?php
/**
 * FileName: 	companyProfile.php
 * Summary:		conpany profile
 * Author:		DingRen
 */

require_once('commom.php');

//get company information
$profileList = $profile->list_company();

//translate to smarty
$smarty->assign('profileList',$profileList);

//smarty display
$smarty->display('companyProfile.html');
?>