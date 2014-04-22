<?php
require_once('../../include/setup.php');

$schools  =  array();

if(isset($_GET['email']))
{
	if ($_GET['email'] == "")
	{
		echo "Please enter your email address.";
	}
	else
	{
		try
		{
			// Insert email into database
			$fields = array($_GET['email']);
			$query = $db->query("INSERT INTO coming_back_emails (email) VALUES ($1)", $fields);
			echo "Your email has been added to the list. Thank you.";
		}
		catch (Exception $e)
		{
			echo "There has been an error.";
		}
	}
}
?>
