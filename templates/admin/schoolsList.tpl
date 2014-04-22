{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="admin/nav.tpl"}
<script type="text/javascript">
function confirmDelete(schoolID)
{
	if (confirm("Are you sure you want to delete this school? This cannot be undone!"))
	{
		window.location = "schools.php?a=delete&id=" + schoolID;
	}
		
}
</script>
<div id="adminMainContent">
	<h2>Schools</h2>
	{if $message != ""}<div class="message">{$message}</div>{/if}
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	<p><a href="schools.php?a=new" class="button">New School</a></p>
	<p>Total: {$total}</p>
	<table cellspacing="10px">
		<tr class="header">
			<td>School ID</td>
			<td>Name</td>
			<td>City</td>
			<td>State</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		{foreach $schools as $row}
		<tr>
			<td>{$row['school_id']}</td>
			<td>{$row['name']}</td>
			<td>{$row['city']}</td>
			<td>{$row['state']}</td>
			<td><a href="schools.php?a=edit&id={$row['school_id']}" class="button">edit</a></td>
			<td><a href="#" onclick="confirmDelete({$row['school_id']});" class="buttonDelete">delete</a></td>
		</tr>
		{/foreach}
	</table>
</div>
{include file="include/footer.tpl"}
