<?php
require_once('../../include/setup.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) // Logged in
{
	$smarty->assign('title', "Edit Account");
	$smarty->assign('userID', $_SESSION['user_id']);
	
	// Get all types
	$db->query("SELECT type_id, description FROM types ORDER BY description ASC");
	
	$types = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$types[$i]['type_id'] = $row['type_id'];
		$types[$i]['description'] = $row['description'];
	}
	
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_id = strip_tags($_SESSION['user_id']);
		$name = strip_tags($_POST['name']);
		$email = strip_tags($_POST['email']);
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$type = strip_tags($_POST['type']);
		$school = strip_tags($_POST['school']);
		
		// Set smarty variables to remember inputs
		$smarty->assign('name', $name);
		$smarty->assign('email', $email);
		$smarty->assign('type', $type);
		$smarty->assign('school', $school);
		$smarty->assign('types', $types);
		$smarty->assign('onload', "setSelected('type', '". $type ."')");
		$smarty->assign('profilePic', getProfilePic());
		
		
		//TODO Validate input fields
		if ($email =="")
		{
			$smarty->assign('errorMessage', "E-Mail cannot be blank!");
			$smarty->display('profile/editAccount.tpl');
		}
		else if (preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email) == 0)
		{
			$smarty->assign('errorMessage', $email . " is not a valid e-mail!");
			$smarty->display('profile/editAccount.tpl');
		}
		else if ($password1 == "" && $password2 == "")
		{
			$fields = array($user_id, $name, $email, $type);
			$db->query("UPDATE users SET name = $2, email = $3, type_id = $4 WHERE user_id = $1", $fields);
			
			$smarty->assign('message', "Account updated!");
			include("index.php");
		}
		else if ($password1 != $password2)
		{
			$smarty->assign('errorMessage', "Passwords do not match!");
			$smarty->display('profile/editAccount.tpl');
		}
		else
		{
			$password = sha1($password1);
			$fields = array($user_id, $name, $email, $type, $password);
			$db->query("UPDATE users SET name = $2, email = $3, type_id = $4, password = $5 WHERE user_id = $1", $fields);
			
			$smarty->assign('message', "Account updated!");
			include("index.php");
		}
	}
	else
	{
		$fields = array($_SESSION['user_id']);
		$db->query("SELECT users.name AS name, users.email AS email, users.type_id AS type, schools.name AS school FROM users, schools WHERE user_id = $1 AND users.school_id = schools.school_id", $fields);
		$row = $db->fetch();
		
		$name = $row['name'];
		$email = $row['email'];
		$type = $row['type'];
		$school = $row['school'];
		
		$smarty->assign('name', $name);
		$smarty->assign('email', $email);
		$smarty->assign('type', $type);
		$smarty->assign('school', $school);
		$smarty->assign('additionalSchools', getAdditionalSchools($_SESSION['user_id']));
		$smarty->assign('types', $types);
		$smarty->assign('onload', "setSelected('type', '". $type ."')");
		$smarty->assign('profilePic', getProfilePic());
		$smarty->display('profile/editAccount.tpl');
	}
}
else
{
	include("../login.php");
}
		
require_once('../../include/footer.php');
?>