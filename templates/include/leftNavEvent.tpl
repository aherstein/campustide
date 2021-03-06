<script type="text/javascript">
	function initializeMap() 
	{
		var latlng = new google.maps.LatLng(-34.397, 150.644);
		var geocoder = new google.maps.Geocoder();
		var address = "{$address}";
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
			}
		});
		var myOptions = 
		{
			zoom: 15,
			center: latlng,
			streetViewControl: false,
			mapTypeControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	}

	$(function()
	{
		$( "#directionsDialog" ).dialog({
			autoOpen: false,
			height: 100,
			width: 600,
			modal: true,
			draggable: false,
			resizable: false,
			buttons: {}
		});

		$( "#directions" ).click(function() {
			$( "#directionsDialog" ).dialog( "open" );
		});

		$( "#directionsDialogForm" ).submit(function() {
			$( "#directionsDialog" ).dialog( "close" );
		});

		$("a#eventPic").fancybox({
			'overlayOpacity':	'0.8',
			'overlayColor'	:	'#333'
		});
	});

</script>
<div id="leftNav">
	<ul>
		<li><h2><a href="profile.php?id={$userID}">{$userName}</a></h2></li>
		<li>
			{if $eventPic !=""}
			<a id="eventPic" href="/images/events/{$eventPic}"><img src="/images/events/{$eventPic}" alt="Event Picture" width="150" /></a>
			
			{else}
			<a id="eventPic" href="/images/profile/{$profilePic}"><img src="/images/profile/{$profilePic}" alt="Profile Picture" width="150" /></a>
			
			{/if}
		</li>
	</ul>
	<div class="separator"></div>
	<div id="map_canvas" style="width: 95%; height: 200px;"></div>
	<input type="button" id="directions" value="Directions" class="button" />
</div>
<div id="directionsDialog" title="Please enter your address:">
	<form id="directionsDialogForm" action="http://maps.google.com/maps" method="get" target="_blank">
		<input type="text" name="saddr" class="textbox" style="width: 415px;"/>
		<input type="hidden" name="daddr" value="{$address}" />
		<input type="submit" value="Get Directions" class="button" />
	</form>
</div>