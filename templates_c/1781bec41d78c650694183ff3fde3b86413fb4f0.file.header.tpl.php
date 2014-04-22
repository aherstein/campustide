<?php /* Smarty version Smarty-3.1.7, created on 2014-02-23 10:12:57
         compiled from "/home/adamhers/www/campustide/templates/include/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2105349978530a1e09454311-20641341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1781bec41d78c650694183ff3fde3b86413fb4f0' => 
    array (
      0 => '/home/adamhers/www/campustide/templates/include/header.tpl',
      1 => 1391890191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2105349978530a1e09454311-20641341',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'metaKeywords' => 0,
    'metaDescription' => 0,
    'onload' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_530a1e0946896',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530a1e0946896')) {function content_530a1e0946896($_smarty_tpl) {?><!doctype html>
<html>
<head>
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link rel="stylesheet" type="text/css" href="/css/global.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="/css/jquery-ui/campustide-simple-round/custom.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/css/calendar.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="apple-touch-icon" href="/images/icon.png" />
<link rel="shortcut icon" href="/images/icon2.png" />
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.tooltip.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="/js/fancybox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="/js/functions.js"></script>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['metaKeywords']->value;?>
" />
<meta name="Description" content="<?php echo $_smarty_tpl->tpl_vars['metaDescription']->value;?>
" />

<!-- Google Analytics -->
<script type="text/javascript"> 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27648823-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- END Google Analytics -->
</head>
<body onload="<?php echo $_smarty_tpl->tpl_vars['onload']->value;?>
">

<div id="container">
<?php }} ?>