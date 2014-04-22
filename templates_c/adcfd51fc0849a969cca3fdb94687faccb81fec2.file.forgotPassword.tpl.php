<?php /* Smarty version Smarty-3.1.7, created on 2014-02-25 05:59:22
         compiled from "/home/adamhers/www/campustide/templates/forgotPassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92181266530c859adc7501-60953539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adcfd51fc0849a969cca3fdb94687faccb81fec2' => 
    array (
      0 => '/home/adamhers/www/campustide/templates/forgotPassword.tpl',
      1 => 1391890191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92181266530c859adc7501-60953539',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_530c859ae0bb3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530c859ae0bb3')) {function content_530c859ae0bb3($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="message">Please enter the email address you used to create your CampusTide account, and we will send you a new password.</div>
<div id="forgotPassword">
	<form id="searchForm" method="post" action="forgotPassword.php">
	<span class="label">E-Mail:</span>
	<input type="text" name="email" class="textbox" autofocus /><br/>
	<input type="submit" value="Submit" class="button" />
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>