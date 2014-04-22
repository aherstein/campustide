{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="include/leftNavPublicProfile.tpl"}
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
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	{if $message != ""}<div class="message">{$message}</div>{/if}
	<h1>Events for {$name}</h1>
	<div id="calendarNav">
		<a href="profile.php?id={$userID}&amp;month={$prevMonth}&amp;year={$prevYear}" class="button">&lt;</a>
		<h2>{$month}, {$year}</h2>
		<a href="profile.php?id={$userID}&amp;month={$nextMonth}&amp;year={$nextYear}" class="button">&gt;</a>
	</div>
	<div id="calendar">{$calendar}</div>
</div>
{include file="include/footer.tpl"}