<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:30:15
         compiled from "/Users/aherstein/Sites/CampusTide/templates/signupSuccess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174355096252f5dd07656727-76142312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75bb3f3bcc175e8891216ed72766b602adf428ce' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/signupSuccess.tpl',
      1 => 1355461758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174355096252f5dd07656727-76142312',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5dd076fbd7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5dd076fbd7')) {function content_52f5dd076fbd7($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
<div id="signupSuccess">

	<p>Welcome to CampusTide! Your next steps should be:</p>

	<ol>
		<li>Log In and complete your profile page in the "Edit Profile" Section.</li>
		<li>Start spreading the word about your events and organization!</li>
	</ol>
	
	<p><a href="login.php" class="button">Log in here</a></p>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>