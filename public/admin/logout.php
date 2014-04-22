<?php
require_once('../../include/setup.php');

$_SESSION = array();
if (ini_get("session.use_cookies"))
{
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

session_destroy();

$smarty->assign('loggedIn', false);
$smarty->assign('adminLoggedIn', false);
include('../index.php');
	
require_once('../../include/footer.php');
?>