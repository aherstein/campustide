<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 06:57:33
         compiled from "../templates/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121975137152f5d55d4bcdf1-65449020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc37987866dee146e1ca9fdd12c9259d52a10455' => 
    array (
      0 => '../templates/error.tpl',
      1 => 1326165874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121975137152f5d55d4bcdf1-65449020',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorMessage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5d55d614f2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5d55d614f2')) {function content_52f5d55d614f2($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="error"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>