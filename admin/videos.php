<?php
	session_start();
	require_once( 'include/DBConnect.php' );
	require_once( 'include/Thumb.php' );
	require_once( "include/UploadiFy.php" );
	include('include/Logger.php');
	$hDB = new DBConnect();
	Logger::Check();
	$up_id = uniqid();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Video Gallery | Noboudoy Housing Limited</title>
<link rel="stylesheet" href="styles/styles.css" type="text/css" />
<link rel="stylesheet" href="styles/media.css" type="text/css" />
<link rel="stylesheet" href="styles/style_progress.css" type="text/css" />
<link rel="stylesheet" href="ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.formcheck_OLD.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
			var selcount = 0;
		//show the progress bar only if a file field was clicked
			var show_bar = 0;
			$('input[type="file"]').click(function(){
				show_bar = 1;
			});
		
			jQuery ("input#btnSubmit").click( function() {
				jQuery('#DataForm').formCheck({ errorClass : 'input-notation-error', submit : true });
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
			
			jQuery ("div.file-wrapper .upload").change( function() {
				$(this).parent().next("input").val( $(this).val() );
			});
			
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
			
			/******		Form validation			***/
	});
	
</script>
<style type="text/css">
.wrapper
{
	border:1px solid #d9d9d9;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	display:block;
	width:130px;
	height:140px;
	float:left;
	margin:0 15px 15px 0;
	overflow:hidden;
}

.wrapper:hover{border:1px solid #a9c2d1}
.wrapper img {border:none; max-width:100px; max-height:100px; margin:10px 0 5px 0 }
.wrapper span { width:100%; text-align:center; margin:0 2px;}
</style>

</head>
<body>
	<div class="header">
	<!-- 	Log out					-->
    	<div class="top-bar"><h3>Video Gallery</h3><a href="index.php?option=logout"><span>Logout</span><img src="styles/icon-logout.gif"></a></div>
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
            	<a href="videos.php"><img src="styles/tools-videos-icon.png" height="25"><span>Videos</span></a> 
            	<a href="videos.php?option=upload"><img src="styles/tools-video-upload.png" height="25"><span>Upload Video</span></a>
                <a id="mnu-delete" href=""><img src="styles/tools-delete.png" height="25"><span>Delete</span></a>
            </p>    
        </div>
        <!--	end		-->
    </div>
<!-- 		end of header		-->
   	<div class="content">
    <?php
		if($_POST["vupload"])
		{
			$thumb = time().'_'.date('Y-m-d').'.jpg';
			$video = $_FILES['vfile']['name'];
			//print "hi";
			if( (substr($video,-3) == 'flv' || substr($video,-3) == 'mp4' ) && $_FILES["vfile"]["size"] < 15728640 )
			{
					if( !file_exists("../videos/".$_FILES["vfile"]["name"]) ) { // Check file is exists?
						if( !@copy($_FILES["vfile"]["tmp_name"],"../videos/".$_FILES["vfile"]["name"]) ) {
							Notify::Error( "Failed to open File stream! File not uploaded, please try again." );
						}
						else {
							Notify::Success( "File uploaded successfully!" );
							
							UploadiFy::ImageUpload('pfile','../videos',307200,$thumb);
							Thumbnail::VideoThumb("../videos",'../videos/'.$thumb,'image/jpeg',$thumb );
							
							$hDB->Query("INSERT INTO tbl_video_gallery(video_id,video_name,video_thumbnail) VALUES('','$video','$thumb')");
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
		elseif($_POST['file'])
		{
			foreach($_POST["file"] as $id)
			{
				$hDB->Query("SELECT * FROM tbl_video_gallery WHERE video_id='$id'");
				$obj = $hDB->Fetch();
				
				@unlink('../videos/'.$obj->video_name);
				@unlink('../videos/'.$obj->video_thumbnail);
				
				$hDB->Query( "DELETE FROM tbl_video_gallery WHERE video_id = '$id'" );
			}
			
			Notify::Success( count($_POST["file"])." Video(s) successfully deleted!" );
		}
	?>
    <?php
		if( $_GET["option"] == 'upload' )
		{
	?>
    	<!-- 	*********************		upload photo module		******************* -->	
        	<div class="module-45" style="float:left">
                <div class="module-header"><span>Upload Video Files</span></div>
                <div class="module-body">
                    <form action="videos.php?option=upload" method="post" id="DataForm" enctype="multipart/form-data">
                    	<p><b>Supported File Format: </b>MP4 & FLV</p>
                        <p><b>Max Upload Siae:</b> 15 Mb</p>
                        <p>&nbsp;</p>
                        
                        <p>Video File</p>
                    	<div class="file-wrapper" >
            				<input type="file" name="vfile" class="upload" size="1" /><input type="submit" id="upload" class="submit green" value="Browse File" /> 
                		</div>
                        &nbsp;<input type="text" class="input medium" name="vupload" fv="required" /><span></span>
                        
                        <p>Thumbnail</p>
                        <div class="file-wrapper" >
            				<input type="file" name="pfile" class="upload" size="1" /><input type="submit" id="upload" class="submit green" value="Browse File" /> 
                		</div>
                        &nbsp;<input type="text" class="input medium" name="pupload" fv="required" /><span></span>
                        
                   	<!--APC hidden field-->
    					<input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $up_id; ?>"/>
					<!---->

                    <!--Include the iframe-->
                        <br />
                        <iframe id="upload_frame" name="upload_frame" frameborder="1" border="1" src="" scrolling="no" scrollbar="no" > </iframe>
                        <br />
                    <!---->
                     	<p><input type="button" id="btnSubmit" class="submit green" value="Upload (s)" /></p><br />
                        <p><<<a href="videos.php"> Back to Gallery</a></a>
                        
                    </form>
                </div>
            </div>
        <!--			end of 		upload module					-->
   	<?php
		}
		else
		{
	?>
    <!--			Video content modules			-->
    	<div class="module-75" style="float:left">
           	<div class="module-header"><span>Videos</span></div>
            <div class="module-body">
            <form action="videos.php" method="post" id="DataForm">   
    <?php
			$hDB->Query("SELECT * FROM tbl_video_gallery");
			while($obj = $hDB->Fetch())
			{
	?>
    			<div class="wrapper">
                	<center>
                    	<img id="thumb" src="../videos/<?php print $obj->video_thumbnail ?>" />
                       	<p><input type="checkbox" name="file[]" id="ckbox" value="<?php print $obj->video_id ?>" /></p>
                            
      				</center>
               	</div>
   	<?php
			}
		}
	?>
    		</form>
            </div>
       	</div> 
    <!--			**			**					-->
    		<!--			project handover module			-->
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
    		
    </div>
<!--		----		----		-->    
    
   	<div class="footer">
   		<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
   </div>

</body>
</html>
      