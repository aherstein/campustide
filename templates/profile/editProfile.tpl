{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="include/leftNavProfile.tpl"}
<script type="text/javascript">
	$(function()
	{
		checkLength(document.getElementsByName('about')[0]); // Update text for about textarea length
	});
</script>
<script type="text/javascript">
	function checkLength(textbox)
	{
		var length = textbox.value.length;

		if (length > 400)
		{
			var over = length - 400;
			document.getElementById("aboutLength").innerHTML = over + " characters over limit!";
			document.getElementById("aboutLength").className = "tipError";
		}
		else
		{
			var remaining = 400 - length;
			document.getElementById("aboutLength").innerHTML = remaining + " characters left.";
			document.getElementById("aboutLength").className = "tip";
		}
	}
</script>
<div id="mainContent">
	<div id="editAccount">
		<h1>{$title}</h1>
		{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
		<form method="post" action="/profile/editProfile.php" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="{$MAX_UPLOAD_SIZE}">
			<span class="label">Profile Picture:</span><input type="file" name="profilePic" /><br/>
			<span class="label">Address:</span><input type="text" name="address" value="{$address}" class="textbox" required /><br/>
			<span class="label">Address 2:</span><input type="text" name="address2" value="{$address2}" class="textbox" /><br/>
			<span class="label">City:</span><input type="text" name="city" class="textbox" value="{$city}" required /><br/>
			<span class="label">State:</span><input type="text" name="state" class="textbox" value="{$state}" size="2" maxlength="2" required /><br/>
			<span class="label">Zip:</span><input type="text" name="zip" class="textbox" value="{$zip}" size="10" maxlength="10" required /><br/>
			<span class="label">Phone Number:</span><input type="tel" name="phone" value="{$phone}" class="textbox" /><br/>
			<span class="label">Web Site URL:</span><input type="url" name="url" value="{$url}" class="textbox" /><br/>
			<span class="label">About Us:</span><textarea name="about" rows="8" class="textbox" onkeyup="checkLength(this);">{$about}</textarea><br/>
			<span class="label"></span><span id="aboutLength" class="tip"></span><br/><br/>
			<span class="label"></span>
			<input type="submit" value="Save Changes" class="button" />&nbsp;
			<a href="/profile/index.php" class="button">Cancel</a>&nbsp;
			<a href="/profile/deleteProfile.php" class="buttonDelete">Delete Profile</a>
		</form>
	</div>
</div>
{include file="include/footer.tpl"}
