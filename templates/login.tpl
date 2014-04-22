{include file="include/header.tpl"}
{include file="include/top.tpl"}
{if $message != ""}<div class="message">{$message}</div>{/if}
{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
<div id="login">
	<form method="post" action="/login.php">
		<span class="label">E-Mail:</span><input type="email" name="email" class="textbox" required autofocus /><br/>
		<span class="label">Password:</span><input type="password" name="password" class="textbox" required /><br/>
		<span id="forgotPassword"><a href="forgotPassword.php">Forgot Password?</a></span>
		<input type="submit" value="Log In" class="button" />
	</form>
</div>
{include file="include/footer.tpl"}