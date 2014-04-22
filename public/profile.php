<?php
require_once('../include/setup.php');
require_once('../lib/UserCalendar.php');

function updateProfileViews($userID)
{
	global $db;
	
	$fields = array($userID, getIPAddress());
	$query = "INSERT INTO profile_views (user_id, ip_address) VALUES ($1, $2)";
	$db->query($query, $fields);
}

if (isset($_GET['id']))
{
	$userID = $_GET['id'];
	
	updateProfileViews($userID);
	
	$months = array(
		'01' => "January",
		'02' => "February",
		'03' => "March",
		'04' => "April",
		'05' => "May",
		'06' => "June",
		'07' => "July",
		'08' => "August",
		'09' => "September",
		'10' => "October",
		'11' => "November",
		'12' => "December"
	);
	
	if (isset($_GET['month']) && isset($_GET['year']))
	{
		$month = strlen($_GET['month']) == 1 ? '0' . $_GET['month'] : $_GET['month'];
		$year = $_GET['year'];
	}
	else
	{
		$month = date("m");
		$year = date("Y");
	}
	$monthName = $months[$month];
	
	$cal = new UserCalendar($userID, $month, $year);
	$calendar = $cal->draw_calendar();
	
	// Get previous/next months/years
	if ($month == "01")
	{
		$prevMonth = "12";
	}
	else
	{
		$prevMonth = $month - 1;
	}
	
	if ($month == "12")
	{
		$nextMonth = "1";
	}
	else
	{
		$nextMonth = $month + 1;
	}
	
	if ($nextMonth == "1")
	{
		$nextYear = $year + 1;
	}
	else
	{
		$nextYear = $year;
	}
	
	if ($prevMonth == "12")
	{
		$prevYear = $year - 1;
	}
	else
	{
		$prevYear = $year;
	}
	
	// Get organization name
	$fields = array($userID);
	$db->query("SELECT users.name AS name, 
					users.about, 
					users.address, 
					users.city, 
					users.state, 
					users.zip, 
					users.url, 
					schools.name AS school_name,
					types.description AS type
				FROM users, schools, types 
				WHERE users.school_id = schools.school_id AND
					users.type_id = types.type_id AND
					users.user_id = $1", $fields);
	$row = $db->fetch();
	
	// Check for additional schools
	$additionalSchools = getAdditionalSchools($userID);
	$hasAdditionalSchools = count($additionalSchools) > 0;
	$smarty->assign('hasAdditionalSchools', $hasAdditionalSchools);
	$smarty->assign('additionalSchools', $additionalSchools);

	// Check URL
	$url = $row['url'];
	if (strpos($url, "http://") === false)
	{
		$url = "http://" . $url;
	}
	
	$smarty->assign('title', "Public Profile for ". $row['name']);
	$smarty->assign('metaKeywords', $row['name'] ." ". $row['city'] .", ". $row['name'] ." Events");
	$smarty->assign('metaDescription', $row['about']);
	$smarty->assign('onload', "initializeMap();");
	$smarty->assign('month', $monthName);
	$smarty->assign('year', $year);
	$smarty->assign('prevMonth', $prevMonth);
	$smarty->assign('prevYear', $prevYear);
	$smarty->assign('nextMonth', $nextMonth);
	$smarty->assign('nextYear', $nextYear);
	$smarty->assign('calendar', $calendar);
	$smarty->assign('name', $row['name']);
	$smarty->assign('about', $row['about']);
	$smarty->assign('userID', $userID);
	$smarty->assign('profilePic', getProfilePic($userID));
	$smarty->assign('toolTipCode', $cal->generateToolTips());
	$smarty->assign('address', $row['address'] .' '. $row['city'] .', '. $row['state'] .' '. $row['zip']);
	$smarty->assign('addressSplit', $row['address'] .'<br/>'. $row['city'] .', '. $row['state'] .' '. $row['zip']);
	$smarty->assign('school', $row['school_name']);
	$smarty->assign('type', $row['type']);
	$smarty->assign('url', $url);
	$smarty->display('profile.tpl');
}

require_once('../include/footer.php');
?>
