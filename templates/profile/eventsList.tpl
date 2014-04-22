{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="include/leftNavProfile.tpl"}
<script type="text/javascript">
function confirmDelete(eventID)
{
	if (confirm("Are you sure you want to delete this event? This cannot be undone!"))
	{
		window.location = "events.php?a=delete&id=" + eventID;
	}
		
}
</script>
<div id="mainContent">
	<h1>My Events</h1>
	{if $message != ""}<div class="message">{$message}</div>{/if}
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	<table cellspacing="10px">
		<tr class="header">
			<td>Name</td>
			<td>Start Date</td>
			<td>End Date</td>
			<td>Active</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		{foreach $events as $row}
		<tr>
			<td>{$row['name']}</td>
			<td>{$row['startdate']}</td>
			<td>{$row['enddate']}</td>
			<td>{if $row['active'] == 't'}<img src="/images/icons/true.png" alt="T" />{else}<img src="/images/icons/false.png" alt="F" />{/if}</td>
			<td><a href="events.php?a=edit&id={$row['event_id']}" class="button">edit</a></td>
			{*<td><a href="#" onclick="confirmDelete({$row['event_id']});" class="buttonDelete">delete</a></td>*}
		</tr>
		{/foreach}
	</table>
</div>
{include file="include/footer.tpl"}
