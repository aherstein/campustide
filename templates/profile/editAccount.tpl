{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="include/leftNavProfile.tpl"}
<div id="mainContent">
	<div id="editAccount">
		<h1>{$title}</h1>
		{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
		<form method="post" action="/profile/editAccount.php">
			<span class="label">Organization Name:</span><input type="text" name="name" value="{$name}" class="textbox" required /><br/>
			<span class="label">E-Mail:</span><input type="text" name="email" value="{$email}" class="textbox" autocomplete="off" required /><br/>
			<span class="label">New Password:</span><input type="password" name="password1" class="textbox" autocomplete="off" placeholder="Leave blank to not reset password" /><br/>
			{*<span class="label"></span><span class="tip">(Leave blank to not change password)</span><br/>*}
			<span class="label">New Password (Again):</span><input type="password" name="password2" class="textbox" autocomplete="off" /><br/>
			<span class="label">Type of Organization:</span>
			<select name="type">
			{foreach $types as $row}
				<option value="{$row['type_id']}">{$row['description']}</option>
			{/foreach}
			</select><br/>
			<span class="label labelBlock">{if count($additionalSchools) > 0}Universities:{else}University:{/if}</span>{$school}<br/>
			{foreach $additionalSchools as $school}
				<span class="label labelBlock"></span>{$school['name']}<br/>
			{/foreach}
			<br/>	
			<span class="label"></span>
			<input type="submit" value="Save Changes" class="button" />&nbsp;
			<a href="/profile/index.php" class="button">Cancel</a>
			<input type="hidden" name="school" value="{$school}" />
		</form>
	</div>
</div>
{include file="include/footer.tpl"}
