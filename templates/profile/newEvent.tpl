{include file="include/header.tpl"}
{include file="include/top.tpl"}
<script type="text/javascript">
	$(function()
	{
		checkLength(document.getElementsByName('description')[0]); // Update text for description textarea length

		{if $address != "" || $address2 != "" || $city != "" || $state != "" || $zip != ""}
			showAddress();
		{/if}
		
		var dates = $("#startdate, #enddate").datepicker(
		{
			changeMonth: false,
			numberOfMonths: 1,
			autoSize: true,
			minDate: 0
		});
	});
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
<script type="text/javascript">
	function showAddress()
	{
		document.getElementById('showAddress').style.display = "none";
		document.getElementById('address').style.display = "inherit";
	}
</script>

{include file="include/leftNavProfile.tpl"}
<div id="mainContent">
	<div id="newEvent">
		<h1>{$title}</h1>
		{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
		<form method="post" action="/profile/newEvent.php" enctype="multipart/form-data">
			{if count($additionalSchools) != 0}
			<div id="additionalSchools">
				<span class="label">Universities:</span>
				<select name="schools[]" class="textbox" size="5" multiple>
				{foreach $additionalSchools as $row}
					<option value="{$row['school_id']}">{$row['name']}</option>
				{/foreach}
				</select>
				<p>Hold Ctrl button to select more than one University.</p>
			</div>
			{/if}
			<span class="label">Date:</span><input type="text" name="startdate" id="startdate" class="textbox" value="{$startdate}" required />{*&nbsp;to&nbsp;<input type="text" name="enddate" id="enddate" class="textbox" />*}<br/>
			<span class="label">Time:</span>
			<select name="startdate_time">
				<option value="12:00">12:00</option>
				<option value="12:30">12:30</option>
				<option value="1:00">1:00</option>
				<option value="1:30">1:30</option>
				<option value="2:00">2:00</option>
				<option value="2:30">2:30</option>
				<option value="3:00">3:00</option>
				<option value="3:30">3:30</option>
				<option value="4:00">4:00</option>
				<option value="4:30">4:30</option>
				<option value="5:00">5:00</option>
				<option value="5:30">5:30</option>
				<option value="6:00">6:00</option>
				<option value="6:30">6:30</option>
				<option value="7:00">7:00</option>
				<option value="7:30">7:30</option>
				<option value="8:00">8:00</option>
				<option value="8:30">8:30</option>
				<option value="9:00">9:00</option>
				<option value="9:30">9:30</option>
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
				<option value="1:00">1:00</option>
				<option value="1:30">1:30</option>
				<option value="2:00">2:00</option>
				<option value="2:30">2:30</option>
				<option value="3:00">3:00</option>
				<option value="3:30">3:30</option>
				<option value="4:00">4:00</option>
				<option value="4:30">4:30</option>
				<option value="5:00">5:00</option>
				<option value="5:30">5:30</option>
				<option value="6:00">6:00</option>
				<option value="6:30">6:30</option>
				<option value="7:00">7:00</option>
				<option value="7:30">7:30</option>
				<option value="8:00">8:00</option>
				<option value="8:30">8:30</option>
				<option value="9:00">9:00</option>
				<option value="9:30">9:30</option>
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
			<span class="label">Where on Campus:</span><input type="text" name="location" class="textbox" value="{$location}" /><br/>
			<div id="showAddress">
				<span class="label"></span><a href="javascript:showAddress()">Enter an address</a>
			</div>
			<div id="address">
				<span class="label">Address:</span><input type="text" name="address" value="{$address}" class="textbox" /><br/>
				{*<span class="label">Address 2:</span><input type="text" name="address2" value="{$address2}" class="textbox" /><br/>*}
				<span class="label">City:</span><input type="text" name="city" class="textbox" value="{$city}" /><br/>
				<span class="label">State:</span><input type="text" name="state" class="textbox" value="{$state}" size="2" maxlength="2" /><br/>
				<span class="label">Zip:</span><input type="text" name="zip" class="textbox" value="{$zip}" size="10" maxlength="10" /><br/>
			</div>
			<input type="hidden" name="MAX_FILE_SIZE" value="{$MAX_UPLOAD_SIZE}">
			<span class="label">Event Picture:</span><input type="file" name="eventPic" /><br/>
			<span class="label">About the Event:</span><textarea name="description" class="textbox" onkeyup="checkLength(this);" required>{$description}</textarea><br/>
			<span class="label"></span><span id="descriptionLength" class="tip"></span><br/>
			<span class="label">Active:</span><input type="checkbox" name="active" value="true" checked /><br/><br/>
			<span class="label"></span>
			<input type="submit" value="Add New Event" class="button" />&nbsp;
			<a href="/profile/index.php" class="button">Cancel</a>
		</form>
	</div>
</div>
{include file="include/footer.tpl"}
