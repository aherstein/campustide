{include file="include/header.tpl"}
{include file="include/top.tpl"}
{if $message != ""}<div class="message">{$message}</div>{/if}
{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
<div id="login">
	<form method="post" action="/admin/index.php">
		<span class="label">E-Mail:</span><input type="text" name="email" class="textbox" value="{$email}" required {if $autofocus == "email"}autofocus{/if} /><br/>
		<span class="label">Password:</span><input type="password" name="password" class="textbox" autocomplete="off" required {if $autofocus == "password"}autofocus{/if} /><br/>
		<input type="submit" value="Admin Log In" class="button" />
	</form>
</div>
{include file="include/footer.tpl"}