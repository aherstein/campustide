<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:42:41
         compiled from "/Users/aherstein/Sites/CampusTide/templates/admin/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195780400452f5dff1c8e419-23684146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97966c258c4c2afb33890bd708a57a4becfdeac8' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/admin/login.tpl',
      1 => 1326165869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195780400452f5dff1c8e419-23684146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'errorMessage' => 0,
    'email' => 0,
    'autofocus' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5dff1e2622',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5dff1e2622')) {function content_52f5dff1e2622($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['message']->value!=''){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
<div id="login">
	<form method="post" action="/admin/index.php">
		<span class="label">E-Mail:</span><input type="text" name="email" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" required <?php if ($_smarty_tpl->tpl_vars['autofocus']->value=="email"){?>autofocus<?php }?> /><br/>
		<span class="label">Password:</span><input type="password" name="password" class="textbox" autocomplete="off" required <?php if ($_smarty_tpl->tpl_vars['autofocus']->value=="password"){?>autofocus<?php }?> /><br/>
		<input type="submit" value="Admin Log In" class="button" />
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>