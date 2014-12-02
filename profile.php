<?php 
	session_start();
	require_once('include/header.php');
	require_once('include/Logger.php');
	require_once('admin/include/DBConnect.php');
	
	$hDB = new DBConnect();
	Logger::Check();
	
	$hDB->Query("SELECT * FROM tbl_client_profile WHERE client_id='".$_SESSION['userid']."'");
	$obj = $hDB->Fetch();
?>

<style type="text/css">
	table td{
		border-bottom:1px solid #693;
		padding:6px 0 0px 0;
	}
	table{
		border-collapse:collapse
	}
</style>

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
  <div id="bar_line" ><img src="images/BAR.png" />
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

<div style="width:440px; float:left;">
	<div id="welcome">Profile</div>
    <div id="log_icon" style="margin:65px 0 0 -60px;"></div>
      
	<div style="width:430px; float:left; margin:0 0 20px 15px;">
    	<table border="0" width="96%">
        	<tr>
            	<td width="42%">Name: </td><td><?php print $obj->client_name ?></td>
            </tr>
            
            <tr>
            	<td>S/O, W/O, D/O: </td><td><?php print $obj->client_father_name ?></td>
            </tr>
            
             <tr>
            	<td>Mother's Name: </td><td><?php print $obj->client_mother_name ?></td>
            </tr>
            
            <tr>
            	<td>Profession: </td><td><?php print $obj->client_profession ?></td>
            </tr>
            
            <tr>
            	<td>Permanaent Address: </td><td><?php print $obj->client_add_permanent ?></td>
            </tr>
            
            <tr>
            	<td>Mailing Address: </td><td><?php print $obj->client_add_present ?></td>
            </tr>
            
            <tr>
            	<td>Telephone: </td><td><?php print $obj->client_tel_office ?></td>
            </tr>
            
            <tr>
            	<td>Mobile: </td><td><?php print $obj->client_mobile ?></td>
            </tr>
            
            <tr>
            	<td>Email: </td><td><?php print $obj->client_email ?></td>
            </tr>
            
            <tr>
            	<td>Date of Birth: </td><td><?php print $obj->client_date_birth ?></td>
            </tr>
            
            <tr>
            	<td>Nationality: </td><td><?php print $obj->client_nationality ?></td>
            </tr>
            
            <tr>
            	<td>National ID: </td><td><?php print $obj->client_national_id ?></td>
            </tr>
            
            <tr>
            	<td>Nominee Name: </td><td><?php print $obj->client_nominee_name ?></td>
            </tr>
            
            <tr>
            	<td>Relation of Nominee with Client: </td><td><?php print $obj->client_nominee_relation ?></td>
            </tr>
            
            <tr>
            	<td>Nominee Permanaent Address: </td><td><?php print $obj->client_nominee_contact ?></td>
            </tr>
                
            <tr>
            	<td>Nominee Present/Mailing Address: </td><td><?php print $obj->client_nominee_contact ?></td>
            </tr>
            
            <tr>
            	<td>Reference Name: </td><td><?php print $obj->client_nominee_contact ?></td>
            </tr>
                
            <tr>
            	<td>Reference Address: </td><td><?php print $obj->client_nominee_contact ?></td>
            </tr>
            
            <tr>
            	<td>Plot No.: </td><td><?php print $obj->client_nominee_contact ?></td>
            </tr>
            
            <tr>
            	<td>Road No.: </td><td><?php print $obj->client_nominee_contact ?></td>
            </tr>
                
            <tr>
            	<td>Block No.: </td><td><?php print $obj->client_nominee_contact ?></td>
            </tr>
            
            <tr>
            	<td>Sector No.: </td><td><?php print $obj->client_nominee_contact ?></td>
            </tr>
                
            <tr>
            	<td>Plot Area: </td><td><?php print $obj->client_nominee_contact ?> Katha</td>
            </tr>
            
        </table>
    </div>
         
</div>
<div style="width:270px; float:left; height:400px;">
          <div style="width:150px; float:left; margin:50px 0 0 30px;"><?php print $obj->client_name ?></div>
          <div class="profile_bg">
          	 <a href="#">View Profile</a>
             <a  href="payment.php">Payment Profile</a>
             <a href="complain.php">Inform Your Complain</a>
             <img class="img1" src="images/Client-history-logo.png" />
          </div>
          <div class="profile_bg">
          	<img class="img2" src="images/logout-icon.png" />
          	<a style=" margin:5px 0 0 50px;" href="customer_login.php?log=logout">Sign out</a>
          </div>
</div>


</div><!-- Middle_content DIV End-->
<?php require_once('include/footer.php'); ?>