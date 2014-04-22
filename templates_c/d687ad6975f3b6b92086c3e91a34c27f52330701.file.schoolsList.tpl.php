<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:42:51
         compiled from "/Users/aherstein/Sites/CampusTide/templates/admin/schoolsList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175594328352f5dffbce1f73-19452857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd687ad6975f3b6b92086c3e91a34c27f52330701' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/admin/schoolsList.tpl',
      1 => 1327033461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175594328352f5dffbce1f73-19452857',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'errorMessage' => 0,
    'total' => 0,
    'schools' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5dffbd5299',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5dffbd5299')) {function content_52f5dffbd5299($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("admin/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
function confirmDelete(schoolID)
{
	if (confirm("Are you sure you want to delete this school? This cannot be undone!"))
	{
		window.location = "schools.php?a=delete&id=" + schoolID;
	}
		
}
</script>
<div id="adminMainContent">
	<h2>Schools</h2>
	<?php if ($_smarty_tpl->tpl_vars['message']->value!=''){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
	<p><a href="schools.php?a=new" class="button">New School</a></p>
	<p>Total: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</p>
	<table cellspacing="10px">
		<tr class="header">
			<td>School ID</td>
			<td>Name</td>
			<td>City</td>
			<td>State</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['schools']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['school_id'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['city'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['state'];?>
</td>
			<td><a href="schools.php?a=edit&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['school_id'];?>
" class="button">edit</a></td>
			<td><a href="#" onclick="confirmDelete(<?php echo $_smarty_tpl->tpl_vars['row']->value['school_id'];?>
);" class="buttonDelete">delete</a></td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>