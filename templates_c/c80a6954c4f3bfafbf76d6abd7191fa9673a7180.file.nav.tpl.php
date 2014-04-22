<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:42:49
         compiled from "/Users/aherstein/Sites/CampusTide/templates/admin/nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55152173252f5dff9804752-82383335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c80a6954c4f3bfafbf76d6abd7191fa9673a7180' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/admin/nav.tpl',
      1 => 1327638801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55152173252f5dff9804752-82383335',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adminName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5dff981113',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5dff981113')) {function content_52f5dff981113($_smarty_tpl) {?><div id="adminNav">
	<h1>Admin CP</h1>
	<p>Logged in as <b><?php echo $_smarty_tpl->tpl_vars['adminName']->value;?>
</b>.</p>
	<ul>
		<li><a href="users.php" class="button">Users</a></li>
		<li><a href="schools.php" class="button">Schools</a></li>
		<li><a href="events.php" class="button">Events</a></li>
		<li><a href="logos.php" class="button">School Logos</a></li>
		<li><a href="stats.php" class="button">Statistics</a></li>
		<li>&nbsp;</li>
		<li><a href="logout.php" class="button">Log Out</a></li>
	</ul>
</div><?php }} ?>