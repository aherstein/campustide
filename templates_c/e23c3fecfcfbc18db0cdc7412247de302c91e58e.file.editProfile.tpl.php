<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 10:25:23
         compiled from "/Users/aherstein/Sites/CampusTide/templates/profile/editProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24591430252f65a7379d0b5-28089832%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e23c3fecfcfbc18db0cdc7412247de302c91e58e' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/profile/editProfile.tpl',
      1 => 1355460832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24591430252f65a7379d0b5-28089832',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'errorMessage' => 0,
    'MAX_UPLOAD_SIZE' => 0,
    'address' => 0,
    'address2' => 0,
    'city' => 0,
    'state' => 0,
    'zip' => 0,
    'phone' => 0,
    'url' => 0,
    'about' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f65a7388f16',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f65a7388f16')) {function content_52f65a7388f16($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/leftNavProfile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
	$(function()
	{
		checkLength(document.getElementsByName('about')[0]); // Update text for about textarea length
	});
</script>
<script type="text/javascript">
	function checkLength(textbox)
	{
		var length = textbox.value.length;

		if (length > 400)
		{
			var over = length - 400;
			document.getElementById("aboutLength").innerHTML = over + " characters over limit!";
			document.getElementById("aboutLength").className = "tipError";
		}
		else
		{
			var remaining = 400 - length;
			document.getElementById("aboutLength").innerHTML = remaining + " characters left.";
			document.getElementById("aboutLength").className = "tip";
		}
	}
</script>
<div id="mainContent">
	<div id="editAccount">
		<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
		<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
		<form method="post" action="/profile/editProfile.php" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_smarty_tpl->tpl_vars['MAX_UPLOAD_SIZE']->value;?>
">
			<span class="label">Profile Picture:</span><input type="file" name="profilePic" /><br/>
			<span class="label">Address:</span><input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
" class="textbox" required /><br/>
			<span class="label">Address 2:</span><input type="text" name="address2" value="<?php echo $_smarty_tpl->tpl_vars['address2']->value;?>
" class="textbox" /><br/>
			<span class="label">City:</span><input type="text" name="city" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
" required /><br/>
			<span class="label">State:</span><input type="text" name="state" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" size="2" maxlength="2" required /><br/>
			<span class="label">Zip:</span><input type="text" name="zip" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['zip']->value;?>
" size="10" maxlength="10" required /><br/>
			<span class="label">Phone Number:</span><input type="tel" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" class="textbox" /><br/>
			<span class="label">Web Site URL:</span><input type="url" name="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="textbox" /><br/>
			<span class="label">About Us:</span><textarea name="about" rows="8" class="textbox" onkeyup="checkLength(this);"><?php echo $_smarty_tpl->tpl_vars['about']->value;?>
</textarea><br/>
			<span class="label"></span><span id="aboutLength" class="tip"></span><br/><br/>
			<span class="label"></span>
			<input type="submit" value="Save Changes" class="button" />&nbsp;
			<a href="/profile/index.php" class="button">Cancel</a>&nbsp;
			<a href="/profile/deleteProfile.php" class="buttonDelete">Delete Profile</a>
		</form>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>