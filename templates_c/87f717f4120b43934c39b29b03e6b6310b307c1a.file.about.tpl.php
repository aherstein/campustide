<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 08:04:34
         compiled from "/Users/aherstein/Sites/CampusTide/templates/about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193435538552f5e51246ccd5-79949172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87f717f4120b43934c39b29b03e6b6310b307c1a' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/about.tpl',
      1 => 1326165868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193435538552f5e51246ccd5-79949172',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5e5125d6f1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5e5125d6f1')) {function content_52f5e5125d6f1($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="mainOneCol">
	<h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
	<p>
		<span class="bold">CampusTide</span> is a social network for an assortment of groups, organizations, and businesses located 
		on and around university campuses all across the United States. CampusTide is targeted toward the 20 million university 
		students that want to get the most out of the social activities and events offered on their campuses, and by their communities.  
		We at CampusTide believe that social interactions are a vital part of the growth and development of students, while also 
		strengthening communities of all sizes.
	</p>
	<p>
		<span class="bold">CampusTide's Mission</span> is to revive the life of university campuses and help connect students with campus life around them.
	</p>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>