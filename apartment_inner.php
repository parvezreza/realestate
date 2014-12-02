<?php 
	session_start();
	require_once('include/header.php');
	require_once('admin/include/DBConnect.php'); 
	$hDB = new DBConnect();
?>

<link rel="stylesheet" href="colorbox/colorbox.css" />
<script src="colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" id="sourcecode">
	$(function(){
		//Examples of how to assign the ColorBox event to elements
		$(".colorbox").colorbox({rel:'colorbox', transition:"fade"}); 
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
      <div id="bar_line"><img src="images/BAR.png" /></div><li class="active"><a href="#" class="active"><div id="home"><img src="images/home-logo.png" border="none" /></div>Projects</a>
         <ul>
            <li><a href="land_project.php">Land Projects</a></li>
            <li><a href="apartment_project.php">Apartment Projects</a></li>
         </ul>
      </li>
      <div id="bar_line"><img src="images/BAR.png"/></div><li><a href="career.php">Career</a></li>
       <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="gallery.php">Gallery</a>
         <!--<ul>
            <li><a href="#">Photo Gallery</a></li>
            <li><a href="#">Video Gallery</a></li>
         </ul>-->
      </li>   
      <div id="bar_line"><img src="images/BAR.png" />
    </div>
         <li><a href="contact_us.php" >Contact Us</a></li>
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
</div><!--menu_bar_bg-->


<div class="left_nav">
<div class="sidebarmenu">    
                       <a class="menuitem" href=""><span>&nbsp; Home</span></a>
                       <a class="menuitem submenuheader" href="About Us.php"><span>About Us</span></a>
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

<div class="middle_apartment_inner">
<div class="nav_bar_apartment_inner">

<!--<div class="slider1"></div>-->
<?php
	$id = $_GET['id'];
	$project = $_GET['project'];
	$prefix = '';
	
	// Check project table properties
	if($project == 'handover') $prefix = 'over';
	if($project == 'ongoing') $prefix = 'on';
	if($project == 'upcoming') $prefix = 'up';
	
	$hDB->Query("SELECT * FROM tbl_apartment_project_".$project." WHERE apart_pro_".$prefix."_id = '".$id."'");
	$obj = $hDB->Arrays();
?>
<div class="noboudoy_purbachal_city"><?php print $obj[1] ?></div>

<div id="terms"><a href="apartment_inner.php?<?php print 'project='.$project.'&opt=terms&id='.$id ?>">Terms & Conditions</a></div>
<div class="white_bar_bg">
<div id="application"><a href="apartment_inner.php?<?php print 'project='.$project.'&opt=application&id='.$id ?>">Application Form</a></div></div>
<div id="layout"><a href="apartment_inner.php?<?php print 'project='.$project.'&opt=layout&id='.$id ?>">Floor Plan</a></div>
<div class="white_bar_bg">
<div id="feature"><a href="apartment_inner.php?<?php print 'project='.$project.'&opt=feature&id='.$id ?>">Features</a></div></div>
<div id="price"><a href="apartment_inner.php?<?php print 'project='.$project.'&opt=pricelist&id='.$id ?>">Pricelist</a></h20>
<div class="white_bar_bg">
<div id="location"><a href="apartment_inner.php?<?php print 'project='.$project.'&opt=location&id='.$id ?>">Location Map</a></div></div>

<!--		Project Details				-->

<div class="land_inner_image" style="border:1px solid #696">
<!-- w: 570; h:415 -->

<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin:5px 5px 5px 5px; height:410px; overflow:auto; text-align:justify; line-height:20px; padding:0 10px 0 5px">
	<?php
		if($_GET['opt'] == 'terms')
		{
			print $obj[3];
		}
		elseif($_GET['opt'] == 'application')
		{
	?>
            <iframe src="http://docs.google.com/viewer?url=http%3A%2F%2Fwww.noboudoy.com%2Fproject%2Fapartment%2F<?php print str_replace(' ','%20',$obj[1]) ?>%2Fapplication.pdf&embedded=true" width="550" height="406" style="border: none;"></iframe>
            
    <?php
		}
		elseif($_GET['opt'] == 'feature'){
			print $obj[2];
		}
		elseif($_GET['opt'] == 'pricelist')
		{
	?>
    		<table border="0" style="margin:0px">
            	<tr>
                	<td width="545" height="400" align="center" valign="middle">
                        <a class="colorbox" href="project/apartment/<?php print $obj[1] ?>/pricelist.jpg" style="margin:0 auto; width:545px">
                            <img src="project/apartment/<?php print $obj[1] ?>/pricelist.jpg" style="max-height:400px; max-width:545px" />
                        </a>
                 	</td>
              	</tr>
           	</table>
    <?php
		}
		elseif($_GET['opt'] == 'location')
		{
	?>
    		<table border="0" style="margin:0px">
            	<tr>
                	<td width="545" height="400" align="center" valign="middle">
                        <a class="colorbox" href="project/apartment/<?php print $obj[1] ?>/location.jpg" style="margin:0 auto; width:545px"> 
                            <img src="project/apartment/<?php print $obj[1] ?>/location.jpg" style="max-height:400px; max-width:545px" />
                        </a> 
                   	</td>
              	</tr>
           	</table>
                
    <?php
		}
		elseif($_GET['opt'] == 'layout')
		{
	?>
    	<div style="margin:3px 0 0 5px">
            <OBJECT CLASSID="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" CODEBASE="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" WIDTH="540" HEIGHT="400" ID="theMovie">
                		<PARAM NAME="FlashVars" VALUE="zoomifyImagePath=project/apartment/<?php print $obj[1] ?>/layout_img&zoomifyNavigatorVisible=false=true">
                		<PARAM NAME="BGCOLOR" VALUE="#000000">
                		<PARAM NAME="MENU" VALUE="FALSE">
				<PARAM NAME="SRC" VALUE="project/apartment/<?php print $obj[1] ?>/layout_img/zoomifyViewer.swf">
               			<EMBED FlashVars="zoomifyImagePath=project/apartment/<?php print $obj[1] ?>/layout_img&zoomifyNavigatorVisible=false=true" SRC="project/apartment/<?php print $obj[1] ?>/layout_img/zoomifyViewer.swf" BGCOLOR="#000000" MENU="false" PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"  WIDTH="540" HEIGHT="400" NAME="theMovie"></EMBED>
         	</OBJECT>
       	</div>
    <?php
		}
		else
		{
	?>
    		<table border="0" style="margin:0px">
            	<tr>
                	<td width="545" height="400" align="center" valign="middle">
    					<img src="project/apartment/<?php print $obj[1] ?>/thumbnail.jpg" style="max-height:400px; max-width:545px" />
                    </td>
              	</tr>
           	</table>
    <?php
		}
	?>
</div>	
</div>

</div>
</div></div><!--middle_content DIV-->
<?php require_once('include/footer.php'); ?>