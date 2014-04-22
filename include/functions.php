<?php
require_once("$BASE_PATH/lib/Database.php");

function getProfilePic($userID = 0)
{
	$db = new Database();
	
	if ($userID == 0) $userID = $_SESSION['user_id'];
	$fields = array($userID);
	$db->query("SELECT profile_img FROM users WHERE user_id = $1", $fields);
	$row = $db->fetch();
	return $row['profile_img'] != "" ? $row['profile_img'] : "default.png";
}


function getIPAddress()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}


function printArray($array)
{
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}


function getAdditionalSchools($user_id)
{
	$db = new Database();
	
	$fields = array($user_id);
	$query = "SELECT additional_schools.school_id, 
					schools.name 
			  FROM additional_schools, schools 
			  WHERE additional_schools.user_id = $1 AND 
			  additional_schools.school_id = schools.school_id
			  ORDER BY schools.name ASC";
	$db->query($query, $fields);
	
	$additionalSchools = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$additionalSchools[$i]['school_id'] = $row['school_id'];
		$additionalSchools[$i]['name'] = $row['name'];
	}

	return $additionalSchools;
}


function hasAdditionalSchools($user_id)
{
	$db = new Database();
	
	$fields = array($user_id);
	$db->query("select COUNT(*) FROM additional_schools WHERE user_id = $1", $fields);
	$row = $db->fetch();
	
	return $row['count'] != '0';
}


function debugInfo($tpl_source, Smarty_Internal_Template $template)
{
	if (constant("DEBUG") == true)
	{
		$debug = "Queries: ". $db->getNumQueries();
//		$smarty->assign('debug', $debug);
		return "<?php echo $debug; ?>\n".$tpl_source;
	}
}
?>