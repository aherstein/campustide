{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="include/leftNavEvent.tpl"}
<!--  Facebook Comments -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) { return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=221643341234556";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--  END Facebook Comments -->
<div id="mainContent">
	<div id="event">
		<h1>{$eventName}</h1>
		<span class="label">When</span>{$startdate}<br/>
		<span class="label"></span>{$starttime}&nbsp;to&nbsp;{$endtime}<br/>
		<div class="separator"></div>
		<span class="label">Where</span>{$schoolName}<br/>
		<span class="label"></span>{$location}<br/>
		{if $eventAddress}<span class="label"></span>{$address}<br/>{/if}
		<div class="separator"></div>
		<span class="label">Category</span>{$type}<br/>
		<div class="separator"></div>
		{*<span class="label labelBlock">About the Event:</span>*}{$description}<br/>
		{if $ret == "school"}<p><a href="search.php?search={$schoolParam}&amp;type1=true&amp;type2=true&amp;type3=true&amp;month={$month}&amp;year={$year}" class="button">Back to Calendar</a></p>
		{else if $ret == "user"}<p><a href="profile.php?id={$userID}" class="button">Back to Calendar</a></p>{/if}
		<div class="fb-comments" data-href="http://www.campustide.com/event.php?id={$eventID}" data-num-posts="5" data-width="675"></div>
	</div>
</div>
{include file="include/footer.tpl"}
