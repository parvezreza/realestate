<?php 
	session_start();
	require_once('include/header.php');
	require_once('include/Logger.php');
	require_once('admin/include/DBConnect.php');
	
?>
<script type="text/javascript" src="js/jquery.formcheck_OLD.js"></script>
<script type="text/javascript">
	$(function(){
		jQuery ("input#btnSubmit").click( function() {
			jQuery('#DataForm').formCheck({ errorClass : 'input-notation-error', submit : true });
		});
	});
</script>

<!--		For Search			-->
<wg key="Contact Us" des="Ismail Mansion (2nd Floor), Gulshan, Dhaka-1212, Bangladesh. PABX: 02989-4737, 02989-5506, 02989-5571, 02989-5190">
<!--		for search			-->

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
        <!-- <ul>
            <li><a href="#">Photo Gallery</a></li>
            <li><a href="#">Video Gallery</a></li>
         </ul>-->
      </li>   
<div id="bar_line"><img src="images/BAR.png" /></div><li class="active"><a href="#"  class="active">
<div id="home"><img src="images/home-logo.png" border="none" /></div>Contact Us</a></li>
  <div id="bar_line"><img src="images/BAR.png" /></div>     
        </ul>

<div class="search_box">
	<form action="search.php" method="get" id="SearchForm">
		<input type="text" id="search" name="search" value="Search" size="20" />
    </form>
  </div>
     <div class="search_border">
       <div class="search"><a href="search.php">Search</a></div></div>
      <div class="bar_line"><img src="images/line_bar.png" /></div>
     <div class="sign_in"><a href="customer_login.php">Sign in</a>
    </div>
  </div>
</div><!--menu_bar_bg DIV End-->


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
            </div></div>

<div class="middle_content_contact_us">
<div class="nav_bar_contact_us">

<!--<div class="slider1"></div>-->
<div class="slider1"><img src="images/contact US.jpg" /></div>
<div class="about_us">Contact Us</div>
<div class="about_us_icon"></div>
<!--<div class="head_office_logo"></div>
<div class="head_office"></div>-->
<!--<p9>Corporate head office</p9>
<p10>Ismail Mansion (2nd Floor)<br />
32, Mohakhali, Wireless Gate<br />
Gulshan, Dhaka-1212</p10>-->
<table border="0px" width="350px">

<tr><td><div class="head_office_logo"><img src="images/head-office.png" /></div></td>
<td>
    <div class="head_office_text">
    	<div class="bold">Head Office:</div>
    	Ismail Mansion (2nd Floor)<br />
		32, Mohakhali, Wireless Gate<br />
		Gulshan, Dhaka-1212<br />
		Bangladesh.</div>
</td>
</tr>

<tr><td><div class="PABX_logo"><img src="images/PABX.png" /></div></td>
<td><div class="PABX_text">
<div class="bold">PABX:</div>
	02989-4737, 02989-5506<br />
	02989-5571, 02989-5190
</div>
</td>
</tr>
<tr><td><div class="FAX_logo"><img src="images/Fax.png" /></div></td>
<td>
	<div class="FAX_text">
    <div class="bold">FAX:</div>
    88-02989-4606</div>
</td>
</tr>

<tr><td><div class="Email_logo"><img src="images/Email.png" /></div></td>
<td><div class="Email_text">
<div class="bold">Email:</div>
		nhlbd@yahoo.com<br />
		info@noboudoy.com
</div>
</td>
</tr>
<tr><td><div class="Website_logo"><img src="images/website.png" /></div></td>
<td>
	<div class="Website_text">
    <div class="bold">Website:</div>
		www.noboudoy.com
</div>
</td>
</tr>
</table>
<div style="height:70px; float:left; margin:50px 0 0 105px;">
       <!-- <div class="corporate">Location Map</div>
        <div id="contact_location">
            <div class="mapBlink"></div>
        </div>-->
       <a href="flash/Location map Animation.swf" class="image"><p style="background:url(images/locationticker.png) no-repeat; width:200px; height:50px;"><span style="margin:5px 0 0 20px; color:#fff; float:left">Location Map</span></p></a>
    </div>
</div>
<div class="feedback_bg">
         	<div class="feedback_new" style="float:left">
            <form action="complain.php" method="post" id="DataForm">
                <p>Name:</p><input name="id" type="text" fv="required" value="<?php print $_SESSION['userid'] ?>"/><span></span>
                <p>E-mail:</p><input type="text" name="email" fv="required" value="<?php print $obj->client_email ?>" /><span></span>
                <p>Your Message:</p><textarea name="detail" fv="required"></textarea><span></span><br />
                <input class="submit" type="button" value="Submit" id="btnSubmit" />
            </form>
         	</div>
            <div style="float:left; margin:15px 0 0 10px; color:#03C">
            	<?php
					if($_POST){
						$to = "noboudoy@noboudoy.com";
						$subject = "Complain / Suggesion";
						$message = trim($_POST['detail']);
						$header = "From: ".$_SESSION['userid'].". ".$obj->client_name."\r\nReply-To: ".$obj->client_email;
						
						@mail($to,$subject,$message,$header);
						print "Thank you for your suggesion!";
					}
				?>
            	
            </div>
         </div>
         
</div></div>
<?php require_once('include/footer.php'); ?>