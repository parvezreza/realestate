<?php 
	session_start();
	require_once('include/header.php');
	require_once('include/Logger.php');
	require_once('admin/include/DBConnect.php');
	
	$hDB = new DBConnect();
	Logger::Check();
?>

<style type="text/css">
	table td{
		border:1px solid #693;
		padding:5px 6px 0 5px;
	}
	table th{
		padding:0 0 0 5px;
		border:1px solid #696;
	}
	table{
		margin:10px 0 10px 15px;
		border-collapse:collapse;
		font-size:14px;
	}
	.total_payment{
		margin:20px 5px 0 0;
		text-align:right;
		font-size:14px;
		font-weight:600;
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
<div id="bar_line"><img src="images/BAR.png" /></div> <li><a href="contact_us.php">Contact Us</a></li>
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

<div style="width:440px; float:left;">
	<div id="welcome">Payment</div>
    <div id="log_icon" style="margin:65px 0 0 -72px;"></div>
      
	<div style="width:430px; float:left; margin:0 0 20px 15px;">
<?php
	$hDB->Query("SELECT * FROM tbl_payment_info WHERE client_id='".$_SESSION['userid']."'");
	if($hDB->Row() > 0)
	{
?>
    	<table border="1" width="96%">
        	<thead>
            	<tr>
                	<th width="8%">SL</th>
                	<th width="32%">Installment</th>
                    <th width="25%">Date</th>
                    <th width="35%">Amount (Tk.)</th>
                </tr>
          	</thead>
            <tbody>
<?php
		while($obj = $hDB->Fetch())
		{
			$sn++;
			$total = $total + $obj->payment_amount;
?>
				<tr>
                	<td align="center"><?php print $sn ?></td>
                	<td><?php if($obj->payment_installment == 0) print "Down payment"; else print $obj->payment_installment ?></td>
                    <td align="center"><?php print date("d M, Y",strtotime($obj->payment_date)) ?></td>
                    <td align="right"><?php print $obj->payment_amount ?></td>
                   	
                </tr>
<?php
		}
?>
			</tbody>  
        </table>
        
        <div class="total_payment">Total Pyament: &nbsp; <?php print $total ?></div>
<?php
	}
?>   
	
    </div>
         
</div>
<div style="width:270px; float:left; height:400px;">
<?php 
	$hDB->Query("SELECT client_name FROM tbl_client_profile WHERE client_id='".$_SESSION['userid']."'");
	$obj = $hDB->Fetch();
?>
          <div style="width:150px; float:left; margin:50px 0 0 30px;"><?php print $obj->client_name ?></div>
          <div class="profile_bg">
          	 <a href="profile.php">View Profile</a>
             <a  href="#">Payment Profile</a>
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