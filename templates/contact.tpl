{include file="include/header.tpl"}
{include file="include/top.tpl"}
<div id="contactUs">
	<h2>Contact Us</h2>
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	<form method="post" action="contact.php">
		<span class="label">Category:</span>
		<select name="category">
			{foreach $category as $key => $value}
				<option value="{$key}">{$value}</option>
			{/foreach}
		</select>
		<br/>
		<span class="label">Your E-Mail:</span><input type="email" name="email" class="textbox" value="{$email}" required /><br/>
		<span class="label">Your Inquiry:</span><textarea name="inquiry" class="textbox" required>{$inquiry}</textarea><br/>
		<input type="submit" value="Submit" class="button" />
	</form>
</div>
{include file="include/footer.tpl"}