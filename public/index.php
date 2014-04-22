<?php 
require_once('../include/setup.php');

// Get all types
$db->query("SELECT type_id, description_plural FROM types ORDER BY description_plural ASC");

$types = array();
for ($i = 0; $row = $db->fetch(); $i++)
{
	$types[$i]['type_id'] = $row['type_id'];
	$types[$i]['description'] = $row['description_plural'];
}

// Get previous search
$savedSearch = isset($_SESSION['savedSearch']) ? $_SESSION['savedSearch'] : "";

$smarty->assign('title', "University Events | Campus Events - CampusTide");
$smarty->assign('metaKeywords', "University, Events, Campus, CampusTide, Social, Upcoming, Local");
$smarty->assign('metaDescription', "CampusTide is a social networking event platform where university students can see events that are happening on their campus.");
$smarty->assign('onload', "document.getElementById('searchBox').focus();");
//$smarty->assign('schools', $schools);
$smarty->assign('types', $types);
$smarty->assign('search', $savedSearch);
$smarty->display('index.tpl');

require_once('../include/footer.php');
?>