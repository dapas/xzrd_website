<?php
/**
 * FileName: 	config.inc.php
 * Summary:		configuration of xzrd	
 * Author:		DingRen
 */

//Global
define("ROOT_URL","/xzrd/");		//root url
define("ROOT",str_replace('\\','/',dirname(__FILE__)) . '/');
define('UPLOAD_DIR',ROOT.'pic');
define('UPLOAD_URL',ROOT_URL.'pic/upload/');

//MySQL configure
define("MYSQL_HOST","localhost");	//database host
define("MYSQL_USER","root");		//mysql database user name·
define("MYSQL_PASSWORD","");		//mysql database password
define("MYSQL_DATEBASE","dr_xzrd");	//database name
define("MYSQL_PREFIX","");			//xzrd database prefix

?>
