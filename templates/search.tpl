{include file="include/header.tpl"}
{include file="include/top.tpl"}
<script type="text/javascript">
	$(function() {
		$("#calendarToggle").buttonset();
		
		$('.event').tooltip({
			track: false, 
		    delay: 750, 
		    showURL: false,
		    extraClass: "pretty", 
		    fixPNG: true, 
		    opacity: 0.95, 
		    left: -240,
		    top: 5
		});
		
		$("#emptySchoolOverlay").dialog({
			{if !$emptySchool}disabled: true,
			autoOpen: false,{/if}
			height: 350,
			width: 600,
			modal: true,
			draggable: false,
			resizable: false,
			closeOnEscape: false,
			open: function(event, ui) {
				$(".ui-dialog-titlebar").hide();
			}
		});
	});
</script>
<script type="text/javascript">
	function toggleCalendarView(radio)
	{
		if (radio.value == "day")
		{
			window.location = "/day.php?school_id={$schoolID}&month={$month}&day=01&year={$year}";
		}
	}
</script>
<div id="searchOptions">
	<h2>Filter Search</h2>
	<form method="get" action="search.php">
		<ul>
		{foreach $types as $row}
			<li><input type="checkbox" name="type{$row['type_id']}" id="type{$row['type_id']}Checked" value="true" onclick="document.forms[0].submit();" {if $options[$row['type_id']] == 1}checked{/if} /><label for="type{$row['type_id']}Checked">{$row['description']}</label></li>
		{/foreach}
		</ul>
		<p class="tip">Hover over an event for a quick preview.</p>
		<p class="tip">Click a calendar day for a complete list of the day's events.</p>
		<input type="hidden" name="search" value="{$search}" />
		<input type="hidden" name="month" value="{$month}" />
		<input type="hidden" name="year" value="{$year}" />
	</form>
	
</div>
<div id="mainContent">
	<h1>
		{if isset($logo)}<img src="{$logo}" alt="{$school}"/>
		{else}{$school}{/if}
	</h1>
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	<div id="calendarNav">
		<a href="search.php?{$queryString}&amp;month={$prevMonth}&amp;year={$prevYear}" class="button">&lt;</a>
		<h2>{$monthName}, {$year}</h2>
		<a href="search.php?{$queryString}&amp;month={$nextMonth}&amp;year={$nextYear}" class="button">&gt;</a>
	</div>
	<div id="calendarToggle">
		<input type="radio" name="view" value="month" id="month" checked /><label for="month">Month</label>
		<input type="radio" name="view" value="day" id="day" onchange="toggleCalendarView(this);" /><label for="day">Day</label>
	</div>
	<div id="calendar">{$calendar}</div>
	<div id="emptySchoolOverlay">
		<h1>This is Available!</h1>
		<p>Student organizations or local businesses, <a href="/signup.php">sign up</a> and we'll make this calendar available!</p>
		<p>If you're a student and you know of an organization or a local business that should be here, <a href="mailto:?subject=Join CampusTide!&body=CampusTide is a place to post your events on a school calendar so students can see and attend them! Visit http://campustide.com/ today to join!">click here</a> to refer them!</p>
		<p>&nbsp;</p>
		<p><a href="/index.php" class="button">Return to Home Page</a></p>
	</div>
</div>
{include file="include/footer.tpl"}
