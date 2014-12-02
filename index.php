<?php
	session_start();
	require_once('include/header.php'); 
	require_once('admin/include/DBConnect.php');
	$hDB = new DBConnect();
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$(".menu a").hover(function() {
		$(this).next("em").animate({opacity: "show", top: "-75"}, "slow");
	}, function() {
		$(this).next("em").animate({opacity: "hide", top: "-85"}, "fast");
	});


});
</script>
<script type="text/javascript">
	$(function(){
		$("#submit").click(function(e){
			e.preventDefault();
			$("#DataForm").submit();
		});
	});
</script>
<style type="text/css">
.menu {
	margin: 100px 0 0;
	padding: 0;
	list-style: none;
}
.menu li {
	padding: 0;
	margin: 0 2px;
	float: left;
	position: relative;
	text-align: center;
	
}
.menu a {
	float:left;
	font-family:Gabriola;
	font-size:30px;
	float:left;
	margin-left:0px;
	width:180px;
	height:55px;
	color:#352c75;
	text-decoration:blink;
}
.menu li em {
	background: url(images/hover.png) no-repeat;
	width: 120px;
	height: 35px;
	position: absolute;
	top: -85px;
	left: -15px;
	text-align: center;
	margin:60px 0px 0px 45px;
	padding: 10px 0px 0px;
	font-style: normal;
	font-size:12px;
	z-index: 2;
	display: none;
}
</style>

<!--		For Search			-->
<wg key="Introduction" des="The basic demand of civil citizen is food, shelter, clothes and medicine. But considering the present scenario shelter is the main problem to all of us. Dhaka is now on the fast growing and densely populated metro -city in the world. It has been on unplanned city with disorganized facilities for residents. But there should be changed; it is the demand of time. Both Govt. and sensible citizens are seriously concern about the issue. Basing on the issue Noboudoy Housing Limited planned to build a mega city in the neighborhood to take a share of responsibilities to re-accommodate Dhaka city.">
<!--		for search			-->
<script src="DWConfiguration/ActiveContent/IncludeFiles/AC_RunActiveContent.js" type="text/javascript"></script>


<div class="menu_bar_bg">
<div id="centeredmenu">

   <ul>
     <li  class="active"><a href="index.php" class="active"><div id="home"><img src="images/home-logo.png" border="none" /></div>Home</a></li>
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="#">About Us</a>
         <ul>
            <li><a href="company_profile.php">Company Profile</a></li>
            <li><a href="message_chairman.php">Message of the Chairman </a></li>
            <li><a href="message_md.php">Message of the MD</a></li>
            <li><a href="objectives.php">Objectives</a></li>
         </ul>
      </li>
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="#">Projects</a>
         <ul>
            <li><a href="land_project.php">Land Projects</a></li>
            <li><a href="apartment_project.php">Apartment Projects</a></li>
         </ul>
      </li>
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="career.php">Career</a></li>
       <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="gallery.php">Gallery</a>
         <!--<ul>
            <li><a href="#">Photo Gallery</a></li>
            <li><a href="#">Video Gallery</a></li>
         </ul>-->
      </li>   
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="contact_us.php">Contact Us</a></li><div id="bar_line"><img src="images/BAR.png" /></div>
      
   </ul>

<div class="search_box">
	<form action="search.php" method="get" id="SearchForm">
		<input type="text" id="search" name="search" value="Search" size="20" />
    </form>
</div>
<div class="search_border">
<div class="search"><a href="search.php">Search</a></div></div>
<div class="bar_line"><img src="images/line_bar.png" /></div>
<div class="sign_in"><a href="customer_login.php">Sign in</a></div></div></div><!--menu_bar_bg-->
<div class="left_nav">
<div class="sidebarmenu">    
                <a class="menuitem" href="index.php"><span>&nbsp; Home</span></a>
                <a class="menuitem submenuheader" href=""><span>About Us</span></a>
                <div class="submenu">
                    <ul>
                    	<li><a href="company_profile.php">Company Profile</a></li>
            			<li><a href="message_chairman.php">Message of the Chairman</a></li>
           				<li><a href="message_md.php">Message of the MD</a></li>
            			<li><a href="objectives.php">Objectives</a></li>
                    </ul>
                </div>
                    <a class="menuitem submenuheader" href=""><span>Land Projects</span></a>
<div class="submenu">
                 <ul>
                    <li><a href="land_project.php?project=handed over">Handed over Projects</a></li>
                    <li><a href="land_project.php?project=ongoing">Ongoing Projects</a></li>
                    <li><a href="land_project.php?project=upcoming">Upcoming Projects</a></li>
                    </ul>
                </div>
                    <a class="menuitem submenuheader" href=""><span>Apartment Projects</span></a>
<div class="submenu">
                 <ul>
                    <li><a href="apartment_project.php?project=handed over">Handed over Projects</a></li>
                    <li><a href="apartment_project.php?project=ongoing">Ongoing Projects</a></li>
                    <li><a href="apartment_project.php?project=upcoming">Upcoming Projects</a></li>
                    </ul>
                </div>
                <a class="menuitem" href="new_registration.php"><span>&nbsp; Online Registration</span></a>
                <a class="menuitem" href="e-brochure.php"><span>&nbsp; E-Brochure</span></a>
                <a class="menuitem" href="http://noboudoy.com/webmail" target="_blank"><span>&nbsp; Web Mail</span></a>                  
            </div>
 <form action="customer.php" method="post" id="DataForm">
<div class="sign_in_your_account">Sign In To Your Account
 </div>
  <div class="user_name">
<font>
      User ID: &nbsp; &nbsp; &nbsp;&nbsp;
</font>
<input type="text" name="id" style="background:url(images/radius-border-img.png) no-repeat"/>
</div>
<div class="password">
<font>
      Password:
</font>
<input type="password" name="password" style="background:url(images/radius-border-img.png) no-repeat" />
 </div>
  <div class="log_in_button">
  <div class="log_in_text" id="submit"><a id="submit" href="customer_login.php">Sign in</a></div>
   </div>
  <div class="radio_button_bg">
 <div class="radio_button"><input type="checkbox" />
</div>
 </div>
  <div class="remember">Remember Me</div>
   <div class="forgot_password"><a href="forgot.php">Forgot Password?</a>
    </div>
      </div> <!--Left_nav DIV End-->
</form>
<div class="nav_bar_home"></div>

  <div class="middle_content_home">
   <div class="welcome">
      <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="500" height="40">
  <param name="movie" value="" />
  <param name="quality" value="high" />
  <param name="wmode" value="opaque" />
  <param name="swfversion" value="6.0.65.0" />
  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
  <param name="expressinstall" value="Scripts/expressInstall.swf" />
  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
  <!--[if !IE]>-->
  <object type="application/x-shockwave-flash" data="flash/Welcome.swf" width="500" height="40">
    <!--<![endif]-->
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="6.0.65.0" />
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
   
   
   
    <div class="slider"><img src="images/slide.png" /></div>
       <div class="intro">Introduction</div>
	   <div class="intro_text">
   The basic demand of civil citizen is food, shelter, clothes and medicine. But considering the present scenario shelter is the main problem to all of us. Dhaka is now on the fast growing and densely populated metro -city in the world. It has been on unplanned city with disorganized facilities for residents. But there should be changed; it is the demand of time. Both Govt. and sensible citizens are seriously concern about the issue. Basing on the issue Noboudoy Housing Limited planned to build a mega city in the neighborhood to take a share of responsibilities to re-accommodate Dhaka city.
	   </div>
<?php
	$hDB->Query("SELECT * FROM tbl_special_offer ORDER BY offer_id DESC");
	if($hDB->Row() > 0){
?>  	<ul class="menu">
						<li><a href="special_offer.php">Special Offer</a>	
							<em>View Click Details</em>
						</li>
		</ul>
		
<?php
	}
?>
    	
   </div>
  </div><!--Middle_content DIV End-->
<?php require_once('include/footer.php'); ?>