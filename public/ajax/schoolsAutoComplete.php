<?php
require_once('../../include/setup.php');

$schools  =  array();

if(isset($_GET['term']))
{
	$fields = isset($_GET['exact']) ? array(strtolower($_GET['term'])) : array(strtolower($_GET['term']) ."%");
	$query = $db->query("SELECT school_id, name FROM schools WHERE lower(name) LIKE $1 ORDER BY name ASC LIMIT 10", $fields); 

	for ($i = 0; $row = $db->fetch(); $i++)
	{
		$schools[$i]['id'] = $row['school_id'];
		$schools[$i]['value'] = $row['name'];
	}

	// if($db->rows() < 1) $schools[] = "No Results Found";

	if($db->rows() >= 1) 
	{
		echo json_encode($schools);
	}
}
?>
