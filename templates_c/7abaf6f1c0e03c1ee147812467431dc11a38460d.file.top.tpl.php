<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:28:03
         compiled from "/Users/aherstein/Sites/CampusTide/templates/include/top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106779834052f5dc83e7c710-15470268%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7abaf6f1c0e03c1ee147812467431dc11a38460d' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/include/top.tpl',
      1 => 1349231902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106779834052f5dc83e7c710-15470268',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'loggedIn' => 0,
    'admin' => 0,
    'section' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5dc83e8f3c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5dc83e8f3c')) {function content_52f5dc83e8f3c($_smarty_tpl) {?>
	
<div id="topWrapper">
	<div id="top">
		<div id="logo">
			<a href="/index.php"><img src="/images/logo.png" alt="CampusTide" /></a>
		</div>
		<div id="slogan">
			<img src="/images/slogan.png" alt="See Everything That's Happening on Your Campus." />
		</div>
		<div id="userControls">
			<?php if ($_smarty_tpl->tpl_vars['loggedIn']->value){?><a href="/logout.php" class="button">Log Out</a>&nbsp;<a href="/profile" class="button">My Profile</a>
			<?php if ($_smarty_tpl->tpl_vars['admin']->value){?><a href="/admin" class="button">Admin</a><?php }?>
			<?php }else{ ?><a href="/login.php" class="button">Log In</a>
			<a href="signup.php" class="buttonSignUp">Sign Up</a>
			<?php }?>
		</div>
	</div>
</div>
<div <?php if ($_smarty_tpl->tpl_vars['section']->value=="admin"){?>id="mainAdmin"<?php }else{ ?>id="main"<?php }?>>
<?php }} ?>