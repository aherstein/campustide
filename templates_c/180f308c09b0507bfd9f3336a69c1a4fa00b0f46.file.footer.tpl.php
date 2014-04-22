<?php /* Smarty version Smarty-3.1.7, created on 2014-02-23 10:12:57
         compiled from "/home/adamhers/www/campustide/templates/include/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1537161430530a1e0948bd44-31110751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '180f308c09b0507bfd9f3336a69c1a4fa00b0f46' => 
    array (
      0 => '/home/adamhers/www/campustide/templates/include/footer.tpl',
      1 => 1391890191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1537161430530a1e0948bd44-31110751',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'loggedIn' => 0,
    'adminLoggedIn' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_530a1e094b818',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530a1e094b818')) {function content_530a1e094b818($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/adamhers/public_html/campustide/Smarty-3.1.7/libs/plugins/modifier.date_format.php';
?>	<?php if (!$_smarty_tpl->tpl_vars['loggedIn']->value&&!$_smarty_tpl->tpl_vars['adminLoggedIn']->value&&$_smarty_tpl->tpl_vars['title']->value!="Sign Up"){?>
	<div id="signup">
		Are you a student organization or local business on campus?
		Sign up and post your events for free.&nbsp;
		<a href="signup.php" class="buttonSignUp">Start Posting</a>
	</div>
	<?php }?>
</div>
<div id="social">
	
	<a href="http://twitter.com/CampusTide" target="_blank"><img src="/images/twitter.png" alt="Twitter" /></a>
	<a href="http://www.facebook.com/#!/pages/CampusTide/173413302763797?skip_nax_wizard=true" target="_blank"><img src="/images/facebook.png" alt="Face Book" /></a>
</div>
</div>
<div id="footer">
	<?php if ($_SERVER['PHP_SELF']=="/index.php"){?> 
	<div id="featured">
		Featured in:<br/>
		<img src="/images/daily_herald_logo.png" height="32" alt="Daily Herald"/>&nbsp;&nbsp;&nbsp;
		<img src="/images/miami_herald_logo.png" height="32" alt="Miami Herald"/>&nbsp;&nbsp;&nbsp;
		<img src="/images/sf_chronicle_logo.png" height="32" alt="SF Chronicle"/>&nbsp;&nbsp;&nbsp;
		<img src="/images/ut_sandiego_logo.png" height="32" alt="UT San Diego"/>&nbsp;&nbsp;&nbsp;
		<img src="/images/yahoo_news_logo.png" height="32" alt="Yahoo News"/>
	</div>
	<?php }else{ ?>
	<div id="featured" style="height: 51px;"></div>
	<?php }?>
	<div id="footerLinks">	
		<a href="/terms.php">Terms of Use</a>&nbsp;&middot;
		<a href="/privacy.php">Privacy Policy</a>&nbsp;&middot;
		<a href="/contact.php">Contact Us</a>&nbsp;&middot;
		<a href="/about.php">About CampusTide</a>
	</div>
	<div id="copyright">CampusTide &copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
</div>
	</div>
</body>
</html>
<?php }} ?>