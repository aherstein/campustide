<?php 
if (constant("DEBUG") == true)
{
	$tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
	// Get total number of database queries
	$debug = "Queries: ". $db->getNumQueries();

	// Get script execution time
	$timeEnd = microtime(true);
	$time = number_format($timeEnd - $timeStart, 5);
	$debug .= $tab . "Script excecuted in $time seconds";
	
	echo "<div style=\"text-align: center; font-weight: bold;\">$debug</div>";
}
?>