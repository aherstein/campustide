<?php /* Smarty version Smarty-3.1.7, created on 2014-02-08 07:28:11
         compiled from "/Users/aherstein/Sites/CampusTide/templates/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195039797552f5dc8bb91874-79767880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f91ef65b87782d79ea63fab97edb57d8f4ca887' => 
    array (
      0 => '/Users/aherstein/Sites/CampusTide/templates/signup.tpl',
      1 => 1349315582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195039797552f5dc8bb91874-79767880',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'school2' => 0,
    'school3' => 0,
    'school4' => 0,
    'school5' => 0,
    'title' => 0,
    'errorMessage' => 0,
    'name' => 0,
    'email' => 0,
    'types' => 0,
    'row' => 0,
    'school' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f5dc8bc1a9d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5dc8bc1a9d')) {function content_52f5dc8bc1a9d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
	var RecaptchaOptions = {
		theme: 'clean'
	};
</script>
<script type="text/javascript">
	$(function()
	{
		<?php if ($_smarty_tpl->tpl_vars['school2']->value!=''||$_smarty_tpl->tpl_vars['school3']->value!=''||$_smarty_tpl->tpl_vars['school4']->value!=''||$_smarty_tpl->tpl_vars['school5']->value!=''){?>
			showAdditionalSchools();
		<?php }?>
		
		$("#school").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});

		$("#school2").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});

		$("#school3").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});

		$("#school4").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});

		$("#school5").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: false
		});
	});
</script>
<script type="text/javascript">
	function showAdditionalSchools()
	{
		document.getElementById('showAdditionalSchools').style.display = "none";
		document.getElementById('additionalSchools').style.display = "inherit";
	}
</script>
<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
<div id="signupForm">
	<?php if ($_smarty_tpl->tpl_vars['errorMessage']->value!=''){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div><?php }?>
	<form method="post" action="signup.php">
		<div id="col">
			<span class="label">Organization Name:</span><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="textbox" required /><br/>
			<span class="label">E-Mail:</span><input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" class="textbox" required /><br/>
			<span class="label">Password:</span><input type="password" name="password1" class="textbox" required /><br/>
			<span class="label">Password (Again):</span><input type="password" name="password2" class="textbox" required /><br/>
			<span class="label">Type of Organization:</span>
			<select name="type">
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['type_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</option>
			<?php } ?>
			</select><br/>
			<span class="label">University:</span><input type="text" name="school" id="school" value="<?php echo $_smarty_tpl->tpl_vars['school']->value;?>
" class="textbox" required /><br/>
			<div id="showAdditionalSchools">
				<span class="label"></span><a href="javascript:showAdditionalSchools()">Associated With More Than One Campus?</a>
			</div>
			<div id="additionalSchools">
				<span class="label"></span><input type="text" name="school2" id="school2" value="<?php echo $_smarty_tpl->tpl_vars['school2']->value;?>
" class="textbox" /><br/>
				<span class="label"></span><input type="text" name="school3" id="school3" value="<?php echo $_smarty_tpl->tpl_vars['school3']->value;?>
" class="textbox" /><br/>
				<span class="label"></span><input type="text" name="school4" id="school4" value="<?php echo $_smarty_tpl->tpl_vars['school4']->value;?>
" class="textbox" /><br/>
				<span class="label"></span><input type="text" name="school5" id="school5" value="<?php echo $_smarty_tpl->tpl_vars['school5']->value;?>
" class="textbox" /><br/>
				<span class="label"></span><span class="tip">Need more? Sign up, then <a href="/contact.php" target="_blank">Contact Us</a>.</span>
			</div>
			<span class="label"></span><input type="checkbox" name="termsChecked" id="termsChecked" value="true" required /><label for="termsChecked">I have read and accept the <a href="#" onclick="javascript:window.open('terms.php', 'terms', 'menubar=no, width=925, height=800, toolbar=no, scrollbars=yes');">Terms of Use</a>.</label><br/>
			<span class="label"></span><input type="checkbox" name="privacyChecked" id="privacyChecked" value="true" required /><label for="privacyChecked">I have read and accept the <a href="#" onclick="javascript:window.open('privacy.php', 'rules', 'menubar=no, width=925, height=800, toolbar=no, scrollbars=yes');">Privacy Policy</a>.</label><br/>
			<div id="captcha">
				Please type the below text:
				<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LdiYsgSAAAAAEbwNdaTQ3qmW_zGX2HeJl2IS_Dc"></script>
			</div>
			<input type="submit" value="Start Posting" class="buttonSignUp" />
		</div>
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>