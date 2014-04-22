<?php /* Smarty version Smarty-3.1.7, created on 2014-02-23 10:12:57
         compiled from "/home/adamhers/www/campustide/templates/include/top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1774535927530a1e0946b442-14900039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '466abb3443476da6f9a511bbfc0efe56a2a71f68' => 
    array (
      0 => '/home/adamhers/www/campustide/templates/include/top.tpl',
      1 => 1391890192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1774535927530a1e0946b442-14900039',
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
  'unifunc' => 'content_530a1e094891d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530a1e094891d')) {function content_530a1e094891d($_smarty_tpl) {?>
	
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