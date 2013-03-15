<?php
/**
 * FileName: 	activity.php
 * Summary:		stuff activity
 * Author:		DingRen
 */

require_once('commom.php');


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
$smarty->display('activity.html');
?>