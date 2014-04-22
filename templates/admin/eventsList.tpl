{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="admin/nav.tpl"}
<script type="text/javascript">
function confirmDelete(eventID)
{
	if (confirm("Are you sure you want to delete this event? This cannot be undone!"))
	{
		window.location = "events.php?a=delete&id=" + eventID;
	}
		
}
</script>
<div id="adminMainContent">
	<h2>Events{if $filterUser} for {$userName}{/if}</h2>
	{if $message != ""}<div class="message">{$message}</div>{/if}
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	<p>Total: {$total}</p>
	<table cellspacing="10px">
		<tr class="header">
			<td>Event ID</td>
			<td>Created</td>
			<td>Name</td>
			<td>{if $filterUser}University{else}Organization{/if}</td>
			{if !$filterUser}<td>University</td>{/if}
			<td>Start Date</td>
			<td>End Date</td>
			<td>Active</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		{foreach $events as $row}
		<tr>
			<td>{$row['event_id']}</td>
			<td>{$row['created_date']}</td>
			<td><a href="/event.php?id={$row['event_id']}" target="_blank">{$row['name']}</a></td>
			<td>{if $filterUser}{$row['school_name']}{else}<a href="events.php?&id={$row['user_id']}">{$row['user_name']}</a>{/if}</td>
			{if !$filterUser}<td>{$row['school_name']}</td>{/if}
			<td>{$row['startdate']}</td>
			<td>{$row['enddate']}</td>
			<td>{if $row['active'] == 't'}<img src="/images/icons/true.png" alt="T" />{else}<img src="/images/icons/false.png" alt="F" />{/if}</td>
			<td><a href="events.php?a=edit&id={$row['event_id']}" class="button">edit</a></td>
			<td><a href="#" onclick="confirmDelete({$row['event_id']});" class="buttonDelete">delete</a></td>
		</tr>
		{/foreach}
	</table>
</div>
{include file="include/footer.tpl"}
