<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:34:44
         compiled from "/Users/aherstein/Sites/CampusTide/templates/profile/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78180107452f5de149c2ac8-92101323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b74d2d35dfbec2bf627bec44107906b6a38d6e5' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/profile/index.tpl',
      1 => 1327974428,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78180107452f5de149c2ac8-92101323',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorMessage' => 0,
    'message' => 0,
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
  'unifunc' => 'content_52f5de14bcf15',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5de14bcf15')) {function content_52f5de14bcf15($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/leftNavProfile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	<h1>My Calendar</h1>
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['message']->value!=''){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
	<div id="calendarNav">
		<a href="/profile/index.php?month=<?php echo $_smarty_tpl->tpl_vars['prevMonth']->value;?>
&year=<?php echo $_smarty_tpl->tpl_vars['prevYear']->value;?>
" class="button">&lt;</a>
		<h2><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</h2>
		<a href="/profile/index.php?month=<?php echo $_smarty_tpl->tpl_vars['nextMonth']->value;?>
&year=<?php echo $_smarty_tpl->tpl_vars['nextYear']->value;?>
" class="button">&gt;</a>
	</div>
	<div id="calendar"><?php echo $_smarty_tpl->tpl_vars['calendar']->value;?>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>