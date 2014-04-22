<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 10:26:39
         compiled from "/Users/aherstein/Sites/CampusTide/templates/include/leftNavPublicProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186146856652f65abf34aa14-37807287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9d410d167db43b9bd0ccb8e7aefff8ce2638164' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/include/leftNavPublicProfile.tpl',
      1 => 1328673567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186146856652f65abf34aa14-37807287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'address' => 0,
    'name' => 0,
    'profilePic' => 0,
    'about' => 0,
    'type' => 0,
    'hasAdditionalSchools' => 0,
    'school' => 0,
    'additionalSchools' => 0,
    'row' => 0,
    'url' => 0,
    'addressSplit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f65abf4e99c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f65abf4e99c')) {function content_52f65abf4e99c($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/Library/WebServer/Documents/php_includes/Smarty-3.1.7/libs/plugins/modifier.replace.php';
?><script type="text/javascript">
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

		$("a#profilePic").fancybox({
			'overlayOpacity':	'0.8',
			'overlayColor'	:	'#333'
		});
	});
</script>
<div id="leftNav">
	<ul>
		<li><h2><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h2></li>
		<li><a id="profilePic" href="/images/profile/<?php echo $_smarty_tpl->tpl_vars['profilePic']->value;?>
"><img src="/images/profile/<?php echo $_smarty_tpl->tpl_vars['profilePic']->value;?>
" alt="Profile Picture" width="150" /></a></li>
		<li><?php echo $_smarty_tpl->tpl_vars['about']->value;?>
</li>
	</ul>
	<div id="profileInfo">
		<div class="profileItem"><span class="label">Type:</span><br/><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</div>
		<div class="profileItem">
			<span class="label"><?php if ($_smarty_tpl->tpl_vars['hasAdditionalSchools']->value){?>Universities<?php }else{ ?>University<?php }?>:</span><br/>
			<a href="/search.php?search=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['school']->value,' ','+');?>
&type1=true&type2=true&type3=true"><?php echo $_smarty_tpl->tpl_vars['school']->value;?>
</a>
			<?php if ($_smarty_tpl->tpl_vars['hasAdditionalSchools']->value){?><?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['additionalSchools']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?><br/><a href="/search.php?search=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['row']->value['name'],' ','+');?>
&type1=true&type2=true&type3=true"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</a><?php } ?><?php }?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['url']->value!=''){?><div class="profileItem"><span class="label">Home Page:</span>&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" target="_blank">Link</a></div><?php }?>
		<div class="profileItem"><span class="label">Address:</span><br/><?php echo $_smarty_tpl->tpl_vars['addressSplit']->value;?>
</div>
	</div>
	<div id="map_canvas" style="width: 95%; height: 200px; margin: auto;"></div>
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