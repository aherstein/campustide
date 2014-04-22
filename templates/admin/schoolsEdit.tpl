{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="admin/nav.tpl"}
<div id="adminMainContent">
	<h2>Edit School</h2>
	<form method="post" action="schools.php?a=edit">
		<span class="label">School ID:</span>{$schoolID}<br/>
		<span class="label">Name:</span><input type="text" name="name" value="{$name}" class="textbox" required /><br/>
		<span class="label">Address:</span><input type="text" name="address" value="{$address}" class="textbox" required /><br/>
		<span class="label">City:</span><input type="text" name="city" value="{$city}" class="textbox" required /><br/>
		<span class="label">State:</span><input type="text" name="state" value="{$state}" size="2" maxlength="2" class="textbox" required /><br/>
		<span class="label">Zip:</span><input type="text" name="zip" value="{$zip}" size="10" maxlength="10" class="textbox" required /><br/>
		<input type="submit" value="Edit School" class="button" />&nbsp;
		<a href="/admin/schools.php" class="button">Cancel</a>
		<input type="hidden" name="schoolID" value="{$schoolID}" />
	</form>
</div>
{include file="include/footer.tpl"}
