<?php
/**
 * FileName: 	dr_login.php
 * Summary:		login check
 * Author:		DingRen
 */

require_once('commom.php');

//login check
if (!empty($_POST) && isset($_POST)) {
	//$adminInfo = text_filter($_POST);
	//print_r($adminInfo);
	if($login->login_check_admin($_POST) == 1) {
		 $_SESSION['flag'] = 1;
		 header("Location: dr_admin.php");
	} else {
		$_SESSION['flag'] = 0;
	}
}

//smarty display
$smarty->display('login.html');

?>