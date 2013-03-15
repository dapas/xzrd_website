<?php
/**
 * FileName: 	dr_activity_del.php
 * Summary:		activity delete
 * Author:		DingRen
 */

require_once('commom.php');

if (!isset($_SESSION['flag']) || $_SESSION['flag']==0) {
	header("Location: dr_login.php");
}

//delete selected resource
$dirName = "pic/";
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
$smarty->display('admin_activity_del.html');
?>