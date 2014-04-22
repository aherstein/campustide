<?php
require_once('../../include/setup.php');

$smarty->assign('section', "admin");
if (isset($_SESSION['adminName'])) $smarty->assign('adminName', $_SESSION['adminName']);

function listEvents()
{
	global $db, $smarty;
	$dateFormat = "M j, Y g:i a";
	
	if (isset($_GET['id']))
	{
		$fields = array($_GET['id']);
		
		$db->query("SELECT events.event_id, 
					users.user_id,
					events.name AS name, 
					events.description AS description, 
					to_char(events.startdate, 'Mon dd, yyyy hh:mi am') AS startdate,
					to_char(events.enddate, 'Mon dd, yyyy hh:mi am') AS enddate,
					events.active AS active, 
					events.location AS location, 
					users.name AS user_name,
					to_char(events.created_date, 'Mon dd, yyyy hh12:mi am') AS created_date,
					schools.name AS school_name
					FROM events, users, schools
					WHERE events.user_id = users.user_id
					AND events.school_id = schools.school_id
					AND users.user_id = $1
					ORDER BY schools.name, events.name, events.created_date ASC", $fields);
	}
	else
	{
		$db->query("SELECT events.event_id, 
					users.user_id,
					events.name AS name, 
					events.description AS description, 
					to_char(events.startdate, 'Mon dd, yyyy hh:mi am') AS startdate,
					to_char(events.enddate, 'Mon dd, yyyy hh:mi am') AS enddate,
					events.active AS active, 
					events.location AS location, 
					users.name AS user_name,
					to_char(events.created_date, 'Mon dd, yyyy hh12:mi am') AS created_date,
					schools.name AS school_name
					FROM events, users, schools
					WHERE events.user_id = users.user_id
					AND events.school_id = schools.school_id
					ORDER BY schools.name, users.name, events.name, events.created_date ASC");
	}

	$events = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$events[$i]['event_id'] = $row['event_id'];
		$events[$i]['user_id'] = $row['user_id'];
		$events[$i]['name'] = $row['name'];
		$events[$i]['description'] = $row['description'];
		$events[$i]['startdate'] = $row['startdate'];
		$events[$i]['enddate'] = $row['enddate'];
		$events[$i]['active'] = $row['active'];
		$events[$i]['location'] = $row['location'];
		$events[$i]['user_name'] = $row['user_name'];
		$events[$i]['created_date'] = $row['created_date'];
		$events[$i]['school_name'] = $row['school_name'];
	}
	
	if (isset($_GET['id']))
	{
		if (count($events) > 0)
		{
			$smarty->assign('userName', $events[0]['user_name']);
		}
		else
		{
			$smarty->assign('userName', "");
		}
	}
	
	return $events;
}

$action = isset($_GET['a']) ? $_GET['a'] : "";

if (isset($_SESSION['adminLoggedIn']) && $_SESSION['adminLoggedIn'] == true) // Logged in
{
	$user_id = $_SESSION['adminUserID'];

	if ($action == "edit")
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_POST['name'];
			$description = $_POST['description'];
			$startdate = $_POST['startdate'] . " " . $_POST['startdate_time'] . " " . $_POST['startdate_ampm'];
			$enddate = $_POST['startdate'] . " " . $_POST['enddate_time'] . " " . $_POST['enddate_ampm'];
			$active = isset($_POST['active']) && $_POST['active'] == "true" ? 'T' :'F';
			$location = $_POST['location'];
			$address = strip_tags($_POST['address']);
			$address2 = isset($_POST['address2']) ? strip_tags($_POST['address2']) : "";
			$city = strip_tags($_POST['city']);
			$state = strip_tags($_POST['state']);
			$zip = strip_tags($_POST['zip']);
			$event_id = $_POST['event_id'];
			
			//TODO Validate input fields
			
			$fields = array($name, $description, $startdate, $enddate, $active, $location, $address, $address2, $city, $state, $zip, $event_id);
			$db->query("UPDATE events SET name = $1, description = $2, startdate = $3, enddate = $4, active = $5, location = $6, address = $7, address2 = $8, city = $9, state = $10, zip = $11 WHERE event_id = $12", $fields);
			
			$events = listEvents();

			$smarty->assign('title', "Events");
			$smarty->assign('events', $events);
			$smarty->assign('message', "Event edited successfully.");
			$smarty->assign('filterUser', false);
			$smarty->assign('total', count($events));
			$smarty->display('admin/eventsList.tpl');
		}
		else
		{
			$event_id = $_GET['id'];
			$fields = array($event_id);
			$query = "SELECT 
				events.event_id, events.name, events.description, events.active, events.location, schools.name AS school_name,
				events.address, events.address2, events.city, events.state, events.zip,
				to_char(events.startdate, 'mm/dd/yyyy') AS startdate,   
				to_char(events.startdate, 'hh:mi') AS startdate_time,
				to_char(events.startdate, 'am') AS startdate_ampm,
				to_char(events.enddate, 'mm/dd/yyyy') AS enddate,  
				to_char(events.enddate, 'hh:mi') AS enddate_time,
				to_char(events.enddate, 'am') AS enddate_ampm						
				FROM events, schools WHERE event_id = $1 AND events.school_id = schools.school_id";
			$db->query($query, $fields);
			
			if ($db->rows() == 1)
			{
				$row = $db->fetch();
				
				$smarty->assign('event_id', $row['event_id']);
				$smarty->assign('name', $row['name']);
				$smarty->assign('description', $row['description']);
				$smarty->assign('active', $row['active'] == 't');
				$smarty->assign('location', $row['location']);
				$smarty->assign('address', $row['address']);
				$smarty->assign('address2', $row['address2']);
				$smarty->assign('city', $row['city']);
				$smarty->assign('state', $row['state']);
				$smarty->assign('zip', $row['zip']);
				$smarty->assign('startdate', $row['startdate']);
				$smarty->assign('startdate_time', $row['startdate_time']);
				$smarty->assign('startdate_ampm', $row['startdate_ampm']);
				$smarty->assign('enddate', $row['enddate']);
				$smarty->assign('enddate_time', $row['enddate_time']);
				$smarty->assign('enddate_ampm', $row['enddate_ampm']);
				$smarty->assign('school', $row['school_name']);
	
				$smarty->assign('title', "Edit Event");
				$smarty->assign('onload', "populateDates();");
				$smarty->display('admin/eventsEdit.tpl');
			}
			else
			{
				$smarty->assign('title', "Edit Event");
				$smarty->assign('errorMessage', "Event not found!");
				$smarty->display('error.tpl');
			}
		}
	}
	else if ($action == "delete")
	{
		$event_id = $_GET['id'];
		$fields = array($event_id);
		$db->query("DELETE FROM events WHERE event_id = $1", $fields);
		
		$events = listEvents($user_id);
		
		$smarty->assign('title', "Events");
		$smarty->assign('events', $events);
		$smarty->assign('message', "Event deleted successfully.");
		$smarty->assign('filterUser', false);
		$smarty->assign('total', count($events));
		$smarty->display('admin/eventsList.tpl');
	}
	else
	{
		$events = listEvents($user_id);
		
		$smarty->assign('title', "Events");
		$smarty->assign('events', $events);
		$smarty->assign('filterUser', isset($_GET['id']));
		$smarty->assign('total', count($events));
		$smarty->display('admin/eventsList.tpl');
	}
}
else // Show login form
{
	$smarty->assign('title', "Log In");
	$smarty->display('admin/login.tpl');
}

require_once('../../include/footer.php');
?>