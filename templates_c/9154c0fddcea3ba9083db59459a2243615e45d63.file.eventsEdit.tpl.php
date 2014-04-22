<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 10:23:07
         compiled from "/Users/aherstein/Sites/CampusTide/templates/profile/eventsEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137430247752f659ebe4c724-32933859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9154c0fddcea3ba9083db59459a2243615e45d63' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/profile/eventsEdit.tpl',
      1 => 1326165884,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137430247752f659ebe4c724-32933859',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'startdate_time' => 0,
    'startdate_ampm' => 0,
    'enddate_time' => 0,
    'enddate_ampm' => 0,
    'message' => 0,
    'errorMessage' => 0,
    'hasAdditionalSchools' => 0,
    'school' => 0,
    'startdate' => 0,
    'name' => 0,
    'location' => 0,
    'address' => 0,
    'city' => 0,
    'state' => 0,
    'zip' => 0,
    'description' => 0,
    'active' => 0,
    'event_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f659ec0bc7b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f659ec0bc7b')) {function content_52f659ec0bc7b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/leftNavProfile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
	$(function()
	{
		var dates = $("#startdate, #enddate").datepicker(
		{
			changeMonth: false,
			numberOfMonths: 1,
			autoSize: true,
		});
	});
</script>
<script type="text/javascript">
	function populateDates()
	{
		setSelected("startdate_time", "<?php echo $_smarty_tpl->tpl_vars['startdate_time']->value;?>
");
		setSelected("startdate_ampm", "<?php echo $_smarty_tpl->tpl_vars['startdate_ampm']->value;?>
");
		setSelected("enddate_time", "<?php echo $_smarty_tpl->tpl_vars['enddate_time']->value;?>
");
		setSelected("enddate_ampm", "<?php echo $_smarty_tpl->tpl_vars['enddate_ampm']->value;?>
");
	}
</script>
<script type="text/javascript">
	function checkLength(textbox)
	{
		var length = textbox.value.length;

		if (length > 500)
		{
			var over = length - 500;
			document.getElementById("descriptionLength").innerHTML = over + " characters over limit!";
			document.getElementById("descriptionLength").className = "tipError";
		}
		else
		{
			var remaining = 500 - length;
			document.getElementById("descriptionLength").innerHTML = remaining + " characters left.";
			document.getElementById("descriptionLength").className = "tip";
		}
	}
</script>
<div id="mainContent">
	<h1>Edit Event</h1>
	<?php if ($_smarty_tpl->tpl_vars['message']->value!=''){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
		<div id="newEvent">
		<form method="post" action="events.php?a=edit">
			<?php if ($_smarty_tpl->tpl_vars['hasAdditionalSchools']->value){?><span class="label">University:</span><?php echo $_smarty_tpl->tpl_vars['school']->value;?>
<br/><?php }?>
			<span class="label">Date:</span><input type="text" name="startdate" id="startdate" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['startdate']->value;?>
" required /><br/>
			<span class="label">Time:</span>
			<select name="startdate_time">
				<option value="12:00">12:00</option>
				<option value="12:30">12:30</option>
				<option value="01:00">1:00</option>
				<option value="01:30">1:30</option>
				<option value="02:00">2:00</option>
				<option value="02:30">2:30</option>
				<option value="03:00">3:00</option>
				<option value="03:30">3:30</option>
				<option value="04:00">4:00</option>
				<option value="04:30">4:30</option>
				<option value="05:00">5:00</option>
				<option value="05:30">5:30</option>
				<option value="06:00">6:00</option>
				<option value="06:30">6:30</option>
				<option value="07:00">7:00</option>
				<option value="07:30">7:30</option>
				<option value="08:00">8:00</option>
				<option value="08:30">8:30</option>
				<option value="09:00">9:00</option>
				<option value="09:30">9:30</option>
				<option value="10:00">10:00</option>
				<option value="10:30">10:30</option>
				<option value="11:00">11:00</option>
				<option value="11:30">11:30</option>
			</select>
			<select name="startdate_ampm">
				<option value="am">am</option>
				<option value="pm">pm</option>
			</select>
			&nbsp;to&nbsp;
			<select name="enddate_time">
				<option value="12:00">12:00</option>
				<option value="12:30">12:30</option>
				<option value="01:00">1:00</option>
				<option value="01:30">1:30</option>
				<option value="02:00">2:00</option>
				<option value="02:30">2:30</option>
				<option value="03:00">3:00</option>
				<option value="03:30">3:30</option>
				<option value="04:00">4:00</option>
				<option value="04:30">4:30</option>
				<option value="05:00">5:00</option>
				<option value="05:30">5:30</option>
				<option value="06:00">6:00</option>
				<option value="06:30">6:30</option>
				<option value="07:00">7:00</option>
				<option value="07:30">7:30</option>
				<option value="08:00">8:00</option>
				<option value="08:30">8:30</option>
				<option value="09:00">9:00</option>
				<option value="09:30">9:30</option>
				<option value="10:00">10:00</option>
				<option value="10:30">10:30</option>
				<option value="11:00">11:00</option>
				<option value="11:30">11:30</option>
			</select>
			<select name="enddate_ampm">
				<option value="am">am</option>
				<option value="pm">pm</option>
			</select>
			<br/>
			<span class="label">Event Title:</span><input type="text" name="name" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" required /><br/>
			<span class="label">Where on Campus:</span><input type="text" name="location" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['location']->value;?>
" required /><br/>
			<span class="label">Address:</span><input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
" class="textbox" /><br/>
			
			<span class="label">City:</span><input type="text" name="city" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
" /><br/>
			<span class="label">State:</span><input type="text" name="state" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" size="2" maxlength="2" /><br/>
			<span class="label">Zip:</span><input type="text" name="zip" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['zip']->value;?>
" size="10" maxlength="10" /><br/>
			<span class="label">About the Event:</span><textarea name="description" class="textbox" onkeyup="checkLength(this);" required><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea><br/>
			<span class="label"></span><span id="descriptionLength" class="tip"></span><br/>
			<span class="label">Active:</span><input type="checkbox" name="active" value="true" <?php if ($_smarty_tpl->tpl_vars['active']->value){?>checked<?php }?> /><br/><br/>
			<span class="label"></span>
			<input type="submit" value="Edit Event" class="button" />&nbsp;
			<a href="events.php" class="button">Cancel</a>
			<input type="hidden" name="event_id" value="<?php echo $_smarty_tpl->tpl_vars['event_id']->value;?>
" />
		</form>
	</div>
	
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>