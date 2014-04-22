<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 10:26:39
         compiled from "/Users/aherstein/Sites/CampusTide/templates/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130415845952f65abf295512-69251000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c7422e1e2d54741759226afe3b0f2a8ce2cf7c2' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/profile.tpl',
      1 => 1326165886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130415845952f65abf295512-69251000',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorMessage' => 0,
    'message' => 0,
    'name' => 0,
    'userID' => 0,
    'prevMonth' => 0,
    'prevYear' => 0,
    'month' => 0,
    'year' => 0,
    'nextMonth' => 0,
    'nextYear' => 0,
    'calendar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f65abf34292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f65abf34292')) {function content_52f65abf34292($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/leftNavPublicProfile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
	$(function() {
		$('.event').tooltip({
			track: false, 
		    delay: 750, 
		    showURL: false,
		    extraClass: "pretty", 
		    fixPNG: true, 
		    opacity: 0.95, 
		    left: -120
		});
	});
</script>
<div id="mainContent">
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['message']->value!=''){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
	<h1>Events for <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h1>
	<div id="calendarNav">
		<a href="profile.php?id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
&amp;month=<?php echo $_smarty_tpl->tpl_vars['prevMonth']->value;?>
&amp;year=<?php echo $_smarty_tpl->tpl_vars['prevYear']->value;?>
" class="button">&lt;</a>
		<h2><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</h2>
		<a href="profile.php?id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
&amp;month=<?php echo $_smarty_tpl->tpl_vars['nextMonth']->value;?>
&amp;year=<?php echo $_smarty_tpl->tpl_vars['nextYear']->value;?>
" class="button">&gt;</a>
	</div>
	<div id="calendar"><?php echo $_smarty_tpl->tpl_vars['calendar']->value;?>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>