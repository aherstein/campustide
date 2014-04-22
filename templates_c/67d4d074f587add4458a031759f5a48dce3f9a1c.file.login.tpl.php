<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:30:55
         compiled from "/Users/aherstein/Sites/CampusTide/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97003004652f5dd2f803a94-31870332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67d4d074f587add4458a031759f5a48dce3f9a1c' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/login.tpl',
      1 => 1326165879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97003004652f5dd2f803a94-31870332',
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
  'unifunc' => 'content_52f5dd2f95a3e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5dd2f95a3e')) {function content_52f5dd2f95a3e($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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