<?php
require_once('../include/setup.php');

function checkCaptcha()
{
	$url = 'http://www.google.com/recaptcha/api/verify';
	$post = array(
	            'privatekey' => "6LeOD-8SAAAAAG5BnUJeuJJpRp0oeMToWKU5gVZn",
	            'remoteip' => getenv("REMOTE_ADDR"),
	            'challenge' => $_POST['recaptcha_challenge_field'],
	            'response' => $_POST['recaptcha_response_field']
	        );
	
    $defaults = array(
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url,
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_POSTFIELDS => http_build_query($post)
    );

    $ch = curl_init();
    curl_setopt_array($ch, $defaults);
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    
    $returnCode = explode("\n", $result);
	return $returnCode[0] == "true";
} 


// Get all schools
$db->query("SELECT school_id, name FROM schools ORDER BY name ASC");

$schools = array();
for ($i = 0; $row = $db->fetch(); $i++)
{
	$schools[$i]['school_id'] = $row['school_id'];
	$schools[$i]['name'] = $row['name'];
}

// Get all types
$db->query("SELECT type_id, description FROM types ORDER BY description ASC");

$types = array();
for ($i = 0; $row = $db->fetch(); $i++)
{
	$types[$i]['type_id'] = $row['type_id'];
	$types[$i]['description'] = $row['description'];
}

// Set common smarty variables
$smarty->assign('title', "Sign Up");
$smarty->assign('schools', $schools);
$smarty->assign('types', $types);


if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$password1 = sha1($_POST['password1']);
	$password2 = sha1($_POST['password2']);
	$type = strip_tags($_POST['type']);
	$school = strip_tags($_POST['school']);
	$school2 = strip_tags($_POST['school2']);
	$school3 = strip_tags($_POST['school3']);
	$school4 = strip_tags($_POST['school4']);
	$school5 = strip_tags($_POST['school5']);
	$termsChecked = isset($_POST['termsChecked']);
	$privacyChecked = isset($_POST['privacyChecked']);
	$school_id = 0;
	$ip = getIPAddress();
	$additionalSchools = isset($_POST['additionalSchools']) ? $_POST['additionalSchools'] : array();
	
	// Set smarty variables to remember inputs
	$smarty->assign('name', $name);
	$smarty->assign('email', $email);
	$smarty->assign('school', $school);
	$smarty->assign('school2', $school2);
	$smarty->assign('school3', $school3);
	$smarty->assign('school4', $school4);
	$smarty->assign('school5', $school5);
	$smarty->assign('onload', "setSelected('type', '$type');");
	
	// Remember Additional Universities input
	if (count($additionalSchools) > 0)
	{
		$schoolJSArray = "[";
		for ($i = 0; $i < count($additionalSchools); $i++)
		{
			$schoolJSArray.="'". $additionalSchools[$i] ."'";
			if ($i != count($additionalSchools) - 1)
			{
				$schoolJSArray.=", ";
			}
		}
		$schoolJSArray.= "]";
//		$onload.="setSelectedMultiple('additionalSchools[]', '$schoolJSArray');";
		$smarty->assign('schoolJSArray', $schoolJSArray);
	}
	
	
	
	// Check for duplicate email
	$fields = array($email);
	$db->query("SELECT * FROM users WHERE email = $1", $fields);
	$duplicateEmail = $db->rows() == 1;
	
	// Validation
	if (!checkCaptcha())
	{
		$smarty->assign('errorMessage', "The CAPTCHA solution was incorrect!");
		$smarty->display('signup.tpl');
	}
	else if ($email =="")
	{
		$smarty->assign('errorMessage', "E-Mail cannot be blank!");
		$smarty->display('signup.tpl');
	}
	else if (preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email) == 0)
	{
		$smarty->assign('errorMessage', $email . " is not a valid e-mail!");
		$smarty->display('signup.tpl');
	}
	else if ($duplicateEmail)
	{
		$smarty->assign('errorMessage', "E-Mail address ". $email . " is already in use!");
		$smarty->display('signup.tpl');
	}
	elseif ($password1 != $password2)
	{
		$smarty->assign('errorMessage', "Passwords do not match!");
		$smarty->display('signup.tpl');
	}
	elseif ($password1 == "")
	{
		$smarty->assign('errorMessage', "Password can not be blank!");
		$smarty->display('signup.tpl');
	}
	elseif (strlen($password1) < 4)
	{
		$smarty->assign('errorMessage', "Password must be 4 characters or more!");
		$smarty->display('signup.tpl');
	}
	else if (!$termsChecked)
	{
		$smarty->assign('errorMessage', "You did not accept the Terms of Use!");
		$smarty->display('signup.tpl');
	}
	else if (!$privacyChecked)
	{
		$smarty->assign('errorMessage', "You did not accept the Privacy Policy!");
		$smarty->display('signup.tpl');
	}
	else if ($name =="")
	{
		$smarty->assign('errorMessage', "Organization name cannot be blank!");
		$smarty->display('signup.tpl');
	}
	else if (count($additionalSchools) >= 5)
	{
		$smarty->assign('errorMessage', "You may not select more than five additional schools! Please <a href=\"contact.php\">contact us</a> if you need more.");
		$smarty->display('signup.tpl');
	}
	else if ($school != "")
	{
		$fields = array($school);
		$db->query("SELECT school_id FROM schools WHERE name = $1", $fields);
		
		if ($db->rows() == 0)
		{
			$smarty->assign('errorMessage', "University ". $school ." does not exist in the system. <a href=\"mailto:info@campustide.com?subject=Requesting University&body=Please add ". $school ." to the CampusTide system.\">E-mail us to request it.</a>");
			$smarty->display('error.tpl');
		}
		else // Validated
		{
			$row = $db->fetch();
			$school_id = $row['school_id'];
			
			// Insert into database
			$fields = array($name, $email, $password1, $type, $school_id, $ip);
			$db->query("INSERT INTO users (name, email, password, type_id, school_id, ip_address) VALUES ($1, $2, $3, $4, $5, $6)", $fields);
			
			// Insert additional schools
			$additionalSchools = array();
			if ($school2 != "") array_push($additionalSchools, $school2);
			if ($school3 != "") array_push($additionalSchools, $school3);
			if ($school4 != "") array_push($additionalSchools, $school4);
			if ($school5 != "") array_push($additionalSchools, $school5);
			
			if (count($additionalSchools) > 0)
			{
				// Get current user id
				$db->query("SELECT currval('users_user_id_seq'::regclass) AS user_id FROM users");
				$row = $db->fetch();
				$user_id = $row['user_id'];
				
//				for ($i = 0; $i < count($additionalSchools); $i++)
//				{
//					$fields = array($user_id, $additionalSchools[$i]);
//					$db->query("INSERT INTO additional_schools (user_id, school_id) VALUES ($1, $2)", $fields);
//				}

				for ($i = 0; $i < count($additionalSchools); $i++)
				{
					$fields = array($additionalSchools[$i]);
					$db->query("SELECT school_id FROM schools WHERE name = $1", $fields); //Check if valid school
					
					if ($db->rows() != 0)
					{
						$fields = array($user_id, $additionalSchools[$i]);
						$db->query("INSERT INTO additional_schools (user_id, school_id) VALUES ($1, (SELECT school_id FROM schools WHERE name = $2))", $fields);
					}
				}
			}
			
			// Send mail when new user signs up
			$email = "info@campustide.com";
			$subject = "New User Signup at CampusTide";
			$body = "$name has signed up with CampusTide!";
			$headers = "From: CampusTide <info@campustide.com>";
			$mail = mail($email, $subject, $body, $headers);
			
			$smarty->display('signupSuccess.tpl');
		}
	}
}
else
{	
	// Set blank values for all fields
	$smarty->assign('name', "");
	$smarty->assign('email', "");
	$smarty->assign('school', "");
	$smarty->assign('school2', "");
	$smarty->assign('school3', "");
	$smarty->assign('school4', "");
	$smarty->assign('school5', "");
//	$smarty->assign('onload', "checkLength(document.getElementsByName('about')[0]);");
	$smarty->assign('schools', $schools);
	
	$smarty->display('signup.tpl');
}

require_once('../include/footer.php');
?>