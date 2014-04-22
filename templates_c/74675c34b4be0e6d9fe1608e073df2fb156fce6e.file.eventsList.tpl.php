<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 10:22:43
         compiled from "/Users/aherstein/Sites/CampusTide/templates/profile/eventsList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67600330752f659d3d3c908-66245121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74675c34b4be0e6d9fe1608e073df2fb156fce6e' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/profile/eventsList.tpl',
      1 => 1332369383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67600330752f659d3d3c908-66245121',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'errorMessage' => 0,
    'events' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f659d3e8cb4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f659d3e8cb4')) {function content_52f659d3e8cb4($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/leftNavProfile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
function confirmDelete(eventID)
{
	if (confirm("Are you sure you want to delete this event? This cannot be undone!"))
	{
		window.location = "events.php?a=delete&id=" + eventID;
	}
		
}
</script>
<div id="mainContent">
	<h1>My Events</h1>
	<?php if ($_smarty_tpl->tpl_vars['message']->value!=''){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
	<table cellspacing="10px">
		<tr class="header">
			<td>Name</td>
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
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['startdate'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['enddate'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['row']->value['active']=='t'){?><img src="/images/icons/true.png" alt="T" /><?php }else{ ?><img src="/images/icons/false.png" alt="F" /><?php }?></td>
			<td><a href="events.php?a=edit&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
" class="button">edit</a></td>
			
		</tr>
		<?php } ?>
	</table>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>