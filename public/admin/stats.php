<?php
require_once('../../include/setup.php');

$smarty->assign('section', "admin");
if (isset($_SESSION['adminName'])) $smarty->assign('adminName', $_SESSION['adminName']);

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
		//School Calendar Views
		$query = "SELECT schools.school_id, schools.name, COUNT(*)
			FROM school_views, schools
			WHERE schools.school_id = school_views.school_id";
		
		if (isset($_GET['month']) && isset($_GET['year']))
		{
			$month = $_GET['month'];
			$year = $_GET['year'];
		}
		else
		{
			$month = date("m");
			$year = date("Y");
		}
		
		if ($year == "all")
		{
			$month = "all";
		}
		else if ($month == "all")
		{
			$query.= " AND to_char(school_views.date, 'yyyy') = '$year'";
		}
		else
		{
			$query.= " AND to_char(school_views.date, 'mm/yyyy') = '$month/$year'";
		}
//		$smarty->assign('onload', "setSelected('month', '$month'); setSelected('year', '$year');");
		
		$query.= " GROUP BY schools.name, schools.school_id
			ORDER BY count DESC";
		$db->query($query);
				
		$schoolViews = array();
		for ($i = 0; $row = $db->fetch(); $i++)
		{
			$schoolViews[$i] = $row;
		}
		////////////////////////////////////////////////////////////////////////////////
		
		// Profile Views
		$query = "SELECT users.user_id, users.name, COUNT(*)
		FROM profile_views, users
		WHERE users.user_id = profile_views.user_id";
		
		if (isset($_GET['month']) && isset($_GET['year']))
		{
			$month = $_GET['month'];
			$year = $_GET['year'];
		}
		else
		{
			$month = date("m");
			$year = date("Y");
		}
		
		if ($year == "all")
		{
			$month = "all";
		}
		else if ($month == "all")
		{
			$query.= " AND to_char(profile_views.date, 'yyyy') = '$year'";
		}
		else
		{
			$query.= " AND to_char(profile_views.date, 'mm/yyyy') = '$month/$year'";
		}
		
		$query.= " GROUP BY users.name, users.user_id
			ORDER BY count DESC";
		$db->query($query);
				
		$profileViews = array();
		for ($i = 0; $row = $db->fetch(); $i++)
		{
			$profileViews[$i] = $row;
		}
		
		// Get years
		$years = array();
		for ($i = 2011; $i <= date("Y"); $i++)
		{
			array_push($years, $i);
		}
	
		$smarty->assign('title', "Statistics");
		$smarty->assign('onload', "setSelected('month', '$month'); setSelected('year', '$year');");
		$smarty->assign('schoolViews', $schoolViews);
		$smarty->assign('profileViews', $profileViews);
		$smarty->assign('years', $years);
		$smarty->display('admin/stats.tpl');
	}
}
else // Show login form
{
	include('index.php');
}

require_once('../../include/footer.php');
?>