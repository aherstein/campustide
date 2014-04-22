<?php /* Smarty version Smarty-3.1.7, created on 2014-02-23 10:24:53
         compiled from "/home/adamhers/www/campustide/templates/event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1275461817530a20d54db964-29701807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e044db19ad73eb5effb094445fb4ccbf31b3b4e5' => 
    array (
      0 => '/home/adamhers/www/campustide/templates/event.tpl',
      1 => 1391890191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1275461817530a20d54db964-29701807',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'eventName' => 0,
    'startdate' => 0,
    'starttime' => 0,
    'endtime' => 0,
    'schoolName' => 0,
    'location' => 0,
    'eventAddress' => 0,
    'address' => 0,
    'type' => 0,
    'description' => 0,
    'ret' => 0,
    'schoolParam' => 0,
    'month' => 0,
    'year' => 0,
    'userID' => 0,
    'eventID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_530a20d5566bc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530a20d5566bc')) {function content_530a20d5566bc($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/leftNavEvent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--  Facebook Comments -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) { return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=221643341234556";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--  END Facebook Comments -->
<div id="mainContent">
	<div id="event">
		<h1><?php echo $_smarty_tpl->tpl_vars['eventName']->value;?>
</h1>
		<span class="label">When</span><?php echo $_smarty_tpl->tpl_vars['startdate']->value;?>
<br/>
		<span class="label"></span><?php echo $_smarty_tpl->tpl_vars['starttime']->value;?>
&nbsp;to&nbsp;<?php echo $_smarty_tpl->tpl_vars['endtime']->value;?>
<br/>
		<div class="separator"></div>
		<span class="label">Where</span><?php echo $_smarty_tpl->tpl_vars['schoolName']->value;?>
<br/>
		<span class="label"></span><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
<br/>
		<?php if ($_smarty_tpl->tpl_vars['eventAddress']->value){?><span class="label"></span><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
<br/><?php }?>
		<div class="separator"></div>
		<span class="label">Category</span><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
<br/>
		<div class="separator"></div>
		<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
<br/>
		<?php if ($_smarty_tpl->tpl_vars['ret']->value=="school"){?><p><a href="search.php?search=<?php echo $_smarty_tpl->tpl_vars['schoolParam']->value;?>
&amp;type1=true&amp;type2=true&amp;type3=true&amp;month=<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
&amp;year=<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" class="button">Back to Calendar</a></p>
		<?php }elseif($_smarty_tpl->tpl_vars['ret']->value=="user"){?><p><a href="profile.php?id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
" class="button">Back to Calendar</a></p><?php }?>
		<div class="fb-comments" data-href="http://www.campustide.com/event.php?id=<?php echo $_smarty_tpl->tpl_vars['eventID']->value;?>
" data-num-posts="5" data-width="675"></div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>