<?php /* Smarty version Smarty-3.1.7, created on 2014-02-25 05:29:37
         compiled from "/home/adamhers/www/campustide/templates/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1636973844530c7ea18b5d45-61354196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67f73344f0a629c7f723ec32a77c0328772e2131' => 
    array (
      0 => '/home/adamhers/www/campustide/templates/contact.tpl',
      1 => 1391890191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1636973844530c7ea18b5d45-61354196',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorMessage' => 0,
    'category' => 0,
    'key' => 0,
    'value' => 0,
    'email' => 0,
    'inquiry' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_530c7ea193656',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530c7ea193656')) {function content_530c7ea193656($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="contactUs">
	<h2>Contact Us</h2>
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
	<form method="post" action="contact.php">
		<span class="label">Category:</span>
		<select name="category">
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</option>
			<?php } ?>
		</select>
		<br/>
		<span class="label">Your E-Mail:</span><input type="email" name="email" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" required /><br/>
		<span class="label">Your Inquiry:</span><textarea name="inquiry" class="textbox" required><?php echo $_smarty_tpl->tpl_vars['inquiry']->value;?>
</textarea><br/>
		<input type="submit" value="Submit" class="button" />
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>