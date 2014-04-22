<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 10:35:50
         compiled from "/Users/aherstein/Sites/CampusTide/templates/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26358044752f5de714e5903-39777772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2cc6be0a069b1bfabd9c77915ad7c612a53e973' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/search.tpl',
      1 => 1391877349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26358044752f5de714e5903-39777772',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5de7156a44',
  'variables' => 
  array (
    'emptySchool' => 0,
    'schoolID' => 0,
    'month' => 0,
    'year' => 0,
    'types' => 0,
    'row' => 0,
    'options' => 0,
    'search' => 0,
    'logo' => 0,
    'school' => 0,
    'errorMessage' => 0,
    'queryString' => 0,
    'prevMonth' => 0,
    'prevYear' => 0,
    'monthName' => 0,
    'nextMonth' => 0,
    'nextYear' => 0,
    'calendar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5de7156a44')) {function content_52f5de7156a44($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
	$(function() {
		$("#calendarToggle").buttonset();
		
		$('.event').tooltip({
			track: false, 
		    delay: 750, 
		    showURL: false,
		    extraClass: "pretty", 
		    fixPNG: true, 
		    opacity: 0.95, 
		    left: -240,
		    top: 5
		});
		
		$("#emptySchoolOverlay").dialog({
			<?php if (!$_smarty_tpl->tpl_vars['emptySchool']->value){?>disabled: true,
			autoOpen: false,<?php }?>
			height: 350,
			width: 600,
			modal: true,
			draggable: false,
			resizable: false,
			closeOnEscape: false,
			open: function(event, ui) {
				$(".ui-dialog-titlebar").hide();
			}
		});
	});
</script>
<script type="text/javascript">
	function toggleCalendarView(radio)
	{
		if (radio.value == "day")
		{
			window.location = "/day.php?school_id=<?php echo $_smarty_tpl->tpl_vars['schoolID']->value;?>
&month=<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
&day=01&year=<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
";
		}
	}
</script>
<div id="searchOptions">
	<h2>Filter Search</h2>
	<form method="get" action="search.php">
		<ul>
		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
			<li><input type="checkbox" name="type<?php echo $_smarty_tpl->tpl_vars['row']->value['type_id'];?>
" id="type<?php echo $_smarty_tpl->tpl_vars['row']->value['type_id'];?>
Checked" value="true" onclick="document.forms[0].submit();" <?php if ($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['row']->value['type_id']]==1){?>checked<?php }?> /><label for="type<?php echo $_smarty_tpl->tpl_vars['row']->value['type_id'];?>
Checked"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</label></li>
		<?php } ?>
		</ul>
		<p class="tip">Hover over an event for a quick preview.</p>
		<p class="tip">Click a calendar day for a complete list of the day's events.</p>
		<input type="hidden" name="search" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
" />
		<input type="hidden" name="month" value="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
" />
		<input type="hidden" name="year" value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" />
	</form>
	
</div>
<div id="mainContent">
	<h1>
		<?php if (isset($_smarty_tpl->tpl_vars['logo']->value)){?><img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['school']->value;?>
"/>
		<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['school']->value;?>
<?php }?>
	</h1>
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
	<div id="calendarNav">
		<a href="search.php?<?php echo $_smarty_tpl->tpl_vars['queryString']->value;?>
&amp;month=<?php echo $_smarty_tpl->tpl_vars['prevMonth']->value;?>
&amp;year=<?php echo $_smarty_tpl->tpl_vars['prevYear']->value;?>
" class="button">&lt;</a>
		<h2><?php echo $_smarty_tpl->tpl_vars['monthName']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</h2>
		<a href="search.php?<?php echo $_smarty_tpl->tpl_vars['queryString']->value;?>
&amp;month=<?php echo $_smarty_tpl->tpl_vars['nextMonth']->value;?>
&amp;year=<?php echo $_smarty_tpl->tpl_vars['nextYear']->value;?>
" class="button">&gt;</a>
	</div>
	<div id="calendarToggle">
		<input type="radio" name="view" value="month" id="month" checked /><label for="month">Month</label>
		<input type="radio" name="view" value="day" id="day" onchange="toggleCalendarView(this);" /><label for="day">Day</label>
	</div>
	<div id="calendar"><?php echo $_smarty_tpl->tpl_vars['calendar']->value;?>
</div>
	<div id="emptySchoolOverlay">
		<h1>This is Available!</h1>
		<p>Student organizations or local businesses, <a href="/signup.php">sign up</a> and we'll make this calendar available!</p>
		<p>If you're a student and you know of an organization or a local business that should be here, <a href="mailto:?subject=Join CampusTide!&body=CampusTide is a place to post your events on a school calendar so students can see and attend them! Visit http://campustide.com/ today to join!">click here</a> to refer them!</p>
		<p>&nbsp;</p>
		<p><a href="/index.php" class="button">Return to Home Page</a></p>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>