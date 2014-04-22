<?php /* Smarty version Smarty-3.1.7, created on 2014-02-24 21:43:28
         compiled from "/home/adamhers/www/campustide/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2109378527530c116066d6c2-98066686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c911776c5ae443ad1d50cf65ba55b701841105c0' => 
    array (
      0 => '/home/adamhers/www/campustide/templates/login.tpl',
      1 => 1391890192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2109378527530c116066d6c2-98066686',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'errorMessage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_530c11606d596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530c11606d596')) {function content_530c11606d596($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['message']->value!=''){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
<div id="login">
	<form method="post" action="/login.php">
		<span class="label">E-Mail:</span><input type="email" name="email" class="textbox" required autofocus /><br/>
		<span class="label">Password:</span><input type="password" name="password" class="textbox" required /><br/>
		<span id="forgotPassword"><a href="forgotPassword.php">Forgot Password?</a></span>
		<input type="submit" value="Log In" class="button" />
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>