{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="include/leftNavProfile.tpl"}
<script type="text/javascript">
	$(function() {
		$('.event').tooltip({
			track: false, 
		    delay: 750, 
		    showURL: false,
		    extraClass: "pretty", 
		    fixPNG: true, 
		    opacity: 0.95, 
		    left: -120
		});
	});
</script>
<div id="mainContent">
	<h1>My Calendar</h1>
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	{if $message != ""}<div class="message">{$message}</div>{/if}
	<div id="calendarNav">
		<a href="/profile/index.php?month={$prevMonth}&year={$prevYear}" class="button">&lt;</a>
		<h2>{$month}, {$year}</h2>
		<a href="/profile/index.php?month={$nextMonth}&year={$nextYear}" class="button">&gt;</a>
	</div>
	<div id="calendar">{$calendar}</div>
</div>
{include file="include/footer.tpl"}