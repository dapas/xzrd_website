<?php
/**
 * FileName: 	dr_activity.php
 * Summary:		activity admin
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//upload resources
$dirName = "pic/";
if (!empty($_FILES) && isset($_FILES)) {
	if ($_FILES['file']['name'] != "") {
		if( copy($_FILES['file']['tmp_name'], $dirName.$_FILES['file']['name']) ) {
			unlink($_FILES['file']['tmp_name']);
		}
	}
}

//list activities
$picture = array();
$dirName = "pic/";
$handle = opendir($dirName);
while ($file = readdir($handle)) {
	if ($file != "." && $file !="..") {
		$tags = preg_split('/[.]/', $file);
		$picture[] = array("name"=>$file,"title"=>$tags[0]);
	}
}
closedir($handle);

//get activities
$actList = $picture;

//translate to smarty
$smarty->assign('actList',$actList);

//smarty display
$smarty->display('admin_activity.html');
?>