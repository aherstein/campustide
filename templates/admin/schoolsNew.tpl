{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="admin/nav.tpl"}
<div id="adminMainContent">
	<h2>New School</h2>
	<form method="post" action="schools.php?a=new">
		<span class="label">Name:</span><input type="text" name="name" class="textbox" required /><br/>
		<span class="label">Address:</span><input type="text" name="address" class="textbox" required /><br/>
		<span class="label">City:</span><input type="text" name="city" class="textbox" required /><br/>
		<span class="label">State:</span><input type="text" name="state" size="2" maxlength="2" class="textbox" required /><br/>
		<span class="label">Zip:</span><input type="text" name="zip" size="10" maxlength="10" class="textbox" required /><br/>
		<input type="submit" value="New School" class="button" />&nbsp;
		<a href="/admin/schools.php" class="button">Cancel</a>
	</form>
</div>
{include file="include/footer.tpl"}
