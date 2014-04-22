<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 10:29:12
         compiled from "/Users/aherstein/Sites/CampusTide/templates/admin/logos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126171597552f65b58cca0e2-99644743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24242cb3722e43fb9ac715d2e005f95d1c3c53c0' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/admin/logos.tpl',
      1 => 1327640944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126171597552f65b58cca0e2-99644743',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorMessage' => 0,
    'message' => 0,
    'logo' => 0,
    'schools' => 0,
    'row' => 0,
    'MAX_UPLOAD_SIZE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f65b58dd9eb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f65b58dd9eb')) {function content_52f65b58dd9eb($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("admin/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="adminMainContent">
	<h2>School Logo Upload</h2>
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['message']->value!=''){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['logo']->value)){?><img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" /><?php }?>
	<form method="post" action="logos.php" enctype="multipart/form-data">
		<p>
			<select name="school_id">
			<option value="0">Select A School</option>	
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['schools']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['school_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>	
			<?php } ?>
			</select>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_smarty_tpl->tpl_vars['MAX_UPLOAD_SIZE']->value;?>
">
			<input type="file" name="logo" />
		</p>
		<input type="submit" value="Upload School Logo" class="button" />&nbsp;
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>