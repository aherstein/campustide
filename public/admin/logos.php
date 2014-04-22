<?php
require_once('../../include/setup.php');

$smarty->assign('section', "admin");
if (isset($_SESSION['adminName'])) $smarty->assign('adminName', $_SESSION['adminName']);

function getAllSchools()
{
	global $db;
	
	$db->query("SELECT school_id, name FROM schools ORDER BY name ASC");
			
	$schools = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$schools[$i] = $row;
	}
	
	return $schools;
}


function uploadLogo($schoolID)
{
	$path = constant("UPLOAD_PATH_LOGOS");
	$max_size = constant("MAX_UPLOAD_SIZE");
	if (isset($_FILES['logo']))
	{
		if ($_FILES['logo']['error'] !== 0)
		{
			return $_FILES['logo']['error'];
		}
		else
		{
			// Check size
			if ($_FILES['logo']['size'] > $max_size)
			{
				return UPLOAD_ERR_FORM_SIZE;
			}
			
			// Check if valid image type
			if ($_FILES['logo']['type'] == "image/png")
			{
//				$res = copy($_FILES['logo']['tmp_name'], $path . $schoolID .".png");
				$imagePath = $_FILES['logo']['tmp_name'];
				
				// Check image size and rework dimensions if too large
				$imageSize = getimagesize($imagePath);
				$origWidth = $imageSize[0];
				$origHeight = $imageSize[1];
				$width = $imageSize[0];
				$height = $imageSize[1];
				if ($width > constant("MAX_LOGO_WIDTH"))
				{
					$height = round((constant("MAX_LOGO_WIDTH") / $width) * $height);
					$width = constant("MAX_LOGO_WIDTH");
				}
				else if ($height > constant("MAX_LOGO_HEIGHT"))
				{
					$width = round((constant("MAX_LOGO_HEIGHT") / $height) * $width);
					$height = constant("MAX_LOGO_HEIGHT");
				}

				$img = imagecreatefrompng($imagePath);
				$imgResampled = imagecreatetruecolor($width, $height);
				
				// Retain transparency
				imagealphablending($imgResampled, false);
				imagesavealpha($imgResampled,true);
				$transparent = imagecolorallocatealpha($imgResampled, 255, 255, 255, 127);
				imagefilledrectangle($imgResampled, 0, 0, $width, $height, $transparent);
				
				// Resample image
				if (!imagecopyresampled($imgResampled, $img, 0, 0, 0, 0, $width, $height, $origWidth, $origHeight))
				{
					return UPLOAD_ERR_CANT_WRITE;
				}
				else if (!imagepng($imgResampled, $path . $schoolID .".png"))
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


if (isset($_SESSION['adminLoggedIn']) && $_SESSION['adminLoggedIn'] == true) // Logged in
{
	$user_id = $_SESSION['adminUserID'];
	
	// Check for admin access
	$fields = array($user_id);
	$db->query("SELECT admin FROM users WHERE user_id = $1", $fields);
	$row = $db->fetch();
	if ($row['admin'] == "f")
	{
		$smarty->assign('title', "School Logos");
		$smarty->assign('errorMessage', "You do not have the proper privileges!");
		$smarty->display('error.tpl');
	}
	else
	{	
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$schoolID = $_POST['school_id'];
			
			if ($schoolID == "0")
			{
				$smarty->assign('errorMessage', "You must select a school!");
			}
			else
			{
				$upload = uploadLogo($schoolID);
				
				switch ($upload)
				{
					case UPLOAD_ERR_OK:
						$smarty->assign('message', "School logo upload succeeded!");
						$smarty->assign('logo', "/images/logos/$schoolID.png");
						break;
					case UPLOAD_ERR_NO_FILE:
						$smarty->assign('errorMessage', "You must select an image to upload!");
						break;
					case UPLOAD_ERR_FORM_SIZE:
						$maxSizeText = number_format(constant("MAX_UPLOAD_SIZE") / 1000000, 1);
						$smarty->assign('errorMessage', "File size exceeds maximum size of $maxSizeText MB!");
						break;
					case UPLOAD_ERR_CANT_WRITE:
						$smarty->assign('errorMessage', "File upload failed!");
						break;
					case UPLOAD_ERR_EXTENSION:
						$smarty->assign('errorMessage', "Invalid file type! Only PNG images are allowed.");
						break;
				}
			}
		}
		
		$smarty->assign('schools', getAllSchools());
		$smarty->assign('MAX_UPLOAD_SIZE', constant("MAX_UPLOAD_SIZE"));
		$smarty->display('admin/logos.tpl');
	}
}
else // Show login form
{
	include('index.php');
}

require_once('../../include/footer.php');
?>
