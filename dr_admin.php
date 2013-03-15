<?php
/**
 * FileName: 	dr_admin.php
 * Summary:		admin
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//update company profile
if (!empty($_POST) && isset($_POST)) {
	$newProfileList = $_POST;
	$profile->update_company($newProfileList);
}

//get company information
$profileList = $profile->list_company();

//translate to smarty
$smarty->assign('profileList',$profileList);

//smarty display
$smarty->display('admin_index.html');
?>