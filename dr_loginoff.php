<?php
/**
 * FileName: 	dr_loginoff.php
 * Summary:		login off
 * Author:		DingRen
 */

require_once('commom.php');

//login check
if (!empty($_GET) && isset($_GET)) {
	if ($_GET['unsession'] == 1) {
		$_SESSION['flag'] = 0;
		session_destroy();

		header("Location: dr_admin.php");
	}
}

?>