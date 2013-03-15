<?php
/**
 * FileName: 	common.php
 * Summary:		initialize system
 * Author:		DingRen
 */
//error_reporting(0);
//set session life time 10 mins
$lifeTime = 600; 
session_set_cookie_params($lifeTime);
session_start();

//configuration
require_once 'config.inc.php';
//smarty template
require_once 'smarty/Smarty.class.php';
//company profile
require_once 'lib/profile.php';
//faq
require_once 'lib/comment.php';
//prject
require_once 'lib/project.php';
//job offer
require_once 'lib/hunter.php';
//database management
require_once 'lib/mysql.php';
//login
require_once 'lib/login.class.php';
//function
require_once 'lib/function.php';

//create a Smarty object
$smarty = new Smarty();
//set Smarty view directory
$smarty->template_dir =   dirname(__FILE__) . '/templates/';
//set Smarty compiled directory 
$smarty->compile_dir = dirname(__FILE__) .'/templates_c/';

//construct and initialize a database object
$db = new mysql(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATEBASE);

//company information
$profile = new profile($db);
//faqs
$comment = new comment($db);
//projects
$project = new project($db);
//job offers
$hunter = new hunter($db);

//admin
$login = new login($db);
?>
