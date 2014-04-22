{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="include/leftNavProfile.tpl"}
<script type="text/javascript">
	$(function()
	{
		var dates = $("#startdate, #enddate").datepicker(
		{
			changeMonth: false,
			numberOfMonths: 1,
			autoSize: true,
		});
	});
</script>
<script type="text/javascript">
	function populateDates()
	{
		setSelected("startdate_time", "{$startdate_time}");
		setSelected("startdate_ampm", "{$startdate_ampm}");
		setSelected("enddate_time", "{$enddate_time}");
		setSelected("enddate_ampm", "{$enddate_ampm}");
	}
</script>
<script type="text/javascript">
	function checkLength(textbox)
	{
		var length = textbox.value.length;

		if (length > 500)
		{
			var over = length - 500;
			document.getElementById("descriptionLength").innerHTML = over + " characters over limit!";
			document.getElementById("descriptionLength").className = "tipError";
		}
		else
		{
			var remaining = 500 - length;
			document.getElementById("descriptionLength").innerHTML = remaining + " characters left.";
			document.getElementById("descriptionLength").className = "tip";
		}
	}
</script>
<div id="mainContent">
	<h1>Edit Event</h1>
	{if $message != ""}<div class="message">{$message}</div>{/if}
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
		<div id="newEvent">
		<form method="post" action="events.php?a=edit">
			{if $hasAdditionalSchools}<span class="label">University:</span>{$school}<br/>{/if}
			<span class="label">Date:</span><input type="text" name="startdate" id="startdate" class="textbox" value="{$startdate}" required />{*&nbsp;to&nbsp;<input type="text" name="enddate" id="enddate" class="textbox" />*}<br/>
			<span class="label">Time:</span>
			<select name="startdate_time">
				<option value="12:00">12:00</option>
				<option value="12:30">12:30</option>
				<option value="01:00">1:00</option>
				<option value="01:30">1:30</option>
				<option value="02:00">2:00</option>
				<option value="02:30">2:30</option>
				<option value="03:00">3:00</option>
				<option value="03:30">3:30</option>
				<option value="04:00">4:00</option>
				<option value="04:30">4:30</option>
				<option value="05:00">5:00</option>
				<option value="05:30">5:30</option>
				<option value="06:00">6:00</option>
				<option value="06:30">6:30</option>
				<option value="07:00">7:00</option>
				<option value="07:30">7:30</option>
				<option value="08:00">8:00</option>
				<option value="08:30">8:30</option>
				<option value="09:00">9:00</option>
				<option value="09:30">9:30</option>
				<option value="10:00">10:00</option>
				<option value="10:30">10:30</option>
				<option value="11:00">11:00</option>
				<option value="11:30">11:30</option>
			</select>
			<select name="startdate_ampm">
				<option value="am">am</option>
				<option value="pm">pm</option>
			</select>
			&nbsp;to&nbsp;
			<select name="enddate_time">
				<option value="12:00">12:00</option>
				<option value="12:30">12:30</option>
				<option value="01:00">1:00</option>
				<option value="01:30">1:30</option>
				<option value="02:00">2:00</option>
				<option value="02:30">2:30</option>
				<option value="03:00">3:00</option>
				<option value="03:30">3:30</option>
				<option value="04:00">4:00</option>
				<option value="04:30">4:30</option>
				<option value="05:00">5:00</option>
				<option value="05:30">5:30</option>
				<option value="06:00">6:00</option>
				<option value="06:30">6:30</option>
				<option value="07:00">7:00</option>
				<option value="07:30">7:30</option>
				<option value="08:00">8:00</option>
				<option value="08:30">8:30</option>
				<option value="09:00">9:00</option>
				<option value="09:30">9:30</option>
				<option value="10:00">10:00</option>
				<option value="10:30">10:30</option>
				<option value="11:00">11:00</option>
				<option value="11:30">11:30</option>
			</select>
			<select name="enddate_ampm">
				<option value="am">am</option>
				<option value="pm">pm</option>
			</select>
			<br/>
			<span class="label">Event Title:</span><input type="text" name="name" class="textbox" value="{$name}" required /><br/>
			<span class="label">Where on Campus:</span><input type="text" name="location" class="textbox" value="{$location}" required /><br/>
			<span class="label">Address:</span><input type="text" name="address" value="{$address}" class="textbox" /><br/>
			{*<span class="label">Address 2:</span><input type="text" name="address2" value="{$address2}" class="textbox" /><br/>*}
			<span class="label">City:</span><input type="text" name="city" class="textbox" value="{$city}" /><br/>
			<span class="label">State:</span><input type="text" name="state" class="textbox" value="{$state}" size="2" maxlength="2" /><br/>
			<span class="label">Zip:</span><input type="text" name="zip" class="textbox" value="{$zip}" size="10" maxlength="10" /><br/>
			<span class="label">About the Event:</span><textarea name="description" class="textbox" onkeyup="checkLength(this);" required>{$description}</textarea><br/>
			<span class="label"></span><span id="descriptionLength" class="tip"></span><br/>
			<span class="label">Active:</span><input type="checkbox" name="active" value="true" {if $active}checked{/if} /><br/><br/>
			<span class="label"></span>
			<input type="submit" value="Edit Event" class="button" />&nbsp;
			<a href="events.php" class="button">Cancel</a>
			<input type="hidden" name="event_id" value="{$event_id}" />
		</form>
	</div>
	
</div>
{include file="include/footer.tpl"}
