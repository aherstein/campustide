<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:34:44
         compiled from "/Users/aherstein/Sites/CampusTide/templates/include/leftNavProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76807309852f5de14bd5aa5-54572855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1b2ae86fb847493ec4e065ec814ade3e79bbc29' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/include/leftNavProfile.tpl',
      1 => 1327984326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76807309852f5de14bd5aa5-54572855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'profilePic' => 0,
    'userID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5de14be26e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5de14be26e')) {function content_52f5de14be26e($_smarty_tpl) {?><script type="text/javascript">
	$(function()
	{
		$("a#profilePic").fancybox({
			'overlayOpacity':	'0.8',
			'overlayColor'	:	'#333'
		});
	});
</script>
<div id="leftNav">
	<ul>
		<li><a id="profilePic" href="/images/profile/<?php echo $_smarty_tpl->tpl_vars['profilePic']->value;?>
"><img src="/images/profile/<?php echo $_smarty_tpl->tpl_vars['profilePic']->value;?>
" alt="Profile Picture" width="150" /></a></li>
		<li><a href="/profile/index.php" class="button">My Calendar</a></li>
		<li><a href="/profile/events.php" class="button">My Events</a></li>
		<li><a href="/profile/newEvent.php" class="button">New Event</a></li>
		<li><a href="/profile/editAccount.php" class="button">Edit Account</a></li>
		<li><a href="/profile/editProfile.php" class="button">Edit Profile</a></li>
		<li><a href="/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
" class="button">View Public Profile</a></li>
	</ul>
</div><?php }} ?>