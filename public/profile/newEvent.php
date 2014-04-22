<?php
require_once('../../include/setup.php');

function checkForAdditionalSchools()
{
	global $db; 
	
	$user_id = $_SESSION['user_id'];
	$schools = array();
	$additionalSchools = getAdditionalSchools($user_id);
	if (count($additionalSchools) > 0)
	{
		$fields = array($user_id);
		$db->query("SELECT users.school_id, schools.name FROM users, schools WHERE users.user_id = $1 AND users.school_id = schools.school_id", $fields);
		$row = $db->fetch();
		$schools[0]['school_id'] = $row['school_id'];
		$schools[0]['name'] = $row['name'];
		
		$schools = array_merge($schools, $additionalSchools);
	}
	else
	{
		$schools = array();
	}
	
	return $schools;
}


function uploadEventPic($event_id)
{
	$path = constant("UPLOAD_PATH_EVENTS");
	$max_size = constant("MAX_UPLOAD_SIZE");
	if (isset($_FILES['eventPic']))
	{
		if ($_FILES['eventPic']['error'] !== 0)
		{
			return $_FILES['eventPic']['error'];
		}
		else
		{
			// Check size
			if ($_FILES['eventPic']['size'] > $max_size)
			{
				return UPLOAD_ERR_FORM_SIZE;
			}
			
			// Check if valid image type
			if (($_FILES['eventPic']['type'] == "image/gif") || ($_FILES['eventPic']['type'] == "image/pjpeg") || ($_FILES['eventPic']['type'] == "image/jpeg") || ($_FILES['eventPic']['type'] == "image/png"))
			{
				$res = copy($_FILES['eventPic']['tmp_name'], $path . $event_id . "_" . $_FILES['eventPic']['name']);
	
				if (!$res)
				{
					return UPLOAD_ERR_CANT_WRITE;
				}
				else 
				{ 
					return UPLOAD_ERR_OK;
				}
			}
			else
			{
				return UPLOAD_ERR_EXTENSION;
			}
		}
	}
	else
	{
		return UPLOAD_ERR_NO_FILE;
	}
}


function checkUpload()
{
	global $db, $smarty;
	
	// Get current event id
	$db->query("SELECT currval('events_event_id_seq'::regclass) AS event_id FROM events");
	$row = $db->fetch();
	$event_id = $row['event_id'];
	
	// Event Pic upload
	$upload = uploadEventPic($event_id);
	
	$uploadError = false;
	switch ($upload)
	{
		case UPLOAD_ERR_OK:
			$eventPicName = $event_id . "_" . $_FILES['eventPic']['name'];
			$fields = array($event_id, $eventPicName);
			$db->query("UPDATE events SET event_img = $2 WHERE event_id = $1", $fields);
			break;
		case UPLOAD_ERR_NO_FILE:
			break;
		case UPLOAD_ERR_FORM_SIZE:
			$maxSizeText = number_format(constant("MAX_UPLOAD_SIZE") / 1000000, 1);
			$uploadError = true;
			$smarty->assign('errorMessage', "File size exceeds maximum size of $maxSizeText MB!");
			break;
		case UPLOAD_ERR_CANT_WRITE:
			$uploadError = true;
			$smarty->assign('errorMessage', "File upload failed!");
			break;
		case UPLOAD_ERR_EXTENSION:
			$uploadError = true;
			$smarty->assign('errorMessage', "Invalid file type! Only images are allowed.");
			break;
	}
	
	if ($uploadError)
	{
		$fields = array($event_id);
		$db->query("DELETE FROM events WHERE event_id = $1", $fields);
		return false;
	}
	else
	{
		return true;
	}
}




if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) // Logged in
{
	$smarty->assign('userID', $_SESSION['user_id']);
	
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_id = $_SESSION['user_id'];
		$school_id = $_SESSION['school_id'];
		$name = strip_tags($_POST['name']);
		$description = strip_tags($_POST['description']);
		$startdate = strip_tags($_POST['startdate']) . " " . strip_tags($_POST['startdate_time']) . " " . strip_tags($_POST['startdate_ampm']);
		if (isset($_POST['enddate']) && $_POST['enddate'] != "")	$enddate = strip_tags($_POST['enddate']) . " " . strip_tags($_POST['enddate_time']) . " " . strip_tags($_POST['enddate_ampm']);
		else	$enddate = strip_tags($_POST['startdate']) . " " . strip_tags($_POST['enddate_time']) . " " . strip_tags($_POST['enddate_ampm']);
		$active = isset($_POST['active']) && $_POST['active'] == "true" ? 'T' :'F';
		$location = strip_tags($_POST['location']);
		$address = strip_tags($_POST['address']);
		$address2 = isset($_POST['address2']) ? strip_tags($_POST['address2']) : "";
		$city = strip_tags($_POST['city']);
		$state = strip_tags($_POST['state']);
		$zip = strip_tags($_POST['zip']);
		
		// Set smarty variables to remember inputs
		$smarty->assign('title', "New Event");
//		$smarty->assign('onload', "checkLength(document.getElementsByName('description')[0]);");
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
		$smarty->assign('additionalSchools', checkForAdditionalSchools());
		$smarty->assign('MAX_UPLOAD_SIZE', constant("MAX_UPLOAD_SIZE"));
		
		if ($_POST['startdate'] == "")
		{
			$smarty->assign('errorMessage', "Event must have a date!");
			$smarty->display('profile/newEvent.tpl');
		}
		else if ($name == "")
		{
			$smarty->assign('errorMessage', "Event must have a name!");
			$smarty->display('profile/newEvent.tpl');
		}
		else if ($location == "" && $address == "")
		{
			$smarty->assign('errorMessage', "Event must either have a location or address!");
			$smarty->display('profile/newEvent.tpl');
		}
		else if ($address != "" && ($city == "" || $state == ""))
		{
			$missingField = $city == "" ? "City" : "State";
			$smarty->assign('errorMessage', "$missingField cannot be blank if an address is used!");
			$smarty->display('profile/newEvent.tpl');
		}
		else if ($zip != "" && preg_match("/^\d{5}([\-]\d{4})?$/", $zip) == 0)
		{
			$smarty->assign('errorMessage', $zip . " is not a valid zip code!");
			$smarty->display('profile/newEvent.tpl');
		}
		else if ($description == "")
		{
			$smarty->assign('errorMessage', "Event must have a description!");
			$smarty->display('profile/newEvent.tpl');
		}
		else if (strlen($description) > 500)
		{
			$reduce = strlen($description) - 500;
			$smarty->assign('errorMessage', "Event description is too long! It must be under 500 characters. Please reduce it by $reduce characters.");
			$smarty->display('profile/newEvent.tpl');
		}
		else // Validated
		{
			$uploadSuccess = false;
			if (isset($_POST['schools'])) // Multiple schools
			{
				$schools = $_POST['schools'];
				for ($i = 0; $i < count($schools); $i++)
				{
					$fields = array($user_id, $schools[$i], $name, $description, $startdate, $enddate, $active, $location, $address, $address2, $city, $state, $zip);
					$db->query("INSERT INTO events (user_id, school_id, name, description, startdate, enddate, active, location, address, address2, city, state, zip) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13)", $fields);
					$uploadSuccess = checkUpload();
				}
			}
			else
			{
				$fields = array($user_id, $school_id, $name, $description, $startdate, $enddate, $active, $location, $address, $address2, $city, $state, $zip);
				$db->query("INSERT INTO events (user_id, school_id, name, description, startdate, enddate, active, location, address, address2, city, state, zip) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13)", $fields);
				$uploadSuccess = checkUpload();
			}
			
			if ($uploadSuccess)
			{
				$smarty->assign('message', "Event added!");
				include("index.php");
			}
			else
			{
				$smarty->display('profile/newEvent.tpl');
			}
			
		}
	}
	else
	{
		$smarty->assign('title', "New Event");
//		$smarty->assign('onload', "checkLength(document.getElementsByName('description')[0]);");
		$smarty->assign('startdate', "");
		$smarty->assign('name', "");
		$smarty->assign('description', "");
		$smarty->assign('location', "");
		$smarty->assign('address', "");
		$smarty->assign('address2', "");
		$smarty->assign('city', "");
		$smarty->assign('state', "");
		$smarty->assign('zip', "");
		$smarty->assign('profilePic', getProfilePic());
		$smarty->assign('additionalSchools', checkForAdditionalSchools());
		$smarty->assign('MAX_UPLOAD_SIZE', constant("MAX_UPLOAD_SIZE"));
		$smarty->display('profile/newEvent.tpl');
	}
}
else
{
	include("../login.php");
}
		
require_once('../../include/footer.php');
?>