{*
<!-- Coming Back Code -->
<script type="text/javascript">
	$(function() {
		$("#comingBackOverlay").dialog({
			height: 350,
			width: 625,
			modal: true,
			draggable: false,
			resizable: false,
			closeOnEscape: false,
			open: function(event, ui) {
				$(".ui-dialog-titlebar").hide();
			}
		});

		$("#comingBackEmailForm").submit(function()
		{
			$.ajax({
				url: "ajax/comingBackEmail.php",
				data: "email=" + document.getElementById("comingBackEmail").value,
				dataType: "html",
				async: true,
				success: function(data) {
					document.getElementById("comingBackMessage").innerHTML = data;
					$("#comingBackMessage").show("fade", {}, 300);
				}
			});

			return false;
		});
	});
</script>
<div id="comingBackOverlay" style="text-align: center;">
	<h1>CampusTide</h1>
	<h2 style="text-align: center;">Coming back Fall of 2012!</h2>
	<p>We are making improvements to our site in order to make your experience better.</p>
	<p>Sign up for our e-mail updates to stay up-to-date about everything CampusTide!</p>
	<p><form method="post" action="ajax/comingBackEmail.php" id="comingBackEmailForm">Enter e-mail address:&nbsp;<input type="text" name="email" id="comingBackEmail"/>&nbsp;<input type="submit" value="Submit" /></form></p>
	<p id="comingBackMessage" class="message" style="display: none;"></p>
</div>
<!-- END Coming Back Code -->
*}
	
<div id="topWrapper">
	<div id="top">
		<div id="logo">
			<a href="/index.php"><img src="/images/logo.png" alt="CampusTide" /></a>
		</div>
		<div id="slogan">
			<img src="/images/slogan.png" alt="See Everything That's Happening on Your Campus." />
		</div>
		<div id="userControls">
			{if $loggedIn}<a href="/logout.php" class="button">Log Out</a>&nbsp;<a href="/profile" class="button">My Profile</a>
			{if $admin}<a href="/admin" class="button">Admin</a>{/if}
			{else}<a href="/login.php" class="button">Log In</a>
			<a href="signup.php" class="buttonSignUp">Sign Up</a>
			{/if}
		</div>
	</div>
</div>
<div {if $section == "admin"}id="mainAdmin"{else}id="main"{/if}>
