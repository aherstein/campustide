<?php
require_once('../include/setup.php');

$date = date("l, F d, Y" ,mktime(0, 0, 0, $_GET['month'], $_GET['day'], $_GET['year']));
$dateFormat = "Day, Month dd, yyyy";
if (isset($_GET['user_id']))
{
	$smarty->assign('user_id', $_GET['user_id']);
	$fields = array($_GET['user_id'], $_GET['month'], $_GET['day'], $_GET['year']);
	$query = "SELECT 
		events.event_id AS event_id, 
		events.name AS event_name, 
		events.description AS description, 
		to_char(events.startdate, '". $dateFormat ."') AS date,
		to_char(events.startdate, 'hh:mi am') AS starttime, 
		to_char(events.enddate, 'hh:mi am') AS endtime,
		to_char(events.startdate, 'mm') AS month, 
		to_char(events.startdate, 'yyyy') AS year, 
		events.location AS location,
		users.name AS user_name,
		schools.name AS school_name,
		types.description AS type_description,
		users.user_id AS user_id,
		events.address AS address, 
		events.address2 AS address2, 
		events.city AS city, 
		events.state AS state, 
		events.zip AS zip,
		events.location AS location,
		events.event_img AS event_img
		FROM events, users, schools, types
		WHERE
		events.school_id = schools.school_id AND
		events.user_id = users.user_id AND
		users.type_id = types.type_id AND
		events.active = 'true' AND
		events.user_id = $1 AND
		to_char(events.startdate, 'mm') = $2 AND
		to_char(events.startdate, 'dd') = $3 AND
		to_char(events.startdate, 'yyyy') = $4
		ORDER BY starttime ASC";
}
else if (isset($_GET['school_id']))
{
	$smarty->assign('school_id', $_GET['school_id']);
	$fields = array($_GET['school_id'], $_GET['month'], $_GET['day'], $_GET['year']);
	$query = "SELECT 
		events.event_id AS event_id, 
		events.name AS event_name, 
		events.description AS description, 
		to_char(events.startdate, '". $dateFormat ."') AS date,
		to_char(events.startdate, 'hh:mi am') AS starttime, 
		to_char(events.enddate, 'hh:mi am') AS endtime,
		to_char(events.startdate, 'mm') AS month, 
		to_char(events.startdate, 'yyyy') AS year, 
		events.location AS location,
		users.name AS user_name,
		schools.name AS school_name,
		types.description AS type_description,
		users.user_id AS user_id,
		events.address AS address, 
		events.address2 AS address2, 
		events.city AS city, 
		events.state AS state, 
		events.zip AS zip,
		events.location AS location,
		events.event_img AS event_img
		FROM events, users, schools, types
		WHERE
		events.school_id = schools.school_id AND
		events.user_id = users.user_id AND
		users.type_id = types.type_id AND
		events.active = 'true' AND
		events.school_id = $1 AND
		to_char(events.startdate, 'mm') = $2 AND
		to_char(events.startdate, 'dd') = $3 AND
		to_char(events.startdate, 'yyyy') = $4
		ORDER BY starttime ASC";
}

$db->query($query, $fields);

$events = array();
for ($i = 0; $row = $db->fetch(); $i++)
{
	$events[$i] = $row;
}

if (count($events) > 0)
{
	$smarty->assign('hasEvents', true);
	
	if (isset($_GET['user_id']))
	{
		$smarty->assign('name', $events[0]['user_name']);
	}
	else if (isset($_GET['school_id']))
	{
		$smarty->assign('name', $events[0]['school_name']);
	}
	
	$smarty->assign('title', "Events at ". $events[0]['school_name'] ." for ". $date);
	$smarty->assign('schoolParam', str_replace(" ", "+", $events[0]['school_name']));
}
else
{
	$smarty->assign('hasEvents', false);
	
	if (isset($_GET['user_id']))
	{
		$fields = array($_GET['user_id']);
		$query = "SELECT name FROM users WHERE user_id = $1";
		$db->query($query, $fields);
		$row = $db->fetch();
	}
	else if (isset($_GET['school_id']))
	{
		$fields = array($_GET['school_id']);
		$query = "SELECT name FROM schools WHERE school_id = $1";
		$db->query($query, $fields);
		$row = $db->fetch();
	}
	
	$smarty->assign('title', "Events at ". $row['name'] ." for ". $date);
	$smarty->assign('name', $row['name']);
	$smarty->assign('schoolParam', str_replace(" ", "+", $row['name']));
}


// Generate date picker
$day = 60 * 60 * 24;
$thisdate = mktime(0, 0, 0, $_GET['month'], $_GET['day'], $_GET['year']);
$dateArray = array($thisdate - 3 * $day, $thisdate - 2 * $day, $thisdate - $day, $thisdate, $thisdate + $day, $thisdate + 2 * $day, $thisdate + 3 * $day);
$prevWeek = $thisdate - 7 * $day;
$nextWeek = $thisdate + 7 * $day;

$smarty->assign('date', $date);
$smarty->assign('month', $_GET['month']);
$smarty->assign('year', $_GET['year']);
$smarty->assign('dates', $dateArray);
$smarty->assign('thisDate', $thisdate);
$smarty->assign('prevWeek', $prevWeek);
$smarty->assign('nextWeek', $nextWeek);
$smarty->assign('events', $events);

$smarty->display('day.tpl');

require_once('../include/footer.php');
?>