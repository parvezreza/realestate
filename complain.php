<?php 
	session_start();
	require_once('include/header.php');
	require_once('include/Logger.php');
	require_once('admin/include/DBConnect.php');
	
	$hDB = new DBConnect();
	Logger::Check();
	
	$hDB->Query("SELECT client_name,client_email FROM tbl_client_profile WHERE client_id='".$_SESSION['userid']."'");
	$obj = $hDB->Fetch();
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
     <li><a href="index.php"><div id="home"><img src="images/home-logo.png" border="none" /></div>Home</a></li>
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
            <li><a href="land_roject.php">Land Projects</a></li>
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
<div id="bar_line"><img src="images/BAR.png" />
  </div>
   <li><a href="contact_us.php">Contact Us</a></li>
  <div id="bar_line"><img src="images/BAR.png" />
</div>
      
   </ul>
<div class="search_box"><input type="text" name="Search" value="Search" size="20" />
  </div>
    <div class="search_border">
      <div class="search"><a href="search.php">Search</a>
        </div>
           </div>
         <div class="bar_line"><img src="images/line_bar.png" />
       </div>
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
            </div>
</div><!--Left_nav DIV End-->

<div class="middle_content_log_in">
<div class="nav_bar_log_in"></div>

<div style="width:440px; height:400px; float:left;">
	<div id="welcome">Complain</div>
    <div id="log_icon" style="margin:65px 0 0 -75px;"></div>
      
         <div class="complain_bg">
         	<div class="new" style="float:left">
            <form action="complain.php" method="post" id="DataForm">
                <p>ID No:</p><input name="id" type="text" value="<?php print $_SESSION['userid'] ?>" disabled="disabled" /><span></span>
                <p>E-mail:</p><input type="text" name="email" value="<?php print $obj->client_email ?>" disabled="disabled" /><span></span>
                <p>Your Complain:</p><textarea name="detail" fv="required"></textarea><span></span><br />
                <input class="submit" style="margin-top:5px" type="button" value="Submit" id="btnSubmit" />
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
         
</div>
<div style="width:270px; float:left; height:400px;">
          <div style="width:150px; float:left; margin:50px 0 0 30px;"><?php print $obj->client_name ?></div>
          <div class="profile_bg">
          	 <a href="profile.php">View Profile</a>
             <a  href="payment.php">Payment Profile</a>
             <a href="#">Inform Your Complain</a>
             <img class="img1" src="images/Client-history-logo.png" />
          </div>
          <div class="profile_bg">
          	<img class="img2" src="images/logout-icon.png" />
          	<a style=" margin:5px 0 0 50px;" href="customer_login.php?log=logout">Sign out</a>
          </div>
</div>


</div><!-- Middle_content DIV End-->
<?php require_once('include/footer.php'); ?>