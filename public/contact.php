<?php 
require_once('../include/setup.php');

$smarty->assign('title', "Contact Us");

$category = array(
	'account' => "Account Inquiries",
	'report' => "Report an Event/User",
	'general' => "General Questions",
	'bug' => "Report Bug",
	'feedback' => "Feedback",
	'feature' => "Request New Features",
	'other' => "Other"
);
			

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$categoryType = strip_tags($_POST['category']);
	$userEmail = strip_tags($_POST['email']);
	$inquiry = strip_tags($_POST['inquiry']);
	
	// Set smarty variables to remember inputs
	$smarty->assign('category', $category);
	$smarty->assign('email', $userEmail);
	$smarty->assign('inquiry', $inquiry);
	$smarty->assign('onload', "setSelected('category', '$categoryType')");
	
	if ($userEmail == "")
	{	
		$smarty->assign('errorMessage', "E-Mail can not be blank!");
		$smarty->display('contact.tpl');
	}
	else if (preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $userEmail) == 0)
	{
		$smarty->assign('errorMessage', $userEmail . " is not a valid e-mail!");
		$smarty->display('contact.tpl');
	}
	elseif ($inquiry == "")
	{
		$smarty->assign('errorMessage', "Inquiry can not be blank!");
		$smarty->display('contact.tpl');
	}
	else
	{
	
		$destinationEmail = "info@campustide.com";
		
		// Send the email
		$subject = $category[$categoryType];
		$body = $inquiry;
		$headers = "From: $userEmail";
		$mail = mail($destinationEmail, $subject, $body, $headers);
		
		$smarty->assign('message', "Your inquiry has been sent. Thank you.");
		$smarty->display('message.tpl');
	}
}
else
{
	$smarty->assign('category', $category);
	$smarty->assign('email', "");
	$smarty->assign('inquiry', "");
	$smarty->display('contact.tpl');
}

require_once('../include/footer.php');
?>