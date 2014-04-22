<?php /* Smarty version Smarty-3.1.7, created on 2014-02-23 10:24:53
         compiled from "/home/adamhers/www/campustide/templates/include/leftNavEvent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1333687719530a20d556dc76-24592569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e79da28a93f7870bb2786ff2d5498623fb32bad' => 
    array (
      0 => '/home/adamhers/www/campustide/templates/include/leftNavEvent.tpl',
      1 => 1391890191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1333687719530a20d556dc76-24592569',
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
  'unifunc' => 'content_530a20d55a2b0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530a20d55a2b0')) {function content_530a20d55a2b0($_smarty_tpl) {?><script type="text/javascript">
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