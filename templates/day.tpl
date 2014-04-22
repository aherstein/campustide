{include file="include/header.tpl"}
{include file="include/top.tpl"}
{if isset($school_id)}
<script type="text/javascript">
	$(function() {
		$("#calendarToggle").buttonset();
	});
</script>
{/if}
<script type="text/javascript">
	function toggleCalendarView(radio)
	{
		if (radio.value == "month")
		{
			window.location = "/search.php?search={$schoolParam}&type1=true&type2=true&type3=true&month={$month}&year={$year}";
		}
	}
</script>
<div id="day">
	<h1>Events for {$name}</h1>
	<h2>{$date}</h2>
	{if isset($school_id)}
	<div id="calendarToggle">
		<input type="radio" name="view" value="month" id="month" onchange="toggleCalendarView(this);" /><label for="month">Month</label>
		<input type="radio" name="view" value="day" id="day" checked /><label for="day">Day</label>
	</div>
	{/if}
	<div id="datePicker">
		<div class="nav"><a href="day.php?{if isset($school_id)}school_id={$school_id}{/if}{if isset($user_id)}user_id={$user_id}{/if}&month={$prevWeek|date_format:"%m"}&day={$prevWeek|date_format:"%d"}&year={$prevWeek|date_format:"%Y"}"><img src="/images/left-arrow.png" /></a></div>
		{foreach $dates as $date}
			{if $date == $thisDate}<div class="thisDate">{else}<div class="date">{/if}
				{if $date != $thisDate}<a href="day.php?{if isset($school_id)}school_id={$school_id}{/if}{if isset($user_id)}user_id={$user_id}{/if}&month={$date|date_format:"%m"}&day={$date|date_format:"%d"}&year={$date|date_format:"%Y"}">{/if}<span class="month">{$date|date_format:"%a"}</span><br>{$date|date_format:"%d"}{if $date != $thisDate}</a>{/if}
			</div>
		{/foreach}
		<div class="nav"><a href="day.php?{if isset($school_id)}school_id={$school_id}{/if}{if isset($user_id)}user_id={$user_id}{/if}&month={$nextWeek|date_format:"%m"}&day={$nextWeek|date_format:"%d"}&year={$nextWeek|date_format:"%Y"}"><img src="/images/right-arrow.png" /></a></div>
	</div>
	<div id="events">
		{foreach $events as $row}
		<div class="dayEvent">
			<h3><a href="/event.php?id={$row['event_id']}">{$row['event_name']}</a></h3>
			<span class="label">Time:</span>{$row['starttime']}&nbsp;to&nbsp;{$row['endtime']}<br/>
			<span class="label">Hosted By:</span>{$row['user_name']}<br/>
			<span class="label">Type of Event:</span>{$row['type_description']}<br/>
			<span class="label">Where on Campus:</span>{if $row['location'] != ""}{$row['location']}{/if}
				{if $row['address'] != ""}<br/><span class="label"></span>{$row['address']}{/if}
				{if $row['address2'] != ""}<br/><span class="label"></span>{$row['address2']}{/if}
				{if $row['city'] != "" || $row['state'] != "" || $row['zip'] != ""}
					<br/><span class="label"></span>{$row['city']}{if $row['state'] != ""}, {$row['state']} {/if}{$row['zip']}
				{/if}
				
			<p>
				{*<span class="label">About the Event:</span>*}
				{$row['description']}
			</p>
		</div>
		{/foreach}
		{if !$hasEvents}<h1>No Events</h1>{/if}
	</div>
	<p><a href="{if isset($school_id)}search.php?search={$schoolParam}&amp;type1=true&amp;type2=true&amp;type3=true{elseif isset($user_id)}profile.php?id={$user_id}{/if}&amp;month={$month}&amp;year={$year}" class="button">Back to Calendar</a></p>
	{*<p><a href="javascript:history.go(-1)" class="button">Back to Calendar</a></p>*}
</div>
{include file="include/footer.tpl"}
