<?php
require_once('../../include/setup.php');

function resizeImage()
{
	
}

function uploadProfilePic()
{
	$path = constant("UPLOAD_PATH");
	$max_size = constant("MAX_UPLOAD_SIZE");
	if (isset($_FILES['profilePic']))
	{
		if ($_FILES['profilePic']['error'] !== 0)
		{
			return $_FILES['profilePic']['error'];
		}
		else
		{
			// Check size
			if ($_FILES['profilePic']['size'] > $max_size)
			{
				return UPLOAD_ERR_FORM_SIZE;
			}
			
			// Check if valid image type
			if (($_FILES['profilePic']['type'] == "image/gif") || ($_FILES['profilePic']['type'] == "image/pjpeg") || ($_FILES['profilePic']['type'] == "image/jpeg") || ($_FILES['profilePic']['type'] == "image/png"))
			{
				$res = copy($_FILES['profilePic']['tmp_name'], $path . $_SESSION['user_id'] . "_" . $_FILES['profilePic']['name']);
	
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

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) // Logged in
{
	$smarty->assign('title', "Edit Profile");
	$smarty->assign('userID', $_SESSION['user_id']);
	
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_id = strip_tags($_SESSION['user_id']);
		$address = strip_tags($_POST['address']);
		$address2 = strip_tags($_POST['address2']);
		$city = ucwords(strip_tags($_POST['city']));
		$state = strtoupper(strip_tags($_POST['state']));
		$zip = strip_tags($_POST['zip']);
		$phone = strip_tags($_POST['phone']);
		$url = substr(strip_tags($_POST['url']), 0, 7) == "http://" ? strip_tags($_POST['url']) : "http://" . strip_tags($_POST['url']);
		$url = $url == "" ? "http://" : $url;
		$about = strip_tags($_POST['about']);
		
		// Set smarty variables to remember inputs
		$smarty->assign('address', $address);
		$smarty->assign('address2', $address2);
		$smarty->assign('city', $city);
		$smarty->assign('state', $state);
		$smarty->assign('zip', $zip);
		$smarty->assign('phone', $phone);
		$smarty->assign('url', $url);
		$smarty->assign('about', $about);
		$smarty->assign('profilePic', getProfilePic());
		$smarty->assign('MAX_UPLOAD_SIZE', constant("MAX_UPLOAD_SIZE"));
		
		
		//Validate input fields
		if ($address =="")
		{
			$smarty->assign('errorMessage', "Address cannot be blank!");
			$smarty->display('profile/editProfile.tpl');
		}
		else if ($city =="")
		{
			$smarty->assign('errorMessage', "City cannot be blank!");
			$smarty->display('profile/editProfile.tpl');
		}
		else if ($state =="")
		{
			$smarty->assign('errorMessage', "State cannot be blank!");
			$smarty->display('profile/editProfile.tpl');
		}
		else if ($zip =="")
		{
			$smarty->assign('errorMessage', "Zip cannot be blank!");
			$smarty->display('profile/editProfile.tpl');
		}
		else if (preg_match("/^\d{5}([\-]\d{4})?$/", $zip) == 0)
		{
			$smarty->assign('errorMessage', $zip . " is not a valid zip code!");
			$smarty->display('profile/editProfile.tpl');
		}
		else if (strlen($about) > 400)
		{
			$reduce = strlen($about) - 400;
			$smarty->assign('errorMessage', "Event description is too long! It must be under 400 characters. Please reduce it by $reduce characters.");
			$smarty->display('profile/editProfile.tpl');
		}
		else // Validated
		{
			// Profile Pic upload
			$upload = uploadProfilePic();
			
			switch ($upload)
			{
				case UPLOAD_ERR_OK:
					$profilePicName = $_SESSION['user_id'] . "_" . $_FILES['profilePic']['name'];
					$fields = array($user_id, $address, $address2, $city, $state, $zip, $about, $profilePicName, $url, $phone);
					$db->query("UPDATE users SET address = $2, address2 = $3, city = $4, state = $5, zip = $6, about = $7, profile_img = $8, url = $9, phone = $10 WHERE user_id = $1", $fields);
					
					$smarty->assign('message', "Profile updated!");
					include("index.php");
					break;
				case UPLOAD_ERR_NO_FILE:
					$fields = array($user_id, $address, $address2, $city, $state, $zip, $about, $url, $phone);
					$db->query("UPDATE users SET address = $2, address2 = $3, city = $4, state = $5, zip = $6, about = $7, url = $8, phone = $9 WHERE user_id = $1", $fields);
					
					$smarty->assign('message', "Profile updated!");
					include("index.php");
					break;
				case UPLOAD_ERR_FORM_SIZE:
					$maxSizeText = number_format(constant("MAX_UPLOAD_SIZE") / 1000000, 1);
					$smarty->assign('errorMessage', "File size exceeds maximum size of $maxSizeText MB!");
					$smarty->display('profile/editProfile.tpl');
					break;
				case UPLOAD_ERR_CANT_WRITE:
					$smarty->assign('errorMessage', "File upload failed!");
					$smarty->display('profile/editProfile.tpl');
					break;
				case UPLOAD_ERR_EXTENSION:
					$smarty->assign('errorMessage', "Invalid file type! Only images are allowed.");
					$smarty->display('profile/editProfile.tpl');
					break;
			}
		}
	}
	else
	{
		$fields = array($_SESSION['user_id']);
		$db->query("SELECT address, address2, city, state, zip, phone, url, about FROM users WHERE user_id = $1", $fields);
		$row = $db->fetch();
		
		$url = $row['url'] == "" ? "http://" : $row['url'];
		
		$smarty->assign('address', $row['address']);
		$smarty->assign('address2', $row['address2']);
		$smarty->assign('city', ucwords($row['city']));
		$smarty->assign('state', strtoupper($row['state']));
		$smarty->assign('zip', $row['zip']);
		$smarty->assign('phone', $row['phone']);
		$smarty->assign('url', $url);
		$smarty->assign('about', $row['about']);
		$smarty->assign('userID', $_SESSION['user_id']);
		$smarty->assign('profilePic', getProfilePic());
		$smarty->assign('MAX_UPLOAD_SIZE', constant("MAX_UPLOAD_SIZE"));
		$smarty->display('profile/editProfile.tpl');
	}
}
else
{
	include("../login.php");
}
		
require_once('../../include/footer.php');
?>