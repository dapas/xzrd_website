<?php
/**
 * FileName: 	dr_upload_del.php
 * Summary:		resource delete
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//delete selected resource
$dirName = "download/";
if (!empty($_POST) && isset($_POST)) {
	$dh=opendir($dirName);
	while ($file=readdir($dh)) {
		if ($file != "." && $file !="..") {
			$fullpath=$dirName."/".$file;
			if($file ==$_POST['delete']) {
				unlink($fullpath);
			}
		}
	}
	closedir($dh);
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
$smarty->display('admin_upload_del.html');
?>