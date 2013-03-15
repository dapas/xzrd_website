<?php
/**
 * FileName: 	download.php
 * Summary:		software resource download
 * Author:		DingRen
 */

require_once('commom.php');

//list software resource
$software = array();
$dirName = "download/";
$handle = opendir($dirName);
while ($file = readdir($handle)) {
	if ($file != "." && $file !="..") {
		$software[] = array("name"=>$file);
	}
}
closedir($handle);

//download selected software
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

//translate to smarty
$smarty->assign('softwareList',$software);

//smarty display
$smarty->display('download.html');

?>