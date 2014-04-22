<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:45:21
         compiled from "/Users/aherstein/Sites/CampusTide/templates/day.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212890275352f5e091ce4a45-22976096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f09d66dd4d1a973ddc1d1684688e2b4a4ef2b86' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/day.tpl',
      1 => 1326165874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212890275352f5e091ce4a45-22976096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'school_id' => 0,
    'schoolParam' => 0,
    'month' => 0,
    'year' => 0,
    'name' => 0,
    'date' => 0,
    'user_id' => 0,
    'prevWeek' => 0,
    'dates' => 0,
    'thisDate' => 0,
    'nextWeek' => 0,
    'events' => 0,
    'row' => 0,
    'hasEvents' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5e091e5e2c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5e091e5e2c')) {function content_52f5e091e5e2c($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/php_includes/Smarty-3.1.7/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['school_id']->value)){?>
<script type="text/javascript">
	$(function() {
		$("#calendarToggle").buttonset();
	});
</script>
<?php }?>
<script type="text/javascript">
	function toggleCalendarView(radio)
	{
		if (radio.value == "month")
		{
			window.location = "/search.php?search=<?php echo $_smarty_tpl->tpl_vars['schoolParam']->value;?>
&type1=true&type2=true&type3=true&month=<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
&year=<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
";
		}
	}
</script>
<div id="day">
	<h1>Events for <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h1>
	<h2><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</h2>
	<?php if (isset($_smarty_tpl->tpl_vars['school_id']->value)){?>
	<div id="calendarToggle">
		<input type="radio" name="view" value="month" id="month" onchange="toggleCalendarView(this);" /><label for="month">Month</label>
		<input type="radio" name="view" value="day" id="day" checked /><label for="day">Day</label>
	</div>
	<?php }?>
	<div id="datePicker">
		<div class="nav"><a href="day.php?<?php if (isset($_smarty_tpl->tpl_vars['school_id']->value)){?>school_id=<?php echo $_smarty_tpl->tpl_vars['school_id']->value;?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['user_id']->value)){?>user_id=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
<?php }?>&month=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['prevWeek']->value,"%m");?>
&day=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['prevWeek']->value,"%d");?>
&year=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['prevWeek']->value,"%Y");?>
"><img src="/images/left-arrow.png" /></a></div>
		<?php  $_smarty_tpl->tpl_vars['date'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['date']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['date']->key => $_smarty_tpl->tpl_vars['date']->value){
$_smarty_tpl->tpl_vars['date']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['date']->value==$_smarty_tpl->tpl_vars['thisDate']->value){?><div class="thisDate"><?php }else{ ?><div class="date"><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['date']->value!=$_smarty_tpl->tpl_vars['thisDate']->value){?><a href="day.php?<?php if (isset($_smarty_tpl->tpl_vars['school_id']->value)){?>school_id=<?php echo $_smarty_tpl->tpl_vars['school_id']->value;?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['user_id']->value)){?>user_id=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
<?php }?>&month=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%m");?>
&day=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%d");?>
&year=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%Y");?>
"><?php }?><span class="month"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%a");?>
</span><br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%d");?>
<?php if ($_smarty_tpl->tpl_vars['date']->value!=$_smarty_tpl->tpl_vars['thisDate']->value){?></a><?php }?>
			</div>
		<?php } ?>
		<div class="nav"><a href="day.php?<?php if (isset($_smarty_tpl->tpl_vars['school_id']->value)){?>school_id=<?php echo $_smarty_tpl->tpl_vars['school_id']->value;?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['user_id']->value)){?>user_id=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
<?php }?>&month=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['nextWeek']->value,"%m");?>
&day=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['nextWeek']->value,"%d");?>
&year=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['nextWeek']->value,"%Y");?>
"><img src="/images/right-arrow.png" /></a></div>
	</div>
	<div id="events">
		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
		<div class="dayEvent">
			<h3><a href="/event.php?id=<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['event_name'];?>
</a></h3>
			<span class="label">Time:</span><?php echo $_smarty_tpl->tpl_vars['row']->value['starttime'];?>
&nbsp;to&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value['endtime'];?>
<br/>
			<span class="label">Hosted By:</span><?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
<br/>
			<span class="label">Type of Event:</span><?php echo $_smarty_tpl->tpl_vars['row']->value['type_description'];?>
<br/>
			<span class="label">Where on Campus:</span><?php if ($_smarty_tpl->tpl_vars['row']->value['location']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['location'];?>
<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['row']->value['address']!=''){?><br/><span class="label"></span><?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['row']->value['address2']!=''){?><br/><span class="label"></span><?php echo $_smarty_tpl->tpl_vars['row']->value['address2'];?>
<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['row']->value['city']!=''||$_smarty_tpl->tpl_vars['row']->value['state']!=''||$_smarty_tpl->tpl_vars['row']->value['zip']!=''){?>
					<br/><span class="label"></span><?php echo $_smarty_tpl->tpl_vars['row']->value['city'];?>
<?php if ($_smarty_tpl->tpl_vars['row']->value['state']!=''){?>, <?php echo $_smarty_tpl->tpl_vars['row']->value['state'];?>
 <?php }?><?php echo $_smarty_tpl->tpl_vars['row']->value['zip'];?>

				<?php }?>
				
			<p>
				
				<?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>

			</p>
		</div>
		<?php } ?>
		<?php if (!$_smarty_tpl->tpl_vars['hasEvents']->value){?><h1>No Events</h1><?php }?>
	</div>
	<p><a href="<?php if (isset($_smarty_tpl->tpl_vars['school_id']->value)){?>search.php?search=<?php echo $_smarty_tpl->tpl_vars['schoolParam']->value;?>
&amp;type1=true&amp;type2=true&amp;type3=true<?php }elseif(isset($_smarty_tpl->tpl_vars['user_id']->value)){?>profile.php?id=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
<?php }?>&amp;month=<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
&amp;year=<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" class="button">Back to Calendar</a></p>
	
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>