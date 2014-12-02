<?php 
	session_start();
	require_once('include/header.php');
	require_once('admin/include/DBConnect.php'); 
	$hDB = new DBConnect();
?>

<!--		For Search			-->
<wg key="Land Projects" des="Serving with integrity, conducting ourselves and our business in an honest ethical and trustworthy manner, treating everyone with care, fairness and respect, providing financial stewardship, growing through innovation and creativity is the basic care values for our country. For becoming a profitable organization, develop a solid corporate identity in our specified targeted market area, to establish good working relationships.">
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
<div id="bar_line"><img src="images/BAR.png" />
</div>
       <li class="active"><a href="#"class="active">
       <div id="home"><img src="images/home-logo.png" border="none" /></div>Projects</a>
       
   <ul>
       <li><a href="land_project.php">Land Projects</a></li>
       <li><a href="apartment_project.php">Apartment Projects</a></li>
   </ul>
   </li>
   
  <div id="bar_line"><img src="images/BAR.png" />
</div>
       <li><a href="career.php">Career</a></li>
   <div id="bar_line"><img src="images/BAR.png" />
</div><li><a href="gallery.php">Gallery</a>

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

<div class="search_box">
	<form action="search.php" method="get" id="SearchForm">
		<input type="text" id="search" name="search" value="Search" size="20" />
    </form>
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
                       <a class="menuitem" href=""><span>&nbsp; Home</span></a>
                       <a class="menuitem submenuheader" href="About Us.php"><span>About Us</span></a>
<div class="submenu">
                <ul>
                    <li><a href="company_profile.php">Company Profile</a></li>
            		<li><a href="message_chairman.php">Message of the Chairman </a></li>
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
                </div>

<div class="nav_bar_land_project">
  <div class="middle_content_land_project">
    <div class="land_project_content_img">
	  <!--<img src="images/land-projects-img.png" />-->
      <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="690" height="224">
  <param name="movie" value="land.swf" />
  <param name="quality" value="high" />
  <param name="wmode" value="opaque" />
  <param name="swfversion" value="6.0.65.0" />
  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
  <param name="expressinstall" value="Scripts/expressInstall.swf" />
  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
  <!--[if !IE]>-->
  <object type="application/x-shockwave-flash" data="flash/land.swf" width="690" height="224">
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
   <div class="some_text_here">Land Projects</div>
<div class="paragraph">
                       Serving with integrity, conducting ourselves and our business in an honest ethical and trustworthy manner,                        treating everyone with care, fairness and respect, providing      financial stewardship, growing through                        innovation and creativity is the basic care values for our country. For becoming a profitable organization,                       develop a solid corporate identity in our specified targeted market area, to establish good working                        relationships.
</div>

<div class="Handed_over_projects_img">
<a href="land_project.php?project=handed over"><img style="border:none" src="images/land-handed-over.png" /></a>
 </div>
   <div class="Ongoing_projects_img">
   <a href="land_project.php?project=ongoing"><img style="border:none" src="images/land-ongoing.png" /></a>
     </div>
       <div class="Upcoming_projects_img">
       <a href="land_project.php?project=upcoming"><img style="border:none" src="images/land upcoming.png" /></a>
         </div>
         
<div class="Handed_over_projects_text">
<a href="land_project.php?project=handed over">Handed Over Projects</a>
</div>

<div class="Ongoing_projects_text">
<a href="land_project.php?project=ongoing">Ongoing Projects</a>
</div>
    
<div class="Upcoming_projects_text">
<a href="land_project.php?project=upcoming">Upcoming Projects</a>
</div>

<div class="black_box_bg">
<div class="black_box_header">
<h4>
	Land Project <?php if($_GET['project']) print '- '.ucwords($_GET['project']) ?>
</h4>
<div class="black_box_logo">
  </div>
</div>

<!--				Projects List				-->
<div class="scroll">
	<?php
	if($_GET['project'] == 'handed over')
	{
		$hDB->Query("SELECT land_pro_over_id, land_pro_over_name, land_pro_over_feature FROM tbl_land_project_handover");
        //if($hDB->Row < 1) print "Problem";
        while($obj = $hDB->Fetch())
        {
    ?>
        <div class="black_box_border">
            <h1>
                <?php print $obj->land_pro_over_name ?>
            </h1>
            <h5 id="h5">
                <?php print substr(strip_tags($obj->land_pro_over_feature),0,130)."..." ?>
            </h5>
            <div class="read_more">
                <h3>
                    <a href="land_project_inner.php?project=handover&id=<?php print $obj->land_pro_over_id ?>">Read more</a>
                </h3>
            </div>
        </div>
        <div class="black_box_border_right_img4">
            <img src="project/land/<?php print $obj->land_pro_over_name ?>/thumb_thumbnail.jpg" />
        </div>
	<?php
		}
	}
	elseif($_GET['project'] == 'ongoing')
	{
		// For ongoing
        $hDB->Query("SELECT land_pro_on_id, land_pro_on_name, land_pro_on_feature FROM tbl_land_project_ongoing");
        while($obj = $hDB->Fetch())
        {
    ?>
        <div class="black_box_border">
            <h1>
                <?php print $obj->land_pro_on_name ?>
            </h1>
            <h5 id="h5">
                <?php print substr(strip_tags($obj->land_pro_on_feature),0,130)."..." ?>
            </h5>
            <div class="read_more">
                <h3>
                    <a href="land_project_inner.php?project=ongoing&id=<?php print $obj->land_pro_on_id ?>">Read more</a>
                </h3>
            </div>
        </div>
        <div class="black_box_border_right_img4">
            <img src="project/land/<?php print $obj->land_pro_on_name ?>/thumb_thumbnail.jpg" />
        </div>
	<?php
		}
	}
	elseif($_GET['project'] == 'upcoming')
	{
		//For Upcoming
        $hDB->Query("SELECT land_pro_up_id, land_pro_up_name, land_pro_up_feature FROM tbl_land_project_upcoming");
        while($obj = $hDB->Fetch())
        {
    ?>
        <div class="black_box_border">
            <h1>
                <?php print $obj->land_pro_up_name ?>
            </h1>
            <h5 id="h5">
                <?php print substr(strip_tags($obj->land_pro_up_feature),0,130)."..." ?>
            </h5>
            <div class="read_more">
                <h3>
                    <a href="land_project_inner.php?project=upcoming&id=<?php print $obj->land_pro_up_id ?>">Read more</a>
                </h3>
            </div>
        </div>
        <div class="black_box_border_right_img4">
            <img src="project/land/<?php print $obj->land_pro_up_name ?>/thumb_thumbnail.jpg" />
        </div>
	<?php
		}
	}
	else
	{
		// For handed over
        $hDB->Query("SELECT land_pro_over_id, land_pro_over_name, land_pro_over_feature FROM tbl_land_project_handover");
        //if($hDB->Row < 1) print "Problem";
        while($obj = $hDB->Fetch())
        {
    ?>
        <div class="black_box_border">
            <h1>
                <?php print $obj->land_pro_over_name ?>
            </h1>
            <h5 id="h5">
                <?php print substr(strip_tags($obj->land_pro_over_feature),0,130)."..." ?>
            </h5>
            <div class="read_more">
                <h3>
                    <a href="land_project_inner.php?project=handover&id=<?php print $obj->land_pro_over_id ?>">Read more</a>
                </h3>
            </div>
        </div>
        <div class="black_box_border_right_img4">
            <img src="project/land/<?php print $obj->land_pro_over_name ?>/thumb_thumbnail.jpg" />
        </div>
    <?php
        }
        
        // For ongoing
        $hDB->Query("SELECT land_pro_on_id, land_pro_on_name, land_pro_on_feature FROM tbl_land_project_ongoing");
        while($obj = $hDB->Fetch())
        {
    ?>
        <div class="black_box_border">
            <h1>
                <?php print $obj->land_pro_on_name ?>
            </h1>
            <h5 id="h5">
                <?php print substr(strip_tags($obj->land_pro_on_feature),0,130)."..." ?>
            </h5>
            <div class="read_more">
                <h3>
                    <a href="land_project_inner.php?project=ongoing&id=<?php print $obj->land_pro_on_id ?>">Read more</a>
                </h3>
            </div>
        </div>
        <div class="black_box_border_right_img4">
            <img src="project/land/<?php print $obj->land_pro_on_name ?>/thumb_thumbnail.jpg" />
        </div>
    <?php
        }
        
        //For Upcoming
        $hDB->Query("SELECT land_pro_up_id, land_pro_up_name, land_pro_up_feature FROM tbl_land_project_upcoming");
        while($obj = $hDB->Fetch())
        {
    ?>
        <div class="black_box_border">
            <h1>
                <?php print $obj->land_pro_up_name ?>
            </h1>
            <h5 id="h5">
                <?php print substr(strip_tags($obj->land_pro_up_feature),0,130)."..." ?>
            </h5>
            <div class="read_more">
                <h3>
                    <a href="land_project_inner.php?project=upcoming&id=<?php print $obj->land_pro_up_id ?>">Read more</a>
                </h3>
            </div>
        </div>
        <div class="black_box_border_right_img4">
            <img src="project/land/<?php print $obj->land_pro_up_name ?>/thumb_thumbnail.jpg" />
        </div>
    <?php
        }
	}
    ?>

</div>
<!--			//			//					-->
</div>
</div>
</div>
</div><!--content DIV-->
<?php require_once('include/footer.php'); ?>