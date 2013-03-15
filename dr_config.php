<?php
/**
 * FileName: 	dr_config.php
 * Summary:		admin user name and password configuration
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//update admin
if (!empty($_POST) && isset($_POST)) {
	$newAdminList = $_POST;
	$login->login_change($newAdminList);
}

//get admin information
$adminList = $login->list_admin();

//translate to smarty
$smarty->assign('adminList',$adminList);

//smarty display
$smarty->display('admin_config.html');
?>