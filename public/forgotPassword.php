<?php 
require_once('../include/setup.php');

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$email = strtolower($_POST['email']);
	
	// Generate password reset hash
	$hash = sha1(microtime() . $email);
	$fields = array($email, $hash);
	$db->query("UPDATE users SET password_reset_hash = $2 WHERE email = $1", $fields);

	$fields = array($email);
	$db->query("SELECT email, name FROM users WHERE lower(email) = $1", $fields);
	if ($db->rows() == 1)
	{
		$row = $db->fetch();
		$name = $row['name'];
		// Send the email
		$subject = "Password Reset at CampusTide";
		$link = "http://www.campustide.com/forgotPassword.php?hash=" . $hash;
		$body = "<h2><img src=\"http://campustide.com/images/title-email.png\" width=\"127\" height=\"47\" alt=\"CampusTide\"></h2>
				<p>Hi $name,</p>
				<p>Seems you forgot your password? No worries, it happens.</p>
				<p>Please follow this link and it will automatically assign your account a new password.<br/>
				<a href=\"$link\">$link</a>
				<p>Once you have successfully logged in, we recommend you to change your password under the <i>Edit Account</i> section of your CampusTide profile!</p>
				<p>If you need any further assistance please e-mail us at Info@CampusTide.com</p>
				<p>Thanks for using CampusTide!</p>";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers.= "From: CampusTide <apache@vps.campustide.com>". "\r\n";
		$headers.= "Reply-To: CampusTide <info@campustide.com>";
		$mail = mail($email, $subject, $body, $headers);
//		echo $body;
		
		$smarty->assign('message', "Instructions on how to reset your password have been sent to your email.");
		$smarty->display('login.tpl');
	}
	else
	{
		$smarty->assign('errorMessage', "Invalid e-mail address!");
		$smarty->display('login.tpl');
	}
}
else if (isset($_GET['hash']))
{
	$hash = $_GET['hash'];
	
	// Generate new password
	$password = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,8); // Random password
	$fields = array(sha1($password), $hash);
	$db->query("UPDATE users SET password = $1, password_reset_hash = NULL WHERE password_reset_hash = $2", $fields);
	
	$smarty->assign('message', "Your password has been reset to <b>". $password ."</b>.");
	$smarty->display('login.tpl');
}
else
{
	$smarty->assign('title', "Forgot Password");
	$smarty->display('forgotPassword.tpl');
}

require_once('../include/footer.php');
?>
