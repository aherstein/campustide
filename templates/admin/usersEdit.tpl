{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="admin/nav.tpl"}
<div id="adminMainContent">
	<h2>Edit User</h2>
	<form method="post" action="users.php?a=edit">
		<span class="label">User ID:</span>{$userID}<br/>
		<span class="label">Name:</span><input type="text" name="name" value="{$name}" class="textbox" required /><br/>
		<span class="label">E-Mail:</span><input type="email" name="email" value="{$email}" class="textbox" required /><br/>
		<span class="label">Password:</span><input type="password" name="password" class="textbox" />&nbsp;(Leave blank to not change password)<br/>
		<span class="label">Address:</span><input type="text" name="address" value="{$address}" class="textbox" /><br/>
		<span class="label">Address 2:</span><input type="text" name="address2" value="{$address2}" class="textbox" /><br/>
		<span class="label">City:</span><input type="text" name="city" value="{$city}" class="textbox" /><br/>
		<span class="label">State:</span><input type="text" name="state" value="{$state}" size="2" maxlength="2" class="textbox" /><br/>
		<span class="label">Zip:</span><input type="text" name="zip" value="{$zip}" size="10" maxlength="10" class="textbox" /><br/>
		<span class="label">Phone Number:</span><input type="tel" name="phone" value="{$phone}" class="textbox" /><br/>
		<span class="label">URL:</span><input type="url" name="url" value="{$url}" class="textbox" /><br/>
		<span class="label">About Us:</span><textarea name="about" rows="8" class="textbox">{$about}</textarea><br/>
		<span class="label">Active:</span><input type="checkbox" name="active" value="true" {if $active}checked{/if} /><br/>
		<span class="label">Admin:</span><input type="checkbox" name="admin" value="true" {if $adminUser}checked{/if} /><br/>
		<span class="label">Type of Organization:</span>
			<select name="type">
			{foreach $types as $row}
				<option value="{$row['type_id']}">{$row['description']}</option>
			{/foreach}
			</select><br/>
		<span class="label">University:</span>
			<select name="school">
			{foreach $schools as $row}
				<option value="{$row['school_id']}">{$row['name']}</option>
			{/foreach}
			</select><br/>
		<div id="additionalSchools">
			<span class="label">Additional Universities:</span>
			<select name="additionalSchools[]" class="textboxx" size="10" multiple>
			{foreach $schools as $row}
				<option value="{$row['school_id']}">{$row['name']}</option>
			{/foreach}
			</select>
		</div>
		<br/>
		<input type="submit" value="Edit User" class="button" />&nbsp;
		<a href="/admin/users.php" class="button">Cancel</a>
		<input type="hidden" name="userID" value="{$userID}" />
	</form>
</div>
{include file="include/footer.tpl"}
