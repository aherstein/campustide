<?php
require_once('../include/setup.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") // Process login
{
	$email = strtolower($_POST['email']);
	$password = $_POST['password'];
	
	// Validater login information
	$fields = array($email, sha1($password));
	$db->query("SELECT * FROM users WHERE lower(email) = $1 AND password = $2 AND active = 'TRUE'", $fields);
	if ($db->rows() == 1) // Log user in
	{
		$row = $db->fetch();
		$_SESSION['loggedin'] = true;
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['school_id'] = $row['school_id'];
		$_SESSION['email'] = $email;
		$_SESSION['admin'] = $row['admin'] == "t";
		
		$smarty->assign('loggedIn', true);
		$smarty->assign('admin', $_SESSION['admin']);
		include("profile/index.php");
	}
	else // Failed login
	{
		$smarty->assign('title', "Log In");
		$smarty->assign('errorMessage', "Incorrect login credentials!");
		$smarty->display('login.tpl');
	}	
}
else
{
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) // Logged in
	{
		include("profile/index.php");
	}
	else // Show login form
	{
		$smarty->assign('title', "Log In");
//		$smarty->assign('onload', "document.forms[0].email.select();");
		$smarty->display('login.tpl');
	}
}

require_once('../include/footer.php');
?>