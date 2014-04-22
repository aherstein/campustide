<?php
require_once('../../include/setup.php');

$smarty->assign('title', "Delete Profile");
$smarty->assign('userID', $_SESSION['user_id']);
$smarty->assign('profilePic', getProfilePic());

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$userID = $_SESSION['user_id'];
	
	$fields = array($userID);
	$db->query("DELETE FROM users WHERE user_id = $1", $fields);
	
	// Delete session
	$_SESSION = array();
	if (ini_get("session.use_cookies"))
	{
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	}
	
	session_destroy();
	
	$smarty->assign('loggedIn', false);
	
	
	$smarty->assign('profileDeleted', true);
}
else
{
	$smarty->assign('profileDeleted', false);
}

$smarty->display('profile/deleteProfile.tpl');

require_once('../../include/footer.php');
?>