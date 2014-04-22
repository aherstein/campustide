{include file="include/header.tpl"}
{include file="include/top.tpl"}
<div class="message">Please enter the email address you used to create your CampusTide account, and we will send you a new password.</div>
<div id="forgotPassword">
	<form id="searchForm" method="post" action="forgotPassword.php">
	<span class="label">E-Mail:</span>
	<input type="text" name="email" class="textbox" autofocus /><br/>
	<input type="submit" value="Submit" class="button" />
	</form>
</div>
{include file="include/footer.tpl"}