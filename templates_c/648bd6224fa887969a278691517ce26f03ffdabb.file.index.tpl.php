<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:28:03
         compiled from "/Users/aherstein/Sites/CampusTide/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16027684552f5dc83e148b6-02183546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '648bd6224fa887969a278691517ce26f03ffdabb' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/index.tpl',
      1 => 1349313882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16027684552f5dc83e148b6-02183546',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'types' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5dc83e641c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5dc83e641c')) {function content_52f5dc83e641c($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
	$(function() {
		$("#searchBox").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: true
		});
				

		// Error message
		// set effect from select menu value
		$("#searchForm").submit(function()
		{
			var error = false;
			
			$("#errorMessage").hide();

			var search = document.forms[0].search.value;
			if (search == "")
			{
				document.getElementById("errorMessage").innerHTML = "You must enter a University name!";
				$("#errorMessage").show("fade", {}, 300);
				document.forms[0].search.focus();
				error = true;
			}
			else
			{
//				$.get('ajax/schoolsAutoComplete.php', "exact=true&term=" + document.getElementById("searchBox").value, function(data) {
				$.ajax({
					url: "ajax/schoolsAutoComplete.php",
					data: "exact=true&term=" + document.getElementById("searchBox").value,
					dataType: "json",
					async: false,
					success: function(data) {
						if (data == null)
						{
							document.getElementById("errorMessage").innerHTML = "University " + "\"" + search + "\"" + " not found!";
							$("#errorMessage").show("fade", {}, 300);
							document.forms[0].search.focus();
							document.forms[0].search.select();
							error = true;
						}
					}
				});
//				}, "json");
			}
			
			return !error;
		});

		$("#searchBox").keydown(function()
		{
			$("#errorMessage").hide("fade", {}, 300);
		});

		$("#errorMessage").hide();
	});
</script>

<div id="search">
	<img src="/images/splash.png" alt="CampusTide" />
	<form method="get" action="search.php" id="searchForm">
		<span class="label">Enter University Name:</span>
		<div id="searchControls">
			<input type="text" name="search" id="searchBox" class="textbox"  />&nbsp;
			<input type="submit" id="searchButton" value="Go!" class="button" /><br/>
			<ul>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<li><input type="checkbox" name="type<?php echo $_smarty_tpl->tpl_vars['row']->value['type_id'];?>
" id="type<?php echo $_smarty_tpl->tpl_vars['row']->value['type_id'];?>
Checked" value="true" checked /><label for="type<?php echo $_smarty_tpl->tpl_vars['row']->value['type_id'];?>
Checked"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</label></li>
			<?php } ?>
			</ul>
		</div>
		<div class="errorMessage" id="errorMessage" style="display: none;"></div>
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>