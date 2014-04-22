<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:34:57
         compiled from "/Users/aherstein/Sites/CampusTide/templates/profile/newEvent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96870371252f5de21b35094-89216518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7638ec86af5955150792d24ed3d2768d06efbba' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/profile/newEvent.tpl',
      1 => 1326165885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96870371252f5de21b35094-89216518',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'address' => 0,
    'address2' => 0,
    'city' => 0,
    'state' => 0,
    'zip' => 0,
    'title' => 0,
    'errorMessage' => 0,
    'additionalSchools' => 0,
    'row' => 0,
    'startdate' => 0,
    'name' => 0,
    'location' => 0,
    'MAX_UPLOAD_SIZE' => 0,
    'description' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5de21ceebf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5de21ceebf')) {function content_52f5de21ceebf($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
	$(function()
	{
		checkLength(document.getElementsByName('description')[0]); // Update text for description textarea length

		<?php if ($_smarty_tpl->tpl_vars['address']->value!=''||$_smarty_tpl->tpl_vars['address2']->value!=''||$_smarty_tpl->tpl_vars['city']->value!=''||$_smarty_tpl->tpl_vars['state']->value!=''||$_smarty_tpl->tpl_vars['zip']->value!=''){?>
			showAddress();
		<?php }?>
		
		var dates = $("#startdate, #enddate").datepicker(
		{
			changeMonth: false,
			numberOfMonths: 1,
			autoSize: true,
			minDate: 0
		});
	});
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
<script type="text/javascript">
	function showAddress()
	{
		document.getElementById('showAddress').style.display = "none";
		document.getElementById('address').style.display = "inherit";
	}
</script>

<?php echo $_smarty_tpl->getSubTemplate ("include/leftNavProfile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="mainContent">
	<div id="newEvent">
		<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
		<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
		<form method="post" action="/profile/newEvent.php" enctype="multipart/form-data">
			<?php if (count($_smarty_tpl->tpl_vars['additionalSchools']->value)!=0){?>
			<div id="additionalSchools">
				<span class="label">Universities:</span>
				<select name="schools[]" class="textbox" size="5" multiple>
				<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['additionalSchools']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['school_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
				<?php } ?>
				</select>
				<p>Hold Ctrl button to select more than one University.</p>
			</div>
			<?php }?>
			<span class="label">Date:</span><input type="text" name="startdate" id="startdate" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['startdate']->value;?>
" required /><br/>
			<span class="label">Time:</span>
			<select name="startdate_time">
				<option value="12:00">12:00</option>
				<option value="12:30">12:30</option>
				<option value="1:00">1:00</option>
				<option value="1:30">1:30</option>
				<option value="2:00">2:00</option>
				<option value="2:30">2:30</option>
				<option value="3:00">3:00</option>
				<option value="3:30">3:30</option>
				<option value="4:00">4:00</option>
				<option value="4:30">4:30</option>
				<option value="5:00">5:00</option>
				<option value="5:30">5:30</option>
				<option value="6:00">6:00</option>
				<option value="6:30">6:30</option>
				<option value="7:00">7:00</option>
				<option value="7:30">7:30</option>
				<option value="8:00">8:00</option>
				<option value="8:30">8:30</option>
				<option value="9:00">9:00</option>
				<option value="9:30">9:30</option>
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
				<option value="1:00">1:00</option>
				<option value="1:30">1:30</option>
				<option value="2:00">2:00</option>
				<option value="2:30">2:30</option>
				<option value="3:00">3:00</option>
				<option value="3:30">3:30</option>
				<option value="4:00">4:00</option>
				<option value="4:30">4:30</option>
				<option value="5:00">5:00</option>
				<option value="5:30">5:30</option>
				<option value="6:00">6:00</option>
				<option value="6:30">6:30</option>
				<option value="7:00">7:00</option>
				<option value="7:30">7:30</option>
				<option value="8:00">8:00</option>
				<option value="8:30">8:30</option>
				<option value="9:00">9:00</option>
				<option value="9:30">9:30</option>
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
" /><br/>
			<div id="showAddress">
				<span class="label"></span><a href="javascript:showAddress()">Enter an address</a>
			</div>
			<div id="address">
				<span class="label">Address:</span><input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
" class="textbox" /><br/>
				
				<span class="label">City:</span><input type="text" name="city" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
" /><br/>
				<span class="label">State:</span><input type="text" name="state" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" size="2" maxlength="2" /><br/>
				<span class="label">Zip:</span><input type="text" name="zip" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['zip']->value;?>
" size="10" maxlength="10" /><br/>
			</div>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_smarty_tpl->tpl_vars['MAX_UPLOAD_SIZE']->value;?>
">
			<span class="label">Event Picture:</span><input type="file" name="eventPic" /><br/>
			<span class="label">About the Event:</span><textarea name="description" class="textbox" onkeyup="checkLength(this);" required><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea><br/>
			<span class="label"></span><span id="descriptionLength" class="tip"></span><br/>
			<span class="label">Active:</span><input type="checkbox" name="active" value="true" checked /><br/><br/>
			<span class="label"></span>
			<input type="submit" value="Add New Event" class="button" />&nbsp;
			<a href="/profile/index.php" class="button">Cancel</a>
		</form>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>