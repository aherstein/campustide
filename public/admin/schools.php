<?php
require_once('../../include/setup.php');

$smarty->assign('section', "admin");
if (isset($_SESSION['adminName'])) $smarty->assign('adminName', $_SESSION['adminName']);

function showSchoolsListPage()
{
	global $smarty;
	
	$schools = getAllSchools();
	
	$smarty->assign('title', "Schools");
	$smarty->assign('schools', $schools);
	$smarty->assign('total', count($schools));
	$smarty->display('admin/schoolsList.tpl');
}


function getAllSchools()
{
	global $db;
	
	$db->query("SELECT school_id, name, city, state FROM schools ORDER BY state, name ASC");
			
	$schools = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$schools[$i] = $row;
	}
	
	return $schools;
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
		$smarty->assign('title', "Edit School");
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
				
				$fields = array($_POST['name'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['schoolID']);
				$db->query("UPDATE schools SET name = $1, address = $2, city = $3, state = $4, zip = $5 WHERE school_id = $6", $fields);
				
				$smarty->assign('message', "School <b>". $_POST['name'] ."</b> edited successfully.");
				showSchoolsListPage();
			}
			else
			{
				$schoolID = $_GET['id'];
				$fields = array($schoolID);
				$query = "SELECT school_id,
							name,
							address,
							city,
							state,
							zip
							FROM schools
							WHERE school_id = $1";
				$db->query($query, $fields);
				
				if ($db->rows() == 1)
				{
					$row = $db->fetch();
					
					$smarty->assign('schoolID', $row['school_id']);
					$smarty->assign('name', $row['name']);
					$smarty->assign('address', $row['address']);
					$smarty->assign('city', $row['city']);
					$smarty->assign('state', $row['state']);
					$smarty->assign('zip', $row['zip']);
		
					$smarty->assign('title', "Edit School");
					$smarty->display('admin/schoolsEdit.tpl');
				}
				else
				{
					$smarty->assign('title', "Edit User");
					$smarty->assign('errorMessage', "User not found!");
					showSchoolsListPage();
				}
			}
		}
		else if ($action == "delete")
		{
			$fields = array($_GET['id']);
			$db->query("SELECT school_id FROM users WHERE school_id = $1", $fields);
			
			if ($db->rows() > 0)
			{
				$smarty->assign('errorMessage', "You can not delete a school that has users assigned to it!");
			}
			else
			{
				$db->query("DELETE FROM schools WHERE school_id = $1", $fields);
				
				$smarty->assign('message', "School deleted successfully.");
			}
			showSchoolsListPage();
		}
		else if ($action == "new")
		{
			if ($_SERVER['REQUEST_METHOD'] == "POST")
			{
				//TODO Validate input fields
				
				$fields = array($_POST['name'], $_POST['address'], $_POST['city'], strtoupper($_POST['state']), $_POST['zip']);
				$db->query("INSERT INTO schools (name, address, city, state, zip) VALUES ($1, $2, $3, $4, $5)", $fields);
				
				$smarty->assign('message', "School <b>". $_POST['name'] ."</b> added successfully.");
				showSchoolsListPage();
			}
			else
			{
				$smarty->assign('title', "New School");
				
				$smarty->display('admin/schoolsNew.tpl');
			}
		}
		else
		{
			showSchoolsListPage();
		}
	}
}
else // Show login form
{
	include('index.php');
}

require_once('../../include/footer.php');
?>