<?php
require_once("/home/adamhers/www/campustide/include/setup.php");

$smarty->assign('section', "admin");

if ($_SERVER['REQUEST_METHOD'] == "POST") // Process login
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// Validater login information
	$fields = array($email, sha1($password));
	$db->query("SELECT user_id, school_id, name FROM users WHERE email = $1 AND password = $2 AND admin = 't'", $fields);
	if ($db->rows() == 1) // Log user in
	{
		$row = $db->fetch();
		$_SESSION['adminLoggedIn'] = true;
		$_SESSION['adminUserID'] = $row['user_id'];
		$_SESSION['adminSchoolID'] = $row['school_id'];
		$_SESSION['adminName'] = $row['name'];
		
		$smarty->assign('title', "Admin Home");
		$smarty->assign('adminName', $_SESSION['adminName']);
		$smarty->assign('adminLoggedIn', true);
		$smarty->display('admin/index.tpl');
	}
	else // Failed login
	{
		$smarty->assign('title', "Log In");
//		$smarty->assign('onload', "document.forms[0].password.focus();");
		$smarty->assign('autofocus', "password");
		$smarty->assign('errorMessage', "Incorrect login credentials!");
		$smarty->assign('email', $_SESSION['email']);
		$smarty->display('admin/login.tpl');
	}	
}
else if (isset($_SESSION['adminLoggedIn']) && $_SESSION['adminLoggedIn'] == true) // Logged in
{
	$smarty->assign('title', "Admin Home");
	$smarty->assign('adminName', $_SESSION['adminName']);
	$smarty->display('admin/index.tpl');
}
else // Show login form
{
	$smarty->assign('title', "Log In");
	if (isset($_SESSION['email']))
	{	
//		$smarty->assign('onload', "document.forms[0].password.focus();");
		$smarty->assign('autofocus', "password");
		$smarty->assign('message', "Please re-enter your password to access the admin control panel.");
		$smarty->assign('email', $_SESSION['email']);
	}
	else
	{
		$smarty->assign('email', "");
//		$smarty->assign('onload', "document.forms[0].email.focus();");
		$smarty->assign('autofocus', "email");
	}
	$smarty->display('admin/login.tpl');
}

require_once("$BASE_PATH/include/footer.php");
?>
