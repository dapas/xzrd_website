<?php
/**
 * FileName: 	index.php
 * Summary:		conpany index
 * Author:		DingRen
 */

require_once('commom.php');

//get software resource
$softwareTop6 = array();

$dirName = "download/";
$handle = opendir($dirName);
while ($file = readdir($handle)) {
	if ($file != "." && $file !="..") {
		$softwareTop6[] = array("name"=>$file);
	}
}
closedir($handle);

//download software
if (!empty($_GET) &&isset($_GET)) {
	if (file_exists($dirName.$_GET['file'])){	
		$file=fopen($dirName.$_GET['file'],"r");
         Header("Content-type:application/octet-stream");
         Header("Accept-Ranges:bytes");
         Header("Content-Disposition:attachment;filename=".$_GET['file']);
         echo fread($file,filesize($dirName.$_GET['file']));
         fclose($file);
     }else{
         echo "file is not exists";
     }
}

//get company information
$profileList = $profile->list_company();

//translate to smarty
$smarty->assign('profileList',$profileList);
$smarty->assign('softwareTop6List',$softwareTop6);

//smarty display
$smarty->display('index.html');
?>
