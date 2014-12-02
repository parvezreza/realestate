<?php 
	session_start();
	require_once('include/header.php'); 
	require_once('admin/include/DBConnect.php');
	
	$hDB = new DBConnect();
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
                    <li><a href="">Handed over Projects</a></li>
                    <li><a href="">Ongoing Projects</a></li>
                    <li><a href="">Upcoming Projects</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href=""><span>Apartment Projects</span></a>
                <div class="submenu">
                     <ul>
                    <li><a href="">Handed over Projects</a></li>
                    <li><a href="">Ongoing Projects</a></li>
                    <li><a href="">Upcoming Projects</a></li>
                    </ul>
                </div>
                <a class="menuitem" href="new_registration.php"><span>&nbsp; Online Registration</span></a>
                <a class="menuitem" href="e-brochure.php"><span>&nbsp; E-Brochure</span></a>
                <a class="menuitem" href="http://noboudoy.com/webmail" target="_blank"><span>&nbsp; Web Mail</span></a>                  
            </div>
</div><!--Left_nav DIV-->

<div class="middle_content_log_in">
<div class="nav_bar_log_in">

<!--<div class="slider1"></div>-->
<div class="about_us">Forgot Password?</div>  
 <div class="log_in_design"></div>
            <div class="log_in_page_img">
                	<div class="new" style="margin:25px  0 0 30px;">
                    <form action="forgot.php" method="post" id="DataForm">
                 		<p>ID Number:</p><input  name="id" type="text" fv="required" /><span></span>
                     	<p>E-mail:</p><input  name="email" type="text" fv="email 8" /><span></span><br />
                        <input class="submit" style="margin-top:5px" type="button" value="Submit" id="btnSubmit" />
                    </form>    
                        <div style="margin:10px 0 0 0; font-size:14px; color:#FF0;">
                        	<?php
								if($_POST){
									$id = trim($_POST['id']);
									$email = trim($_POST['email']);
									
									$hDB->Query("SELECT client_name, client_email, client_password FROM tbl_client_profile WHERE client_id='$id'");
									if($hDB->Row() > 0){
										$obj = $hDB->Fetch();
										if($email == $obj->client_email){
											$to = $email;
											$subject = "Password Recovery";
											$message = "Hello, ".$obj->client_name.".\nYour Password is: ".$obj->client_password;
											$header = "From: Noboudoy Housing Ltd";
											@mail($to,$subject,$message,$header);
											print "Password has sent your email. Please check...";
										}
										else{
											print "Email is not valid!";
										}
									}
									else{
										print "Wrong ID & Email!";
									}
								}
							?>
                        </div>
                    </div>
             </div>          
</div>
</div>
</div><!--Middle Content DIV End-->
<?php require_once('include/footer.php'); ?>