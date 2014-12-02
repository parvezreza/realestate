<?php 
	session_start();
	require_once('include/header.php');
	require_once('admin/include/DBConnect.php');
	$hDB = new DBConnect();
 ?>
 		<link rel="stylesheet" href="custom-theme/jquery-ui-1.10.2.custom.css" type="text/css" />
		<link rel="stylesheet" href="colorbox/colorbox.css" />
		<script src="colorbox/jquery.colorbox.js"></script>
        
		<script type="text/javascript" src="js/scroll/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="js/scroll/jquery.jscrollpane.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jwplayer.js"></script>
        
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				//Examples of how to assign the ColorBox event to elements
				$(".colorbox").colorbox({rel:'colorbox', transition:"fade"});
				$(".albumimage").colorbox({rel:'albumimage', transition:"fade"});
			
				$('.scroll-pane').jScrollPane({showArrows: true});
				$('#gallery_right').jScrollPane({showArrows: true});
				
				$(".player").click(function(e){
					e.preventDefault();
					
					var vfile = $(this).attr('href');
					
					$("#dialog").dialog({
						resizable	: 	false,
						closeOnEscape : false,
						modal		: 	true,
						width		:	500,
						height		: 	310,
						open		: 	function() { 
											jwplayer("myElement").setup({
												file: vfile
											})
										}
					});
				})
			});
		</script>
<link rel="stylesheet" type="text/css" href="styles/jquery.jscrollpane.css" />
<!--<link rel="stylesheet" type="text/css" href="styles/demo.css" />-->
<style type="text/css" id="page-css">
			/* Styles specific to this particular page */
			.scroll-pane
			{
				width: 710px;
				height: 238px;
				overflow: auto;
				border:1px solid #999;
				float:right;
				margin:0px 18px 30px 0;
			}
			.horizontal-only
			{
				height:138px;
				/*max-height: 250px;*/
			}
			.vwrap{
				float:left;
				margin:5px 10px 5px 5px;
				width:108px;
				height:108px;
				background:#8ac181;
				border:1px solid #999;
			}
			.vwrap img{
				margin:4px 4px;
			}
			a img{border:none}
		</style>
<!-- ****************** Scrollbar End  *************************** -->  
   
<!--		For Search			-->
<wg key="Gallery" des="Noboudoy Photo Gallery, Video Gallery, Corportate office gallery ">
<!--		for search			-->
    
<div class="menu_bar_bg">
<div id="centeredmenu">

   <ul>
     <li  class="active"><a href="index.php" class="active"><div id="home"><img src="images/home-logo.png" border="none" /></div>Home</a></li>
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
            <li><a href="land_project.php">Land Project</a></li>
            <li><a href="apartment_project.php">Apartment Project</a></li>
         </ul>
      </li>
      <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="career.php">Career</a></li>
       <div id="bar_line"><img src="images/BAR.png" /></div><li><a href="#">Gallery</a>
        <!-- <ul>
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
<div class="search"><a href="#">Search</a></div></div>
<div class="bar_line"><img src="images/line_bar.png" /></div>
<div class="sign_in"><a href="customer_login.php">Sign in</a></div></div></div><!--menu_bar_bg-->
<div class="left_nav">
<div class="sidebarmenu">    
                <a class="menuitem" href="index.php"><span>&nbsp; Home</span></a>
                <a class="menuitem submenuheader" href=""><span>About Us</span></a>
                <div class="submenu">
                    <ul>
                    	<li><a href="company_profile.php">Company Profile</a></li>
            			<li><a href="message_chairman.php">Message of the Charman</a></li>
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

    </div> <!--Left_nav DIV End-->
<div class="nav_bar_home" style="height:642px"></div>

<?php
if($_GET["album"])
		{
			$album = $_GET["album"];
 ?>
<div id="gallery_icon"><img style="margin:15px 0px 0px 240px" src="images/photo_gallery_icon.png" /><span><a href="gallery.php">Return to Photo Gallery</a></span></div>
<div id="gallery_left">
	<div id="BG_gallery_left"><img style="margin-left:5px;" src="images/NGallery_left.png" width="185" /></div>
    <p>NOBOUDOY HOUSING LIMITED <br />
     <center><span style="font-family:'Chandraboti'; font-size:12px; color:#666">Avcbvi Ges fwel¨r cÖR‡b¥i wbivc` Avevmb</span>
     <img src="images/G_icon_left.png" /></center>
    </p>
    <div id="corporate_gallery">
    	<span>
    	<a class="colorbox" href="corporate/1.png"><img src="corporate/thumb/1.png" /></a>
        <a class="colorbox" href="corporate/2.png"><img src="corporate/thumb/2.png" /></a>
        <a class="colorbox" href="corporate/3.png"><img src="corporate/thumb/3.png" /></a>
        <a class="colorbox" href="corporate/4.png"><img src="corporate/thumb/4.png" /></a>
        </span>
        <p>Our Corporate Office</p>
    </div>
</div>
<div id="gallery_right">
	<div style="width:485px">
	<?php
                $dir = "admin/gallery/".$album."/thumb/";
                $opendir = @opendir($dir);
                while( $file = @readdir($opendir) )
                {
                    if( $file != "." && $file != ".." && $file != "thumbs.db" && $file != "index.html" )
                    {
        ?>     			
                        <span>
                           <a class="albumimage" href="<?php print "admin/gallery/".$album."/".$file ?>">
                                <img src="<?php print $dir."/".$file ?>" />
                            </a>
                         
                        </span>
                        
        <?php
                    }
                }
                closedir($opendir);
        ?>
  	</div>
</div>
	<?php
		}
		else {
	?>
<div id="gallery_icon"><img style="margin:15px 0px 0px 240px;" src="images/photo_gallery_icon.png" /><span>Photo Gallery</span></div>
<div id="gallery_left">
	<div id="BG_gallery_left"><img style="margin:8px 0 0 7px;" src="images/NGallery_left.png" width="185" /></div>
    <p>NOBOUDOY HOUSING LIMITED <br />
     <span style="font-family:'Chandraboti'; font-size:12px; color:#666">Avcbvi Ges fwel¨r cÖR‡b¥i <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;wbivc` Avevmb</span>
     <img src="images/G_icon_left.png" />
    </p>
    <div id="corporate_gallery">
    	<span>
    	<a class="colorbox" href="corporate/1.png"><img src="corporate/thumb/1.png" /></a>
        <a class="colorbox" href="corporate/2.png"><img src="corporate/thumb/2.png" /></a>
        <a class="colorbox" href="corporate/3.png"><img src="corporate/thumb/3.png" /></a>
        <a class="colorbox" href="corporate/4.png"><img src="corporate/thumb/4.png" /></a>
        </span>
        <p>Our Corporate Office</p>
    </div>
</div>
<div id="gallery_right">
	<div style="width:485px">
		<?php
                $dir = "admin/gallery/";
                $opeddir = opendir($dir);
                while( $album = readdir($opeddir) )
                {
                    if( $album != "." && $album != ".." && $album != "thumbs.db" && $album != "index.html" )
                    {
                        if( is_dir($dir.$album) )
                        {
        ?>		
        					<div class="album_cover">				
                                <div class="gwrap" style=" background:url(<?php print $dir.str_replace(' ','%20',$album)."/album-cover.jpg" ?>) no-repeat">
                                    <a href="gallery.php?album=<?php print $album ?>"><p class="title"><?php print $album ?></p></a>
                                </div>
                            </div>   
      
        <?php
                        }
                    }
                }
                closedir($opeddir);
        ?>
	</div>
</div>
<?php 
			}
?>			
			
			<div id="gallery_icon" style="margin:15px 0px 0px 5px"><img  style="margin:15px 0px 0px 15px;" src="images/video_gallery_icon.png" /><span>Video Gallery</span></div>
			<div class="scroll-pane horizontal-only">
				<p style="width: 710px;">
                	<?php
						$hDB->Query("SELECT * FROM tbl_video_gallery");
						while( $obj = $hDB->Fetch())
						{
					?>
                    	<div class="vwrap">
                        	<a href="videos/<?php print $obj->video_name ?>" class="player">
                            	<img style="margin-bottom:10px" src="videos/<?php print $obj->video_thumbnail ?>" />
                            </a>
                        </div>
                    <?php
						}
					?>	
				</p>
			</div>
            
            <div id="dialog" class="dialog1" style="display:none; height:300px">
       			<div id="myElement">Loading the player...</div>
            </div>
            
      
 </div><!--Middle_content DIV End-->
<?php require_once('include/footer.php'); ?>