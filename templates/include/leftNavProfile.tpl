<script type="text/javascript">
	$(function()
	{
		$("a#profilePic").fancybox({
			'overlayOpacity':	'0.8',
			'overlayColor'	:	'#333'
		});
	});
</script>
<div id="leftNav">
	<ul>
		<li><a id="profilePic" href="/images/profile/{$profilePic}"><img src="/images/profile/{$profilePic}" alt="Profile Picture" width="150" /></a></li>
		<li><a href="/profile/index.php" class="button">My Calendar</a></li>
		<li><a href="/profile/events.php" class="button">My Events</a></li>
		<li><a href="/profile/newEvent.php" class="button">New Event</a></li>
		<li><a href="/profile/editAccount.php" class="button">Edit Account</a></li>
		<li><a href="/profile/editProfile.php" class="button">Edit Profile</a></li>
		<li><a href="/profile.php?id={$userID}" class="button">View Public Profile</a></li>
	</ul>
</div>