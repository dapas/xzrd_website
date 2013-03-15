<?php
/**
 * FileName: 	dr_upload.php
 * Summary:		upload admin
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//upload resources
$dirName = "download/";
if (!empty($_FILES) && isset($_FILES)) {
	if ($_FILES['file']['name'] != "") {
		if( copy($_FILES['file']['tmp_name'], $dirName.$_FILES['file']['name']) ) {
			unlink($_FILES['file']['tmp_name']);
		}
	}
}

//list resources
$handle = opendir($dirName);
$software = array();
while ($file = readdir($handle)) {
	if ($file != "." && $file !="..") {
		$software[] = array("name"=>$file);
	}
}
closedir($handle);

//translate to smarty
$smarty->assign('softwareList',$software);

//smarty display
$smarty->display('admin_upload.html');
?>