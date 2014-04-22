<?php 
require_once('../include/setup.php');

$smarty->assign('title', "CampusTide Terms of Use");
$smarty->display('terms.tpl');

require_once('../include/footer.php');
?>