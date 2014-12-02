<?php
	session_start(); 
	require_once('include/header.php');
	require_once('admin/include/DBConnect.php');
	require_once('include/Logger.php');
	$hDB = new DBConnect(); 
	Logger::Permit();
	
	if($_GET['log']){
		Logger::Logout();
	}
?>
<script type="text/javascript" src="js/jquery.formcheck_OLD.js"></script>
<script type="text/javascript">
	$(function(){
		jQuery ("input#btnSubmit").click( function() {
			jQuery('#DataForm').formCheck({ errorClass : 'input-notation-error', submit : true });
		});
	});
</script>
<div class="menu_bar_bg">
<div id="centeredmenu">

   <ul>
     <li><a href="index.php">Home</a></li>
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="#">About Us</a>
         <ul>
            	<li><a href="company_profile.php">Company Profile</a></li>
            	<li><a href="message_chairman.php">Message of the Chairman</a></li>
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

<div class="search_box"><input type="text" name="Search" value="Search" size="20" /></div>
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
</div><!--Left_nav DIV-->
<form action="customer.php" method="post" id="DataForm">
<div class="middle_content_log_in">
<!--<div class="nav_bar_log_in">-->

<!--<div class="slider1"></div>-->

<div class="about_us">Customer Log In</div>
      <div class="log_in_design"></div>
          <div class="customer_log_in_bg">
          
           	<div class="reg"><div class="new_registration_button"><a href="new_registration.php">New Registration</a></div>
          </div>
           <div id="design"></div>
                <div class="signinyouraccount">Sign In To Your Account</div>
    <div id="customer_id">ID Number:</div>
    <div class="customer_search_box"><input name="id" type="text" style="background:url(images/radius-borde-inner-img.png) no-repeat" fv="required"/><span></span></div>
	<div id="customer_password">Password:</div>
	<div class="customer_search_box1"><input name="password" type="password" style="background:url(images/radius-borde-inner-img.png) no-repeat" fv="required"/><span></span></div>
     <div id="image">
        </div>
           <div id="radio_button_bg1"><input type="checkbox" name="remember" />
              </div>
<div id="remember_me">Remember Me</div>
   <input type="button" id="btnSubmit" value="Sign In" class="submit" style="margin:15px 0 0 44px" />

	<div style="margin:5px 0 0 150px"><a style="text-decoration:none; color:#FFF" href="forgot.php">Forgot Password?</a></div>
    
    <!--			Error Notation				-->
    <div style=" color:#FF0; margin:5px 0 0 40px; font-size:13px">
    	<?php
			if($_GET['error']){
				print "Wrong ID & Password! Please enter valid ID & Password.";
			}
		?>
    </div>
    <!-- 			End of Error Notation				-->
    
   </div>
 <!--   </div>-->
      </div>
</form>
<!--Middle Content DIV End-->
<?php require_once('include/footer.php'); ?>