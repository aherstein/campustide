	{if !$loggedIn && !$adminLoggedIn && $title != "Sign Up"}
	<div id="signup">
		Are you a student organization or local business on campus?
		Sign up and post your events for free.&nbsp;
		<a href="signup.php" class="buttonSignUp">Start Posting</a>
	</div>
	{/if}
</div>
<div id="social">
	{*<div class="fb-like" data-href="https://www.facebook.com/apps/application.php?id=221643341234556" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="trebuchet ms"></div>*}
	<a href="http://twitter.com/CampusTide" target="_blank"><img src="/images/twitter.png" alt="Twitter" /></a>
	<a href="http://www.facebook.com/#!/pages/CampusTide/173413302763797?skip_nax_wizard=true" target="_blank"><img src="/images/facebook.png" alt="Face Book" /></a>
</div>
</div>
<div id="footer">
	{if $smarty.server.PHP_SELF == "/index.php"} 
	<div id="featured">
		Featured in:<br/>
		<img src="/images/daily_herald_logo.png" height="32" alt="Daily Herald"/>&nbsp;&nbsp;&nbsp;
		<img src="/images/miami_herald_logo.png" height="32" alt="Miami Herald"/>&nbsp;&nbsp;&nbsp;
		<img src="/images/sf_chronicle_logo.png" height="32" alt="SF Chronicle"/>&nbsp;&nbsp;&nbsp;
		<img src="/images/ut_sandiego_logo.png" height="32" alt="UT San Diego"/>&nbsp;&nbsp;&nbsp;
		<img src="/images/yahoo_news_logo.png" height="32" alt="Yahoo News"/>
	</div>
	{else}
	<div id="featured" style="height: 51px;"></div>
	{/if}
	<div id="footerLinks">	
		<a href="/terms.php">Terms of Use</a>&nbsp;&middot;
		<a href="/privacy.php">Privacy Policy</a>&nbsp;&middot;
		<a href="/contact.php">Contact Us</a>&nbsp;&middot;
		<a href="/about.php">About CampusTide</a>
	</div>
	<div id="copyright">CampusTide &copy; {$smarty.now|date_format:"%Y"}</div>
	</div>
</body>
</html>
