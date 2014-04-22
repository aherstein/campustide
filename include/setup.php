<?php
$timeStart = microtime(true);

// Set error reporting
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);


$BASE_PATH = "/home/adamhers/www/campustide"; // No trailing slash

require_once("$BASE_PATH/lib/Database.php");
require_once("$BASE_PATH/Smarty-3.1.7/libs/Smarty.class.php");
require_once("$BASE_PATH/include/functions.php");
$db = new Database();
$smarty = new Smarty();

$smarty->template_dir = "$BASE_PATH/templates/";
$smarty->compile_dir  = "$BASE_PATH/templates_c/";
$smarty->config_dir   = "$BASE_PATH/configs/";
$smarty->cache_dir    = "$BASE_PATH/cache/";

// Default smarty variables
$smarty->assign('title', "CampusTide");
$smarty->assign('onload', "");
$smarty->assign('errorMessage', "");
$smarty->assign('message', "");
$smarty->assign('metaKeywords', "");
$smarty->assign('metaDescription', "");


// Global Constants
define("UPLOAD_PATH", "$BASE_PATH/public/images/profile/");
define("UPLOAD_PATH_EVENTS", "$BASE_PATH/public/images/events/");
define("UPLOAD_PATH_LOGOS", "$BASE_PATH/public/images/logos/");
define("MAX_UPLOAD_SIZE", 1500000);
define("MAX_LOGO_WIDTH", 500); // Maximum width for uploaded school logo
define("MAX_LOGO_HEIGHT", 100); // Maximum height for uploaded school logo
define("DEBUG", false);

session_start();

date_default_timezone_set('America/Chicago');

$smarty->assign('loggedIn', isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true); // Check if logged in
$smarty->assign('adminLoggedIn', isset($_SESSION['adminLoggedIn']) && $_SESSION['adminLoggedIn'] == true); // Check if admin logged in
$smarty->assign('admin', isset($_SESSION['admin']) && $_SESSION['admin'] == true); // Check if admin
$smarty->assign('section', "");
?>
