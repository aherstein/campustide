<?php
require_once('../../include/setup.php');

$smarty->assign('section', "admin");
if (isset($_SESSION['adminName'])) $smarty->assign('adminName', $_SESSION['adminName']);

function showUsersListPage()
{
	global $smarty;
	
	$smarty->assign('schools', getAllSchools());
	
	if (isset($_GET['id']) && !(isset($_GET['a']) && $_GET['a'] == "delete"))
	{
		$users = listUsers($_GET['id']);
		$smarty->assign('school_id', $_GET['id']);

	}
	else
	{
		$users = listUsers();
		$smarty->assign('school_id', 0);

	}
	
	$smarty->assign('title', "Users");
	$smarty->assign('users', $users);
	$smarty->assign('onload', "setSchool();");
	$smarty->assign('total', count($users));
	$smarty->display('admin/usersList.tpl');
}


function listUsers($school_id = "")
{
	global $db;
	
	if ($school_id == "")
	{
		$db->query("SELECT users.user_id, 
						schools.name AS school_name, 
						users.email, 
						users.name AS user_name,
						users.phone,
						users.active, 
						users.admin,
						to_char(users.created_date, 'Mon dd, yyyy hh:mi am') AS created_date
						FROM users, schools 
						WHERE users.school_id = schools.school_id 
						ORDER BY schools.name, users.created_date ASC");
	}
	else
	{
		$fields = array($school_id);
		$db->query("SELECT users.user_id, 
						schools.name AS school_name, 
						users.email, 
						users.name AS user_name,
						users.phone,
						users.active, 
						users.admin,
						to_char(users.created_date, 'Mon dd, yyyy hh:mi am') AS created_date
						FROM users, schools 
						WHERE users.school_id = schools.school_id AND users.school_id = $1 
						ORDER BY users.created_date ASC", $fields);
	}
	
	$users = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$users[$i]['user_id'] = $row['user_id'];
		$users[$i]['school_name'] = $row['school_name'];
		$users[$i]['email'] = $row['email'];
		$users[$i]['user_name'] = $row['user_name'];
		$users[$i]['phone'] = $row['phone'];
		$users[$i]['active'] = $row['active'];
		$users[$i]['admin'] = $row['admin'];
		$users[$i]['created_date'] = $row['created_date'];
	}
	
	return $users;
}


function getAllSchools()
{
	global $db;
	
	$db->query("SELECT school_id, name FROM schools ORDER BY name ASC");
			
	$schools = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$schools[$i]['school_id'] = $row['school_id'];
		$schools[$i]['name'] = $row['name'];
	}
	
	return $schools;
}


function getAllTypes()
{
	global $db;
	
	$db->query("SELECT type_id, description FROM types ORDER BY description ASC");
	
	$types = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$types[$i]['type_id'] = $row['type_id'];
		$types[$i]['description'] = $row['description'];
	}
	
	return $types;
}


$action = isset($_GET['a']) ? $_GET['a'] : "";

if (isset($_SESSION['adminLoggedIn']) && $_SESSION['adminLoggedIn'] == true) // Logged in
{
	$user_id = $_SESSION['adminUserID'];
	
	// Check for admin access
	$fields = array($user_id);
	$db->query("SELECT admin FROM users WHERE user_id = $1", $fields);
	$row = $db->fetch();
	if ($row['admin'] == "f")
	{
		$smarty->assign('title', "Edit User");
		$smarty->assign('errorMessage', "You do not have the proper privileges!");
		$smarty->display('error.tpl');
	}
	else
	{	
		if ($action == "edit")
		{
			if ($_SERVER['REQUEST_METHOD'] == "POST")
			{	
				//TODO Validate input fields
				
				$active = isset($_POST['active']) && $_POST['active'] == 'true' ? 't' : 'f';
				$admin = isset($_POST['admin']) && $_POST['admin'] == 'true' ? 't' : 'f';
				
				if ($_POST['password'] == "") // Do not change password
				{
					$fields = array($_POST['name'], $_POST['email'], $_POST['address'], $_POST['address2'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['about'], $active, $admin, $_POST['type'], $_POST['school'], $_POST['userID'], $_POST['phone'], $_POST['url']);
					$db->query("UPDATE users SET name = $1, email = $2, address = $3, address2 = $4, city = $5, state = $6, zip = $7, phone = $14, url = $15, about = $8, active = $9, admin = $10, type_id = $11, school_id = $12 WHERE user_id = $13", $fields);
				}
				else // change password
				{
					$fields = array($_POST['name'], $_POST['email'], sha1($_POST['password']), $_POST['address'], $_POST['address2'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['about'], $active, $admin, $_POST['type'], $_POST['school'], $_POST['userID'], $_POST['phone'], $_POST['url']);
					$db->query("UPDATE users SET name = $1, email = $2, password = $3, address = $4, address2 = $5, city = $6, state = $7, zip = $8, phone = $15, url = $16, about = $9, active = $10, admin = $11, type_id = $12, school_id = $13 WHERE user_id = $14", $fields);
				}
				
				// Insert additional schools
				$additionalSchools = isset($_POST['additionalSchools']) ? $_POST['additionalSchools'] : array();
				if (count($additionalSchools) > 0)
				{
					$user_id = $_POST['userID'];
					
					// Delete current additional schools
					$fields = array($user_id);
					$db->query("DELETE FROM additional_schools WHERE user_id = $1", $fields);
					
					for ($i = 0; $i < count($additionalSchools); $i++)
					{
						$fields = array($user_id, $additionalSchools[$i]);
						$db->query("INSERT INTO additional_schools (user_id, school_id) VALUES ($1, $2)", $fields);
					}
				}
				
				$smarty->assign('message', "User <b>". $_POST['name'] ."</b> edited successfully.");
				showUsersListPage();
			}
			else
			{
				$userID = $_GET['id'];
				$fields = array($userID);
				$query = "SELECT user_id,
							school_id,
							email,
							name,
							admin,
							address,
							address2,
							city,
							state,
							zip,
							phone,
							url,
							about,
							active,
							type_id
							FROM users
							WHERE user_id = $1";
				$db->query($query, $fields);
				
				if ($db->rows() == 1)
				{
					$row = $db->fetch();
					
					$smarty->assign('userID', $row['user_id']);
					$smarty->assign('schoolID', $row['school_id']);
					$smarty->assign('email', $row['email']);
					$smarty->assign('name', $row['name']);
					$smarty->assign('adminUser', $row['admin'] == 't');
					$smarty->assign('address', $row['address']);
					$smarty->assign('address2', $row['address2']);
					$smarty->assign('city', $row['city']);
					$smarty->assign('state', $row['state']);
					$smarty->assign('zip', $row['zip']);
					$smarty->assign('phone', $row['phone']);
					$smarty->assign('url', $row['url']);
					$smarty->assign('about', $row['about']);
					$smarty->assign('active', $row['active'] == 't');
					$smarty->assign('type_id', $row['type_id']);
					
		
					$smarty->assign('title', "Edit User");
					$smarty->assign('onload', "setSelected('school', '". $row['school_id'] ."'); setSelected('type', '". $row['type_id'] ."');");
					$smarty->assign('schools', getAllSchools());
					$smarty->assign('types', getAllTypes());
					$smarty->display('admin/usersEdit.tpl');
				}
				else
				{
					$smarty->assign('title', "Edit User");
					$smarty->assign('errorMessage', "User not found!");
					showUsersListPage();
				}
			}
		}
		else if ($action == "delete")
		{
			if ($_GET['id'] == 1)
			{
				$smarty->assign('errorMessage', "You can not delete an admin!");
			}
			else if ($_GET['id'] == $_SESSION['adminUserID'])
			{
				$smarty->assign('errorMessage', "You can not delete yourself!");
			}
			else
			{
				$fields = array($_GET['id']);
				$db->query("DELETE FROM users WHERE user_id = $1", $fields);
				$db->query("DELETE FROM events WHERE user_id = $1", $fields);
				$db->query("DELETE FROM additional_schools WHERE user_id = $1", $fields);
				
				$smarty->assign('message', "User deleted successfully.");
			}
			showUsersListPage();
		}
		else
		{
			showUsersListPage();
		}
	}
}
else // Show login form
{
	include('index.php');
}

require_once('../../include/footer.php');
?>