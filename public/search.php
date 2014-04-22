<?php
require_once('../include/setup.php');
require_once('../lib/SchoolCalendar.php');

function generateOptions()
{
	global $db;
	
	$options = array();
	
	// Get all types
	$db->query("SELECT type_id FROM types");

	for ($i = 1; $i <= $db->rows(); $i++)
	{
		$options[$i] = isset($_GET['type'. $i]) && $_GET['type'. $i] == "true";
	}
	
	return $options;
}

if ($_SERVER['REQUEST_METHOD'] == "GET")
{
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
	
	$school = $_GET['search'];
	$_SESSION['savedSearch'] = $school;
	$options = generateOptions();
	$cal = new SchoolCalendar($school, $options, $month, $year);
	$monthName = $months[$month];
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
	
	// Get all types
	$db->query("SELECT type_id, description_plural FROM types ORDER BY description_plural ASC");
	
	$types = array();
	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$types[$i]['type_id'] = $row['type_id'];
		$types[$i]['description'] = $row['description_plural'];
	}

	$optionsQuery = "";
	for ($i = 1; $i <= count($options); $i++)
	{
		$optionValue = $options[$i] ? 'true' : 'false';
		$optionsQuery.= "type". $i ."=". $optionValue;
		if ($i != count($options))
		{
			$optionsQuery.= "&";
		}
	}
	$queryString = "search=". str_replace(" ", "+", $school) ."&". $optionsQuery;

	// Check for empty school
	$schoolID = $cal->getSchoolID();
	$fields = array($schoolID);
	$db->query("SELECT event_id FROM events WHERE school_id = $1", $fields);
	$emptySchool = $db->rows() == 0;
	
	// Check for school logo
	if (file_exists(constant("UPLOAD_PATH_LOGOS") . $schoolID .".png"))
	{
		$smarty->assign('logo', "/images/logos/". $schoolID .".png");
	}
	
	$smarty->assign('title', "Events for ". $school);
	$smarty->assign('metaKeywords', "$school Events, $school Calendar");
	$smarty->assign('metaDescription', "Check out all of the events for $school by Month or by Day");
	$smarty->assign('school', $school);
	$smarty->assign('schoolID', $schoolID);
	$smarty->assign('monthName', $monthName);
	$smarty->assign('month', $month);
	$smarty->assign('year', $year);
	$smarty->assign('prevMonth', $prevMonth);
	$smarty->assign('prevYear', $prevYear);
	$smarty->assign('nextMonth', $nextMonth);
	$smarty->assign('nextYear', $nextYear);
	$smarty->assign('calendar', $calendar);
	$smarty->assign('queryString', str_replace("&", "&amp;", $queryString));
	$smarty->assign('toolTipCode', $cal->generateToolTips());
	$smarty->assign('types', $types);
	$smarty->assign('options', $options);
	$smarty->assign('search', $school);
	$smarty->assign('emptySchool', $emptySchool);
	$smarty->display('search.tpl');
}

require_once('../include/footer.php');
?>
