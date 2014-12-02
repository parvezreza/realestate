<?php
	require_once( '../include/DBConnect.php' );
	include('../include/Logger.php');
	$hDB = new DBConnect();
	Logger::Check();;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Client Diary | Noboudoy Housing Limited</title>
<link rel="stylesheet" href="../styles/styles.css" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
</head>
<body>
	<div class="header">
    <!--	Log out		-->
    	<div class="top-bar"><h3>Client Diary</h3><a href="../index.php?option=logout"><span>Logout</span><img src="../styles/icon-logout.gif"></a></div>
    <!--																			-->
        
    <!--	Main Navigation				-->    
        <div class="tab">
            	<ul id="nav">
                	<li><a href="../dashboard.php">Dashboard</a></li>
                    <li><a href="../land/">Land Project</a></li>
                    <li><a href="../apartment/">Apartment Project</a></li>
                    <li id="active"><a href="index.php">Client Diary</a></li>
                    <li><a href="../profile.php">User Manager</a></li>
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
        	<a href="clients.php?option=add"><img src="../styles/client-add-icon.png" /><span>Add Client</span></a>
            <a href="signup.php"><img src="../styles/waiting-client.png" /><span>Waiting Signup</span></a>
            <a href="clients.php"><img src="../styles/client-list-2.png" /><span>Client List</span></a>
            <a href="plot.php"><img src="../styles/plot-icon.png" /><span>Plot</span></a>
            <a href="payment.php"><img src="../styles/payment_icon.png" /><span>Payment</span></a>
        </div>
   		<!-- 	end of Dashbord module			-->    
       
    </div>
    <!--	end of content		-->
   
    <!--	footer					-->
    <div class="footer">
    	<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
    </div>
</body>
</html>

