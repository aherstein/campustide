<?php
require_once('../../include/setup.php');

function listEvents($user_id)
{
	global $db;
	
	$dateFormat = "M j, Y g:i a";
	$fields = array($user_id);
	$db->query("SELECT events.event_id, 
				name,
				description, 
				startdate, 
				enddate, 
				active, 
				location
				FROM events
				WHERE user_id = $1
				ORDER BY name ASC", $fields);

	$events = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$startdate = new DateTime($row['startdate']);
		$enddate = new DateTime($row['enddate']);
		
		$events[$i]['event_id'] = $row['event_id'];
		$events[$i]['name'] = $row['name'];
		$events[$i]['description'] = $row['description'];
		$events[$i]['startdate'] = $startdate->format($dateFormat);
		$events[$i]['enddate'] = $enddate->format($dateFormat);
		$events[$i]['active'] = $row['active'];
		$events[$i]['location'] = $row['location'];
	}
	
	return $events;
}

$action = isset($_GET['a']) ? $_GET['a'] : "";
$smarty->assign('profilePic', getProfilePic());

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) // Logged in
{
	$user_id = $_SESSION['user_id'];
	$smarty->assign('userID', $_SESSION['user_id']);

	if ($action == "edit")
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = strip_tags($_POST['name']);
			$description = strip_tags($_POST['description']);
			$startdate = strip_tags($_POST['startdate']) . " " . strip_tags($_POST['startdate_time']) . " " . strip_tags($_POST['startdate_ampm']);
			$enddate = strip_tags($_POST['startdate']) . " " . strip_tags($_POST['enddate_time']) . " " . strip_tags($_POST['enddate_ampm']);
			$active = isset($_POST['active']) && $_POST['active'] == "true" ? 'T' :'F';
			$location = strip_tags($_POST['location']);
			$address = strip_tags($_POST['address']);
			$address2 = isset($_POST['address2']) ? strip_tags($_POST['address2']) : "";
			$city = strip_tags($_POST['city']);
			$state = strip_tags($_POST['state']);
			$zip = strip_tags($_POST['zip']);
			$event_id = strip_tags($_POST['event_id']);
			
			// Set smarty variables to remember inputs
			$smarty->assign('title', "New Event");
			$smarty->assign('onload', "checkLength(document.getElementsByName('description')[0]);");
			$smarty->assign('startdate', $_POST['startdate']);
			$smarty->assign('name', $name);
			$smarty->assign('description', $description);
			$smarty->assign('location', $location);
			$smarty->assign('address', $address);
			$smarty->assign('address2', $address2);
			$smarty->assign('city', $city);
			$smarty->assign('state', $state);
			$smarty->assign('zip', $zip);
			$smarty->assign('profilePic', getProfilePic());

			// Check for additional schools
			$hasAdditionalSchools = hasAdditionalSchools($user_id);
			$smarty->assign('hasAdditionalSchools', $hasAdditionalSchools);
			
			//TODO Validate input fields
			if (strlen($description) > 500)
			{
				$reduce = strlen($description) - 500;
				$smarty->assign('errorMessage', "Event description is too long! It must be under 500 characters. Please reduce it by $reduce characters.");
				$smarty->display('profile/eventsEdit.tpl');
			}
			else if ($zip != "" && preg_match("/^\d{5}([\-]\d{4})?$/", $zip) == 0)
			{
				$smarty->assign('errorMessage', $zip . " is not a valid zip code!");
				$smarty->display('profile/editProfile.tpl');
			}
			else
			{
				$fields = array($name, $description, $startdate, $enddate, $active, $location, $address, $address2, $city, $state, $zip, $event_id, $user_id);
				$db->query("UPDATE events SET name = $1, description = $2, startdate = $3, enddate = $4, active = $5, location = $6, address = $7, address2 = $8, city = $9, state = $10, zip = $11 WHERE event_id = $12 AND user_id = $13", $fields);
				
				$events = listEvents($user_id);
	
				$smarty->assign('title', "My Events");
				$smarty->assign('events', $events);
				$smarty->assign('message', "Event edited successfully.");
				$smarty->display('profile/eventsList.tpl');
			}
		}
		else
		{
			$event_id = $_GET['id'];
			$fields = array($event_id, $user_id);
			
			// Check for additional schools
			$hasAdditionalSchools = hasAdditionalSchools($user_id);
			$smarty->assign('hasAdditionalSchools', $hasAdditionalSchools);
			if ($hasAdditionalSchools)
			{
				$query = "SELECT 
					events.event_id, events.name, events.description, events.active, events.location, schools.name AS school_name,
					events.address, events.address2, events.city, events.state, events.zip,
					to_char(events.startdate, 'mm/dd/yyyy') AS startdate,   
					to_char(events.startdate, 'hh:mi') AS startdate_time,
					to_char(events.startdate, 'am') AS startdate_ampm,
					to_char(events.enddate, 'mm/dd/yyyy') AS enddate,  
					to_char(events.enddate, 'hh:mi') AS enddate_time,
					to_char(events.enddate, 'am') AS enddate_ampm					
					FROM events, schools WHERE event_id = $1 AND user_id = $2 AND events.school_id = schools.school_id";
			}
			else
			{
				$query = "SELECT 
					event_id, name, description, active, location,
					events.address, events.address2, events.city, events.state, events.zip,
					to_char(startdate, 'mm/dd/yyyy') AS startdate,   
					to_char(startdate, 'hh:mi') AS startdate_time,
					to_char(startdate, 'am') AS startdate_ampm,
					to_char(enddate, 'mm/dd/yyyy') AS enddate,  
					to_char(enddate, 'hh:mi') AS enddate_time,
					to_char(enddate, 'am') AS enddate_ampm						
					FROM events WHERE event_id = $1 AND user_id = $2";
			}
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
				
				if ($hasAdditionalSchools)
				{
					$smarty->assign('school', $row['school_name']);
				}
				
				$smarty->assign('title', "Edit Event");
				$smarty->assign('onload', "populateDates(); checkLength(document.getElementsByName('description')[0]);");
				$smarty->display('profile/eventsEdit.tpl');
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
		$fields = array($event_id, $user_id);
		$db->query("DELETE FROM events WHERE event_id = $1 AND user_id = $2", $fields);
		
		$events = listEvents($user_id);
		
		$smarty->assign('title', "My Events");
		$smarty->assign('events', $events);
		$smarty->assign('message', "Event deleted successfully.");
		$smarty->display('profile/eventsList.tpl');
	}
	else
	{
		$events = listEvents($user_id);
		
		$smarty->assign('title', "My Events");
		$smarty->assign('events', $events);
		$smarty->display('profile/eventsList.tpl');
	}
}
else // Show login form
{
	include("../login.php");
}

require_once('../../include/footer.php');
?>