<?php 
	session_start();
	require_once('include/header.php'); 
	require_once('admin/include/DBConnect.php');
	require_once('include/Logger.php');
	
	$hDB = new DBConnect();
	
	if($_POST['id']){
		$userid = trim($_POST['id']);
		$password = trim($_POST['password']);

		$hDB->Query("SELECT client_id FROM tbl_client_profile WHERE client_id = '$userid' AND client_password = '$password'");
		
		$CookieObj = $hDB->Fetch();
		
		if( $hDB->Row() > 0 ){
			
			$_SESSION['userid'] = $userid;
			
			if($_POST['remember']){
				setcookie("userid",$CookieObj->client_id,time()+(3600*24*15),"/");
			}			
		}
		else{
			//header("location: customer_login.php?option=log&error=1");
			if($_SERVER['SERVER_NAME'] == 'localhost')
				print "<script>location.href='http://".$_SERVER['SERVER_NAME']."/noboudoy/customer_login.php?option=log&error=1';</script>";
			else
				print "<script>location.href='http://".$_SERVER['SERVER_NAME']."/customer_login.php?option=log&error=1';</script>";
		}
		
	}
	else{
		Logger::Check();
	}
	
?>

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
<div class="nav_bar_log_in">

<!--<div class="slider1"></div>-->
<div id="welcome" style="margin-top:10px">Welcome</div>
      <div id="log_icon" style=" margin-top:-10px"> </div>
           <div id="log_in_area" style=" margin-top:10px">
              <div class="change_password_bg">
            <div id="changed">Change Password</div>
      <div class="password_design"><img src="images/log-in-design.png" />
     </div>
     <form action="customer.php" method="post">
       <div id="id_number">ID Number :</div>
        <div id="search"><input type="text" size="20" value="<?php print $_SESSION['userid'] ?>" disabled="disabled" /></div>
    
    <div id="old_password">Old Password :</div>
      <div id="password"><input type="password" name="old_password" size="18" /></div>
          <div id="new_password">New Password :
       </div>
    <div id="password1"><input type="password" name="new_password" size="18" /></div>
<div id="password_logo"><br />
  <!--<div id="change_password_button"><h1 class="h6"><a href="#">Change Password</a></h1></div>-->
  		<input type="submit" class="submit" value="Sumbit" style="margin:130px 0 0 0" />
     </form>
        </div>
            </div>
                </div>
                    </div>
  	<!--				Client Name					-->                  
             	<div id="search_client">
              		<?php
						$hDB->Query("SELECT client_name FROM tbl_client_profile WHERE client_id='".$_SESSION['userid']."'");
						$obj = $hDB->Fetch();
						print $obj->client_name;
					?>
              	</div>
	<!--			end							-->
    
             <div id="profile_area">
<div id="client_bg">
  <a href="profile.php"><div id="profile_button1"><h1 class="h7">View Profile</h1>
      </div></a>
    <a href="payment.php"><div id="profile_button"><h1 class="h8">Payment Profile</h1>
  </div></a>
<a href="complain.php"><div id="profile_button"><h1 class="h9">Inform Your Complain</h1>
   </div></a>
     <div id="profile_logo">
    </div>
   <br />
 <div id="logout_bg">
 <div class="logout_icon"></div>
<a href="customer_login.php?log=logout"><div id="logout_button"><h1 class="h10">Sign out</h1>
   </div>
       </a>
           </div>
                </div>
 </div>
 </div> <!-- Middle_content DIV End-->

<!--<h1 class="h2">Id Number:&nbsp;<input type="text" size="20" /></h2><br /><br />
<h1 class="h3">Old Password:&nbsp;<input type="password" size="20" /></h3><br /><br />
<h1 class="h4">New Password:&nbsp;<input type="password" size="20" /></h4><div class="password_logo"></div>
<div class="password_log_out_button">
<h1 class="h5"><a href="#">Change Password</a></h1>
</div>-->
<?php require_once('include/footer.php'); ?>

<?php
	if($_POST['new_password']){
		$old = trim($_POST['old_password']);
		$new = trim($_POST['new_password']);
		$hDB->Query("SELECT client_password FROM tbl_client_profile WHERE client_id='".$_SESSION['userid']."'");
		$obj = $hDB->Fetch();
		if($old != $obj->client_password){
			print "<script>alert('Old Password is not valid');</script>";
		}
		else{
			if(strlen($new) < 5){
				print "<script>alert('New Password is empty or too short!');</script>"; 
			}
			elseif(strlen($new)> 20){
				print "<script>alert('New Password is too large! Please type less than 20 characters.');</script>";
			}
			else{
				$hDB->Query("UPDATE tbl_client_profile SET client_password = '$new' WHERE client_id = '".$_SESSION['userid']."'");
				print "<script>alert('Your Password is successfully changed!');</script>";
			}
		}
	}
?>