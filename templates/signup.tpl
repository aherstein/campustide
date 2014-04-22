{include file="include/header.tpl"}
{include file="include/top.tpl"}
<script type="text/javascript">
	var RecaptchaOptions = {
		theme: 'clean'
	};
</script>
<script type="text/javascript">
	$(function()
	{
		{if $school2 != "" || $school3 != "" || $school4 != "" || $school5 != ""}
			showAdditionalSchools();
		{/if}
		
		$("#school").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});

		$("#school2").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});

		$("#school3").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});

		$("#school4").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});

		$("#school5").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});
	});
</script>
<script type="text/javascript">
	function showAdditionalSchools()
	{
		document.getElementById('showAdditionalSchools').style.display = "none";
		document.getElementById('additionalSchools').style.display = "inherit";
	}
</script>
<h1>{$title}</h1>
<div id="signupForm">
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	<form method="post" action="signup.php">
		<div id="col">
			<span class="label">Organization Name:</span><input type="text" name="name" value="{$name}" class="textbox" required /><br/>
			<span class="label">E-Mail:</span><input type="email" name="email" value="{$email}" class="textbox" required /><br/>
			<span class="label">Password:</span><input type="password" name="password1" class="textbox" required /><br/>
			<span class="label">Password (Again):</span><input type="password" name="password2" class="textbox" required /><br/>
			<span class="label">Type of Organization:</span>
			<select name="type">
			{foreach $types as $row}
				<option value="{$row['type_id']}">{$row['description']}</option>
			{/foreach}
			</select><br/>
			<span class="label">University:</span><input type="text" name="school" id="school" value="{$school}" class="textbox" required /><br/>
			<div id="showAdditionalSchools">
				<span class="label"></span><a href="javascript:showAdditionalSchools()">Associated With More Than One Campus?</a>
			</div>
			<div id="additionalSchools">
				<span class="label">{*Additional:*}</span><input type="text" name="school2" id="school2" value="{$school2}" class="textbox" /><br/>
				<span class="label"></span><input type="text" name="school3" id="school3" value="{$school3}" class="textbox" /><br/>
				<span class="label"></span><input type="text" name="school4" id="school4" value="{$school4}" class="textbox" /><br/>
				<span class="label"></span><input type="text" name="school5" id="school5" value="{$school5}" class="textbox" /><br/>
				<span class="label"></span><span class="tip">Need more? Sign up, then <a href="/contact.php" target="_blank">Contact Us</a>.</span>
			</div>
			<span class="label"></span><input type="checkbox" name="termsChecked" id="termsChecked" value="true" required /><label for="termsChecked">I have read and accept the <a href="#" onclick="javascript:window.open('terms.php', 'terms', 'menubar=no, width=925, height=800, toolbar=no, scrollbars=yes');">Terms of Use</a>.</label><br/>
			<span class="label"></span><input type="checkbox" name="privacyChecked" id="privacyChecked" value="true" required /><label for="privacyChecked">I have read and accept the <a href="#" onclick="javascript:window.open('privacy.php', 'rules', 'menubar=no, width=925, height=800, toolbar=no, scrollbars=yes');">Privacy Policy</a>.</label><br/>
			<div id="captcha">
				Please type the below text:
				<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LeOD-8SAAAAAKaNVklaA9McN-0dU6zoXglHr0UR"></script>
			</div>
			<input type="submit" value="Start Posting" class="buttonSignUp" />
		</div>
	</form>
</div>
{include file="include/footer.tpl"}