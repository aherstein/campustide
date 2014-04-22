<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:39:28
         compiled from "/Users/aherstein/Sites/CampusTide/templates/include/leftNavEvent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1174522852f5df30880f37-89029737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e054305d6889e38ae33d3f343ef5365eb8557e7e' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/include/leftNavEvent.tpl',
      1 => 1326165877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1174522852f5df30880f37-89029737',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'address' => 0,
    'userID' => 0,
    'userName' => 0,
    'eventPic' => 0,
    'profilePic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5df308a9df',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5df308a9df')) {function content_52f5df308a9df($_smarty_tpl) {?><script type="text/javascript">
	function initializeMap() 
	{
		var latlng = new google.maps.LatLng(-34.397, 150.644);
		var geocoder = new google.maps.Geocoder();
		var address = "<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
";
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
		<li><h2><a href="profile.php?id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</a></h2></li>
		<li>
			<?php if ($_smarty_tpl->tpl_vars['eventPic']->value!=''){?>
			<a id="eventPic" href="/images/events/<?php echo $_smarty_tpl->tpl_vars['eventPic']->value;?>
"><img src="/images/events/<?php echo $_smarty_tpl->tpl_vars['eventPic']->value;?>
" alt="Event Picture" width="150" /></a>
			
			<?php }else{ ?>
			<a id="eventPic" href="/images/profile/<?php echo $_smarty_tpl->tpl_vars['profilePic']->value;?>
"><img src="/images/profile/<?php echo $_smarty_tpl->tpl_vars['profilePic']->value;?>
" alt="Profile Picture" width="150" /></a>
			
			<?php }?>
		</li>
	</ul>
	<div class="separator"></div>
	<div id="map_canvas" style="width: 95%; height: 200px;"></div>
	<input type="button" id="directions" value="Directions" class="button" />
</div>
<div id="directionsDialog" title="Please enter your address:">
	<form id="directionsDialogForm" action="http://maps.google.com/maps" method="get" target="_blank">
		<input type="text" name="saddr" class="textbox" style="width: 415px;"/>
		<input type="hidden" name="daddr" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
" />
		<input type="submit" value="Get Directions" class="button" />
	</form>
</div><?php }} ?>