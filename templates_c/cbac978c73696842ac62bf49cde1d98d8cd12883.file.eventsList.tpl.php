<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:42:56
         compiled from "/Users/aherstein/Sites/CampusTide/templates/admin/eventsList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199348577952f5e0009b3f76-90866504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbac978c73696842ac62bf49cde1d98d8cd12883' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/admin/eventsList.tpl',
      1 => 1327033447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199348577952f5e0009b3f76-90866504',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'filterUser' => 0,
    'userName' => 0,
    'message' => 0,
    'errorMessage' => 0,
    'total' => 0,
    'events' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5e000b7271',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5e000b7271')) {function content_52f5e000b7271($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("admin/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
function confirmDelete(eventID)
{
	if (confirm("Are you sure you want to delete this event? This cannot be undone!"))
	{
		window.location = "events.php?a=delete&id=" + eventID;
	}
		
}
</script>
<div id="adminMainContent">
	<h2>Events<?php if ($_smarty_tpl->tpl_vars['filterUser']->value){?> for <?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
<?php }?></h2>
	<?php if ($_smarty_tpl->tpl_vars['message']->value!=''){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
	<p>Total: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</p>
	<table cellspacing="10px">
		<tr class="header">
			<td>Event ID</td>
			<td>Created</td>
			<td>Name</td>
			<td><?php if ($_smarty_tpl->tpl_vars['filterUser']->value){?>University<?php }else{ ?>Organization<?php }?></td>
			<?php if (!$_smarty_tpl->tpl_vars['filterUser']->value){?><td>University</td><?php }?>
			<td>Start Date</td>
			<td>End Date</td>
			<td>Active</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['created_date'];?>
</td>
			<td><a href="/event.php?id=<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</a></td>
			<td><?php if ($_smarty_tpl->tpl_vars['filterUser']->value){?><?php echo $_smarty_tpl->tpl_vars['row']->value['school_name'];?>
<?php }else{ ?><a href="events.php?&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
</a><?php }?></td>
			<?php if (!$_smarty_tpl->tpl_vars['filterUser']->value){?><td><?php echo $_smarty_tpl->tpl_vars['row']->value['school_name'];?>
</td><?php }?>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['startdate'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['enddate'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['row']->value['active']=='t'){?><img src="/images/icons/true.png" alt="T" /><?php }else{ ?><img src="/images/icons/false.png" alt="F" /><?php }?></td>
			<td><a href="events.php?a=edit&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
" class="button">edit</a></td>
			<td><a href="#" onclick="confirmDelete(<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
);" class="buttonDelete">delete</a></td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>