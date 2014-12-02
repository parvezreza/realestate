<?php
	require_once( 'include/mzfilemanager.php' );
	$hDB = new DBConnect();
	Logger::CheckLogin( $hDB );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Manager | Noboudoy Housing Ltd</title>
<link rel="stylesheet" href="styles/styles.css" type="text/css" />
<link rel="stylesheet" href="styles/media.css" type="text/css" />
<link rel="stylesheet" href="ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript">

	function sendValue()
	{
		window.opener.document.getElementById('pdetails1').value=document.getElementById('details1').value;
		window.close();
	
	}
	
	jQuery ( document ).ready( function() {
		jQuery( "a#browser" ).click( function(e) {
			e.preventDefault();
			var src = $(this).attr('href');
			$("#viewport").dialog({
					width 		: 'auto',
					resizable	: false,
					draggable	: false,
					show		: 'slow',
					position	: 'center',
					open		: function(){$("#viewport img").attr("src",src);}

			});
		});
	});
</script>
</head>
<body>
	<div class="header">
    	<div class="top-bar"><a href="login.php?opt=logout"><span>Logout</span><img src="styles/icon-logout.gif"></a></div>
        <div class="tab">
            	<ul id="nav">
                	<li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="client/">Client Diary</a></li>
                    <li id="active"><a href="files.php?dir=media">File Manager</a></li>
                    <li><a href="profile.php">User Manager</a></li>
                </ul>
        </div>
        <div class="sub-tab">
        	<!-- <ul>
            	<li><a href="#"><img src="styles/icon_category.gif"> Sub Tab</a></li>
                <li>|</li>
                <li><a href="#">Sub Tab 2</a></li>
           	</ul> -->
        </div>
    </div>
    <!-- 		Call FManger class		-->
   
		<?php
            
            FManager::getFiles( 'fullcontrol' );
        
        ?>

    <!--		----		----		-->    
   
   <!--		View Port			-->
    <div id="viewport">
       	<img src=""/>
    </div>
    <!-- 			-			-->
    
   	<div class="footer">
   		<span>&copy; 2012. Worldgaon (Pvt.) Ltd.</span>
   </div>

</body>
</html>
      