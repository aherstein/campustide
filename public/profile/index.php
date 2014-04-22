<?php
require_once("/home/adamhers/www/campustide/include/setup.php");
require_once("$BASE_PATH/lib/UserCalendar.php");

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) // Logged in
{
	$smarty->assign('userID', $_SESSION['user_id']);
	
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
	$monthName = $months[$month];
	$cal = new UserCalendar($_SESSION['user_id'], $month, $year);
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
	
	
	$smarty->assign('title', "My Calendar");
	$smarty->assign('month', $monthName);
	$smarty->assign('year', $year);
	$smarty->assign('prevMonth', $prevMonth);
	$smarty->assign('prevYear', $prevYear);
	$smarty->assign('nextMonth', $nextMonth);
	$smarty->assign('nextYear', $nextYear);
	$smarty->assign('calendar', $calendar);
	$smarty->assign('profilePic', getProfilePic());
	$smarty->assign('toolTipCode', $cal->generateToolTips());
	$smarty->display('profile/index.tpl');
}
else
{
	include("$BASE_PATH/login.php");
}

require_once("$BASE_PATH/include/footer.php");
?>
