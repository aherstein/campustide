{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="admin/nav.tpl"}
<div id="adminMainContent">
	<h2>Statistics</h2>
	{if $message != ""}<div class="message">{$message}</div>{/if}
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	<p>
		<form method="GET" action="stats.php">
			<select name="month">
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
				<option value="all">- Year -</option>
			</select>
			<select name="year">
				{foreach $years as $year}
				<option value="{$year}">{$year}</option>
				{/foreach}
				<option value="all">- All -</option>
			</select>
			<input type="submit" value="Filter" />
		</form>
	</p>
	<h3>Profile Views</h3>
	<div class="stats">
		<table cellspacing="10px">
			<tr class="header">
				<td>Profile</td>
				<td>Views</td>
			</tr>
			{foreach $profileViews as $row}
			<tr>
				<td><a href="/profile.php?id={$row['user_id']}" target="_blank">{$row['name']}</a></td>
				<td>{math equation="round(x/2)" x=$row['count']}</td>
			</tr>
			{/foreach}
		</table>
	</div>
	
	<h3>School Calendar Views</h3>
	<div class="stats">
		<table cellspacing="10px">
			<tr class="header">
				<td>School</td>
				<td>Views</td>
			</tr>
			{foreach $schoolViews as $row}
			<tr>
				<td>{$row['name']}</td>
				<td>{math equation="round(x/2)" x=$row['count']}</td>
			</tr>
			{/foreach}
		</table>
	</div>
	<h3><a href="http://www.campustide.com/stats/awstats.pl" target="_blank">Advanced Web Statistics</a></h3>
</div>
{include file="include/footer.tpl"}
