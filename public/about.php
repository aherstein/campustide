<?php 
require_once('../include/setup.php');

$smarty->assign('title', "About CampusTide");
$smarty->display('about.tpl');

require_once('../include/footer.php');
?>