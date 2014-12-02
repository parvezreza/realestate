<?php
	include( 'include/DBConnect.php' );
	include('include/Logger.php');
	$hDB = new DBConnect();
	Logger::Check();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Dashboard | Noboudoy Housing Limited</title>
<link rel="stylesheet" href="styles/styles.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
</head>
<body>
	<div class="header">
    <!--	Log out		-->
    	<div class="top-bar"><h3>Dashboard</h3><a href="index.php?option=logout"><span>Logout</span><img src="styles/icon-logout.gif"></a></div>
    <!--																			-->
        
    <!--	Main Navigation				-->    
        <div class="tab">
            	<ul id="nav">
                	<li id="active"><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="land/">Land Project</a></li>
                    <li><a href="apartment/">Apartment Project</a></li>
                    <li><a href="client/">Client Diary</a></li>
                    <li><a href="profile.php">User Manager</a></li>
                </ul>
        </div>
    	<!-- end of main navigation		-->  
     
    <!--		Sub navigation		-->    
        <div class="sub-tab">
        	
        </div>
    	<!-- 	end of sub navigation  -->    
    </div>
    
    <div class="content">
    
    <!--		Dashboard Module			-->	
    	<div class="dsahboard-module">
            <a href="land/"><img src="styles/landproject.png" /><span>Land Project</span></a>
            <a href="apartment/"><img src="styles/appartmentproject.png" /><span>Apartment Project</span></a>
            <a href="client"><img src="styles/clients.png" /><span>Client Diary</span></a>
            <a href="special_offer.php"><img src="styles/news-events.png" /><span>Special Offer</span></a>
            <a href="photos.php"><img src="styles/image-gallery.png" /><span>Photo Gallery</span></a>
            <a href="videos.php"><img src="styles/video-gallery.png" /><span>Video Gallery</span></a>
            <a href="profile.php"><img src="styles/Crystal_Clear_user.gif" /><span>User Manager</span></a>
        </div>
   		<!-- 	end of Dashbord module			-->    
   	</div>
    <!--	footer					-->
    <div class="footer">
    	<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
    </div>
</body>
</html>

<!--	<input type="text" class="input short" />
            <select class="input short">
            	<option>Option1</option>
                <option>Option2</option>
            </select> -->