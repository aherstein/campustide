<?php
require_once('../include/setup.php');

$event_id = $_GET['id'];
//$dateFormat = "mm/dd/yyyy";
$dateFormat = "Day, Month dd, yyyy";
$fields = array($event_id);
$db->query("SELECT 
			events.name AS event_name, 
			events.description AS description, 
			to_char(events.startdate, '". $dateFormat ."') AS startdate, 
			to_char(events.startdate, 'hh:mi am') AS starttime, 
			to_char(events.enddate, 'hh:mi am') AS endtime,
			to_char(events.startdate, 'mm') AS month, 
			to_char(events.startdate, 'yyyy') AS year, 
			events.location AS location,
			events.address AS event_address, 
			events.address2 AS event_address2, 
			events.city AS event_city, 
			events.state AS event_state, 
			events.zip AS event_zip,
			users.name AS user_name,
			schools.name AS school_name,
			types.description AS type_description,
			users.user_id AS user_id,
			users.address AS user_address, 
			users.address2 AS user_address2, 
			users.city AS user_city, 
			users.state AS user_state, 
			users.zip AS user_zip,
			events.event_img AS event_img
			FROM events, users, schools, types
			WHERE
			events.school_id = schools.school_id AND
			events.user_id = users.user_id AND
			users.type_id = types.type_id AND
			events.active = 'true' AND
			events.event_id = $1
			", $fields);
$row = $db->fetch();

$smarty->assign('title', "Event - ". $row['event_name']);
$smarty->assign('onload', "initializeMap();");
$smarty->assign('eventName', $row['event_name']);
$smarty->assign('description', $row['description']);
$smarty->assign('startdate', $row['startdate']);
$smarty->assign('endtime', $row['endtime']);
$smarty->assign('starttime', $row['starttime']);
$smarty->assign('month', $row['month']);
$smarty->assign('year', $row['year']);
$smarty->assign('location', $row['location']);
$smarty->assign('userName', $row['user_name']);
$smarty->assign('schoolName', $row['school_name']);
$smarty->assign('schoolParam', str_replace(" ", "+", $row['school_name']));
$smarty->assign('type', $row['type_description']);
$smarty->assign('userID', $row['user_id']);
$smarty->assign('profilePic', getProfilePic($row['user_id']));
$smarty->assign('eventPic', $row['event_img']);
$smarty->assign('eventID', $_GET['id']);
$smarty->assign('ret', isset($_GET['ret']) ? $_GET['ret'] : "");

if($row['event_address'] != "" && $row['event_city'] != "" && $row['event_state'] != "")
{
	$smarty->assign('eventAddress', true);
	$address2 = $row['event_address2'] != "" ? " ". $row['event_address2'] : "";
	$smarty->assign('address', $row['event_address'] . $address2 .', '. $row['event_city'] .', '. $row['event_state'] .' '. $row['event_zip']);
}
else
{
	$smarty->assign('eventAddress', false);
	$address2 = $row['event_address2'] != "" ? " ". $row['event_address2'] : "";
	$smarty->assign('address', $row['user_address'] . $address2 .', '. $row['user_city'] .', '. $row['user_state'] .' '. $row['user_zip']);
}

$smarty->display('event.tpl');

require_once('../include/footer.php');
?>