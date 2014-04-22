<!doctype html>
<html>
<head>
<title>{$title}</title>
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
<meta name="Keywords" content="{$metaKeywords}" />
<meta name="Description" content="{$metaDescription}" />
{*<meta name="viewport" content="width=320, minimum-scale=1.0, maximum-scale=1.0" />*}
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
<body onload="{$onload}">
{*<!--  Facebook Like Button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) { return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=221643341234556";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--  END Facebook Like Button -->*}
<div id="container">
