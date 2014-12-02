<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Noboudoy Housing Limited</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<link rel="stylesheet" type="text/css" href="styles/media_front.css" />

<script type="text/javascript" src="js/jquery-1.6.js"></script>
<script type="text/javascript" src="js/MenuFunction.js"></script>
<script type="text/javascript" src="js/MenuCall.js"></script>


<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.4.css" / media="screen">
<script type="text/javascript">
$(document).ready(function(){	
	$("<img src='images/location-map.jpg'>").addClass('mapBlink');
	$("a.image").fancybox({
		'padding':0,
		'overlayOpacity':0.2,
		'width':1090,
		'height':450,
		/*css: {'background-color': '#ff0000'},	*/
	});
	
	$("#search").click(function(){
		if($(this).val() == 'Search')
			$(this).val('');
	});
	$(".search a").click(function(e){
		e.preventDefault();
		if($("#search").val() != '')
			$("#SearchForm").submit();
	});
});

</script>

</head>
<body>
<div id="wrapper">
<div class="content">
<div class="header">
  <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="960" height="190">
    <param name="movie" value="../flash/Noboudoy Banner.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="7.0.70.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="flash/Noboudoy Banner.swf" width="960" height="190">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="7.0.70.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
