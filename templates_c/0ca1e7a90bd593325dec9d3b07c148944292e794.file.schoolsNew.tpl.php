<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:43:51
         compiled from "/Users/aherstein/Sites/CampusTide/templates/admin/schoolsNew.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34809382052f5e037430cf9-02223883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ca1e7a90bd593325dec9d3b07c148944292e794' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/admin/schoolsNew.tpl',
      1 => 1326165871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34809382052f5e037430cf9-02223883',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5e0375a35e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5e0375a35e')) {function content_52f5e0375a35e($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("admin/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="adminMainContent">
	<h2>New School</h2>
	<form method="post" action="schools.php?a=new">
		<span class="label">Name:</span><input type="text" name="name" class="textbox" required /><br/>
		<span class="label">Address:</span><input type="text" name="address" class="textbox" required /><br/>
		<span class="label">City:</span><input type="text" name="city" class="textbox" required /><br/>
		<span class="label">State:</span><input type="text" name="state" size="2" maxlength="2" class="textbox" required /><br/>
		<span class="label">Zip:</span><input type="text" name="zip" size="10" maxlength="10" class="textbox" required /><br/>
		<input type="submit" value="New School" class="button" />&nbsp;
		<a href="/admin/schools.php" class="button">Cancel</a>
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>