{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="admin/nav.tpl"}
<script type="text/javascript">
function setSchool()
{
	var selectBox = document.getElementsByName("school_id")[0];
	for (i = 0; i < selectBox.length; i++)
	{
		if (selectBox[i].value == "{$school_id}")
		{
			selectBox.selectedIndex = i;
			break;
		}
	}
}


function confirmDelete(userID)
{
	if (confirm("Are you sure you want to delete this user? This will also delete all the user's events. This cannot be undone!"))
	{
		window.location = "users.php?a=delete&id=" + userID;
	}
		
}
</script>
<div id="adminMainContent">
	<h2>Users</h2>
	{if $message != ""}<div class="message">{$message}</div>{/if}
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	<div id="schoolID">
		<select name="school_id" id="school_id" onchange="window.location = 'users.php?id=' + this.value;">
		<option value="0">Select A School</option>	
		{foreach $schools as $row}
			<option value="{$row['school_id']}">{$row['name']}</option>	
		{/foreach}
		</select>
		&nbsp;
		<a href="users.php" class="button" >All Users</a>
	</div>
	<p>Total: {$total}</p>
	<table cellspacing="10px">
		<tr class="header">
			<td>User ID</td>
			<td>E-Mail</td>
			<td>Name</td>
			<td>Phone</td>
			<td>School</td>
			<td>Signed Up</td>
			<td>Active</td>
			<td>Admin</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		{foreach $users as $row}
		<tr>
			<td>{$row['user_id']}</td>
			<td>{$row['email']}</td>
			<td><a href="/profile.php?id={$row['user_id']}" target="_blank" title="Go to public profile page">{$row['user_name']}</a></td>
			<td>{$row['phone']}</td>
			<td>{$row['school_name']}</td>
			<td>{$row['created_date']}</td>
			<td>{if $row['active'] == 't'}<img src="/images/icons/true.png" alt="T" />{else}<img src="/images/icons/false.png" alt="F" />{/if}</td>
			<td>{if $row['admin'] == 't'}<img src="/images/icons/true.png" alt="T" />{else}<img src="/images/icons/false.png" alt="f" />{/if}</td>
			<td><a href="users.php?a=edit&id={$row['user_id']}" class="button">edit</a></td>
			<td><a href="#" onclick="confirmDelete({$row['user_id']});" class="buttonDelete">delete</a></td>
			<td><a href="events.php?&id={$row['user_id']}" class="button">view events</a></td>
		</tr>
		{/foreach}
	</table>
</div>
{include file="include/footer.tpl"}
