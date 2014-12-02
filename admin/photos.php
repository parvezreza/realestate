<?php 
	require_once( 'include/DBConnect.php' );
	require_once( 'include/Thumb.php' );
	include('include/Logger.php');
	$hDB = new DBConnect();
	$up_id = uniqid();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Photo Gallery | Noboudoy Housing Limited</title>
<link rel="stylesheet" href="styles/styles.css" type="text/css" />
<link rel="stylesheet" href="styles/media.css" type="text/css" />
<link rel="stylesheet" href="styles/style_progress.css" type="text/css" />
<link rel="stylesheet" href="ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.formcheck.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var selcount = 0;
			
	/****			Delete action			** **/
		jQuery ("a#mnu-delete").click( function(e) {
			e.preventDefault();
			
			if( selcount > 0 )
				jQuery ("#delete").dialog({
						title		: 'Confirmation',
						resizable	: false,
						closeOnEscape : false,
						open		: function() { $('#delete #cnftext span').html( selcount ); },
						close		: function() { $('#delete #cnftext span').html(''); }
				});
		});
		
		jQuery ('#btnDelete').click( function() {
			jQuery ('#DataForm').submit();
		});
		
		jQuery ('#btnDelCancel').click( function() {
			jQuery ('#delete').dialog( 'close' );
		});
	
	/****			Create Album action			** **/
		jQuery ("a#mnu-album").click( function(e) {
			e.preventDefault();
			var album = getUrlVars()["album"];
			if( typeof(album) !== 'undefined' ) {
				jQuery("#message").dialog({
						title		: 'Information',
						resizable	: false,
						closeOnEscape : false,
						open		: function() { $('#message #cnftext').html('You can\'t create new album in a other album!'); }
				});
			}
			else {
				
				jQuery ("#mkalbum").dialog({
						title		: 'Confirmation',
						resizable	: false,
						closeOnEscape : false
				});
			}
		});
		
		jQuery ('#btnAlbum').click( function() {
			jQuery ('#AlbumForm').submit();
		});
		
		jQuery ('#btnAlbumCancel').click( function() {
			jQuery ('#mkalbum').dialog( 'close' );
		});	
		
	/****			Message action			** **/
		
		jQuery ('#btnOk').click( function() {
			jQuery ('#message').dialog( 'close' );
		});			
	
	/***			Upload Action			***/
		jQuery("a#mnu-upload").click(function(e) {
			var album = getUrlVars()["album"];

			if( typeof(album) === "undefined" ) {
				e.preventDefault();
				jQuery("#message").dialog({
						title		: 'Information',
						resizable	: false,
						closeOnEscape : false,
						open		: function() { $('#message #cnftext').html('You didn\'t select any album! Please select a album then try.'); }
				});
			}
		});
	
			/*****		Check all checkbox		********/
			$(":checkbox#ckall").click(function() {
				var $this = $(this);
				if ($this.is(':checked')) {
					$("input#ckbox").attr("checked","checked");
					selcount = $("input#ckbox").length;
				} else {
					$("input#ckbox").removeAttr("checked");
					selcount = 0;
				}
			});
			
			/******		Check one by one checkbox	******/
			$("input#ckbox").click(function() {
				var $this = $(this);
				if ($this.is(':checked')) {
					$(this).attr("checked","checked");
					selcount++;
				} else {
					$(this).removeAttr("checked");
					selcount--;
				}
			});
		/*					***					*/
			jQuery("div.gwrap").hover(
				function() {
					var index = $("div.gwrap").index(this);
					$("span.gtools:eq("+index+")").add("p.title:eq("+index+")").css({ 'visibility': 'visible' });
				},
				function() {
					var index = $("div.gwrap").index(this);
					if( !$("span.gtools #ckbox:eq("+index+")").is(':checked') ) {
						$("span.gtools:eq("+index+")").add("p.title:eq("+index+")").css({ 'visibility': 'hidden' });
					}
				}
			);
			
			jQuery ("div.file-wrapper .upload").change( function() {
				$(this).parent().next("input").val( $(this).val() );
			});
			
			//show the progress bar only if a file field was clicked
			var show_bar = 0;
			$('input[type="file"]').click(function(){
				show_bar = 1;
			});
		
			//show iframe on form submit
			$("#DataForm").submit(function(){
		
				if (show_bar === 1) { 
					$('#upload_frame').show();
					function set () {
						$('#upload_frame').attr('src','include/upload_frame.php?up_id=<?php echo $up_id; ?>');
					}
					setTimeout(set);
				}
			});
					
	});
			
</script>

</head>
<body>
	<div class="header">
    <!-- 	Log out					-->
    	<div class="top-bar"><h3>Photo Gallery</h3><a href="index.php?option=logout"><span>Logout</span><img src="styles/icon-logout.gif"></a></div>
    	<!-- 																		-->
    
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
    	<!--	end of main navigation		-->
	
    <!--	Sub Navigation				-->            
        <div class="sub-tab">
        	<p>
            	<a href="photos.php"><img src="styles/tools-album-icon.png" height="25"><span>Albums</span></a> 
            	<a id="mnu-album" href=""><img src="styles/tools-create-album.png" height="25"><span>Create Album</span></a>
                <a id="mnu-upload" href="photos.php?option=upload&album=<?php print $_GET['album'] ?>"><img src="styles/tools-upload-photo.png" /><span>Upload Photo</span></a>
                <a id="mnu-delete" href=""><img src="styles/tools-delete.png" height="25"><span>Delete</span></a>
                <!--<a id="" href=""><img src="styles/cpanel.png" width="25" /><span>Settings</span></a>-->
            </p>    
        </div>
        <!--	end		-->
    </div>
    
    <div class="content">
    <?php
		if($_POST)
		{
			if($_POST["ckbox"])
			{
				foreach( $_POST["ckbox"] as $did )
				{
					if( is_dir("gallery/".$did) )
					{
						$opendir = opendir("gallery/".$did);
						while( $file = readdir($opendir) )
						{
							if( $file != "." && $file != ".." ) {
								if( is_dir("gallery/".$did."/".$file) )
								{
									$openthumb = opendir("gallery/".$did."/".$file);
									while( $tfile = readdir($openthumb) )
									{
										if( $tfile != "." && $tfile != ".." ) {
											@unlink( "gallery/".$did."/".$file."/".$tfile );
										}
									}
									closedir($openthumb);
									// Remove thumb directory
									@rmdir( "gallery/".$did."/".$file );
								}
								else {
									@unlink( "gallery/".$did."/".$file );
								}
							}
						}
						closedir($opendir);
						
						if( !rmdir("gallery/".$did) ) {
							Notify::Error( "Permission denaied! <b>".$did."</b> photo album didn't delete." );
						}
						else {
							$albumsc++;
						}
					}
					else
					{
						if( !@unlink("gallery/".$_GET["album"]."/".$did) || !@unlink("gallery/".$_GET["album"]."/thumb/".$did) ) {
							$err++;
						}
						else {
							$sc++;
						}
					}
				}
				
				if( $albumsc > 0 ) Notify::Success( $albumsc." Album(s) has deleted successfully!" );
				elseif( $sc > 0 ) Notify::Success( $sc." File(s) has deleted successfully!" );
				elseif( $err > 0 ) Notify::Error( "File permission denaied! ".$err." File(s) didn't delete." );
			}
			elseif( $_POST["albumname"] )
			{
				$name = trim($_POST['albumname']);
				if( !@mkdir("gallery/".$name,0777) ) {
					Notify::Error( "Permission denaied! New album didn't create." );
				}
				else {
					Notify::Success( "<b>".$name."</b> photo album has created successfully!" );
					@copy("styles/album-cover.png","gallery/".$name."/album-cover.jpg");
					@touch("gallery/".$name."/index.html");
					
					// Create thumb directory for thumbnails
					@mkdir("gallery/".$name."/thumb");
					@touch("gallery/".$name."/thumb/index.html");
				}
			}
			
			elseif( $_POST["fupload"] )
			{
				$up_id = uniqid();
				
				$album = $_GET["album"];
				if( ($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/png") && $_FILES["file"]["size"] < 256000 )
				{
					if( !file_exists("gallery/".$album."/".$_FILES["file"]["name"]) ) { // Check file is exists?
						if( !@copy($_FILES["file"]["tmp_name"],"gallery/".$album."/".$_FILES["file"]["name"]) ) {
							Notify::Error( "Failed to open File stream! File not uploaded, please try again." );
						}
						else {
							Notify::Success( "File uploaded successfully!" );
							Thumbnail::Create( $_FILES["file"]["name"], $_FILES["file"]["type"] );
						}
					}
					else {
						Notify::Attention( "This file aready exists! Please try ohters." );
					}
				}
				else {
					Notify::Error( "Invalid file type or size! Please upload valid type or size of file." );
				}
			}
						
		}
		
		if( $_GET )
		{
			if( $_GET['option'] == "cover" )
			{
				if( !@copy("gallery/".$_GET["album"]."/thumb/".$_GET["photo"],"gallery/".$_GET["album"]."/album-cover.jpg") ) {
					Notify::Error( "Permission not granted! Album cover didn't change." );
				}
				else {
					Notify::Success( "Album cover has changed successfully!" );
				}
			}
		}
				
	?>
<!--   *****************		Article Add Form Module			***************** -->
	 <?php
		if($_GET["option"]==="add")
		{
	?>  
            <div class="module-75" style="float:left">
                <div class="module-header"><span>Add Notice</span></div>
                <div class="module-body">
                    <form action="notice.php" method="post" id="DataForm">
                        <p>Name</p><input name="title" class="input short" type="text"> <span></span>
                        
                        <p>Alias</p><input name="alias" class="input short" type="text"> <span></span>
                        
                        <p>Description</p><textarea name="description" class="input long" rows="10"></textarea>
                       
                        <p><input type="button" id="btnSubmit" value="Submit" class="submit green"><input type="button" value="Cancel" class="submit gray"></p>
                        
                    </form>
                </div>
            </div>
           
	<?php
		}

/* <!-- 	*********************		end of article module		******************* -->*/
    	elseif($_GET["option"]==='upload')
		{
			$album = $_GET['album'];
    ?>
    	<!-- 	*********************		upload photo module		******************* -->	
        	<div class="module-45" style="float:left">
                <div class="module-header"><span>Upload Photo in <a href="photos.php?album=<?php print $album ?>"><?php print $album ?></a></span></div>
                <div class="module-body">
                    <form action="photos.php?option=upload&album=<?php print $album ?>" method="post" id="DataForm" enctype="multipart/form-data">
                    	<p><b>Supported File Format:</b> JPG, GIF & PNG</p>
                        <p><b>Max Upload Siae:</b> 250 Kb</p>
                        <p>&nbsp;</p>
                        
                    	<div class="file-wrapper" >
            				<input type="file" name="file" class="upload" size="1" /><input type="submit" id="upload" class="submit green" value="Browse File" /> 
                		</div>
                        &nbsp;<input type="text" class="input medium" name="fupload" />
                        
                   	<!--APC hidden field-->
    					<input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $up_id; ?>"/>
					<!---->

                    <!--Include the iframe-->
                        <br />
                        <iframe id="upload_frame" name="upload_frame" frameborder="1" border="1" src="" scrolling="no" scrollbar="no" > </iframe>
                        <br />
                    <!---->
                     	<p><input type="submit" class="submit green" value="Upload File" /></p><br />
                        <p><<<a href="photos.php?album=<?php print $album ?>"> Back to Album</a></a>
                        
                    </form>
                </div>
            </div>
	<?php
		}
/* <!-- 	*********************		end of upload module		******************* -->*/
    	elseif($_GET["album"])
		{
			$album = $_GET["album"];
    ?>
    	<!-- 	*********************		Start of Edit noticeegory		******************* -->	
        	<div class="module-75" style="float:left">
                <div class="module-header"><span>Photos of <?php print $album ?></span></div>
                <div class="module-body">
                <form action="photos.php?album=<?php print $album ?>" method="post" id="DataForm">
   	<?php
			$dir = "gallery/".$album."/thumb/";
			$opendir = @opendir($dir);
			while( $file = @readdir($opendir) )
			{
				if( $file != "." && $file != ".." && $file != "thumbs.db" && $file != "index.html" )
				{
	?>
                    <div class="gwrap" style=" background:url(<?php print "gallery/".str_replace(' ','%20',$album)."/thumb/".str_replace(' ','%20',$file) ?>) no-repeat">
                        <span class="gtools">
                        	<a href="photos.php?album=<?php print $album."&option=cover&photo=".$file ?>" title="Set as album cover" style="margin:3px 0 0 6px; float:left">
                            	<img src="styles/small-tools-settings.png" />
                            </a>
                        	<input id="ckbox" type="checkbox" name="ckbox[]" value="<?php print $file ?>" />
                        </span>
                        <a href="<?php print "gallery/".$album."/".$file ?>" target="_blank"><p class="title"><?php print $file ?></p></a>
                    </div>      
	<?php
				}
			}
			closedir($opendir);
	?>
    			</form>
    			</div>
           	</div>
	<?php
		}
		
 /*<!--	********************* 		Album art Module		******************* -->*/
		
		else
		{
	?>
    		<div id="mod-main" class="module-95" style="float:left">
               	<div class="module-header"><span>Photo Albums</span></div>
                <div class="module-body">
                <form action="photos.php" method="post" id="DataForm">
    <?php
			$dir = "gallery/";
			$opeddir = opendir($dir);
			while( $album = readdir($opeddir) )
			{
				if( $album != "." && $album != ".." && $album != "thumbs.db" && $album != "index.html" )
				{
					if( is_dir($dir.$album) )
					{
	?>
                        
                    	<div class="gwrap" style=" background:url(<?php print $dir.str_replace(' ','%20',$album)."/album-cover.jpg" ?>) no-repeat">
                        	<span class="gtools"><input id="ckbox" type="checkbox" name="ckbox[]" value="<?php print $album ?>" /></span>
                            <a href="photos.php?album=<?php print $album ?>"><p class="title"><?php print $album ?></p></a>
                        </div>      
	<?php
					}
				}
			}
			closedir($opeddir);
	?>
    			</form>
    			</div>
           	</div>
    <?php
		}
	?>
<!--		******************			end of module table			********************	-->
		
        <!--			delete module			-->
            <div id="delete" style="display:none; margin:5px 0px">
                <center>
                <p id="cnftext"><span></span> item(s) into the queue! Do you want delete?</p>
                <br />
                <br />
                <p>
                    <input type="button" id="btnDelete" value="&nbsp; Yes &nbsp;" class="submit green" /> 
                    <input type="button" id="btnDelCancel" value="&nbsp; No &nbsp;" class="submit gray" />
                </p>
                </center>               
        	</div>
       	<!--			***				***				-->
        
        <!--		Subdirectory create form		-->
            <div id="mkalbum" style="display:none">
               	<form action="photos.php" method="post" id="AlbumForm">
                    <p>Album Name <span style="font-size:10px">( 5 - 10 )</span><span id="notification"></span></p>
                            <input class="input long" name="albumname" type="text" style="width:96%" />
                            <span></span>
                    
                    <center><p>
                        <input type="button" id="btnAlbum" value="Create" class="submit green" /> 
                        <input type="button" id="btnAlbumCancel" value="Cencel" class="submit gray" />
                    </p></center>
                </form>
            </div>
     	<!--			///								-->
	 
    	<!--			Message module			-->
            <div id="message" style="display:none; margin:5px 0px">
                <center>
                <p id="cnftext"></p>
                <br />
                <p>
                    <input type="button" id="btnOk" value="&nbsp; Ok &nbsp;" class="submit green" /> 
                </p>
                </center>               
        	</div>
       	<!--			***				***				-->
        
    </div>
    
    <!-- 	footer							-->
    <div class="footer">
    	<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
    </div>
</body>
</html>