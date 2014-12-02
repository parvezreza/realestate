<?php 
	require_once( '../include/DBConnect.php');
	require_once( '../include/UploadiFy.php' );
	require_once( '../include/Folder.php' );
	require_once( '../include/Thumb.php' );
	include('../include/Logger.php');
	$hDB = new DBConnect();
	Logger::Check();
	
	$basedir = '../../project/apartment/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Apartment Project | Noboudoy Housing Limited</title>
<link rel="stylesheet" href="../styles/styles.css" type="text/css" />
<link rel="stylesheet" href="../styles/media.css" type="text/css" />
<link rel="stylesheet" href="../ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/jquery.formcheck_OLD.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript">

	$(function() {
		$( "#accordion" ).accordion({
						autoHeight	: false
		});
		
		//$("#txtdate").datepicker({ dateFormat : " MM d, yy" });
	});
	
	$(document).ready(function(){
		var selcount = 0;
		
		/******			Upload Button				*********/
		jQuery ("div.file-wrapper .upload").change( function() {
			$(this).parent().next("input").val( $(this).val() );
			$('#thumbnail').next('span').removeClass();
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
			
		$("a#ico-delete").click(function(e) {
			e.preventDefault();
			// Triger for checkbox select
			var id = $(this).attr("href");
			if( $("input[value='"+id+"']").is(':checked') ) {
				$("a#mnu-delete").click(); // Triger
			}
			else {
				$("input[value='"+id+"']").attr("checked","checked");
				selcount++;
				$("a#mnu-delete").click(); // Triger
			}
		});
	/*			**			**				**			*/
			
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
			
			
			jQuery ("input#btnSubmit").click( function() {
				jQuery('#DataForm').formCheck({ errorClass : 'input-notation-error', submit : true });
			});
			
			$("input[value='Cancel']").click( function() {
				window.history.back();
			});
			
			/*		***			***			***			***			*/
		
		CKEDITOR.replace( 'editor1', 			// CKEditor integration
		{
					toolbar :
					[
					 	{ name: 'document', items : [ 'Source','-','NewPage','DocProps','Preview','Print','-','Templates' ] },
						{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
						{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
						{ name: 'tools', items : [ 'Maximize', 'ShowBlocks' ] },
						/*{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 
							'HiddenField' ] },*/
						'/',
						{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
						{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
						{ name: 'colors', items : [ 'TextColor','BGColor' ] },
						'/',
						
						{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
						'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
						{ name: 'links', items : [ 'Link','Unlink' ] },
						{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','Iframe' ] }
						
					]
		}); 
		CKEDITOR.replace( 'editor2', 			// CKEditor integration
		{
					toolbar :
					[
					 	{ name: 'document', items : [ 'Source','-','NewPage','DocProps','Preview','Print','-','Templates' ] },
						{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
						{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
						{ name: 'tools', items : [ 'Maximize', 'ShowBlocks' ] },
						/*{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 
							'HiddenField' ] },*/
						'/',
						{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
						{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
						{ name: 'colors', items : [ 'TextColor','BGColor' ] },
						'/',
						
						{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
						'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
						{ name: 'links', items : [ 'Link','Unlink' ] },
						{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','Iframe' ] }
						
					]
		}); 
					
	});
			
</script>

</head>
<body>
	<div class="header">
    <!-- 	Log out					-->
    	<div class="top-bar"><h3>Apartment Project - Upcoming</h3><a href="../index.php?option=logout"><span>Logout</span><img src="../styles/icon-logout.gif"></a></div>
    	<!-- 																		-->
    
    <!--	Main Navigation				-->	    
        <div class="tab">
            	<ul id="nav">
                	<li><a href="../dashboard.php">Dashboard</a></li>
                    <li><a href="../land/">Land Project</a></li>
                    <li id="active"><a href="../apartment/">Apartment Project</a></li>
                    <li><a href="../client/">Client Diary</a></li>
                    <li><a href="../profile.php">User Manager</a></li>
                </ul>
        </div>
    	<!--	end of main navigation		-->
	
    <!--	Sub Navigation				-->            
        <div class="sub-tab">
        	<p>
            	<a href="upcoming.php"><img src="../styles/apartment-ongoing.png" height="25"><span>All Upcoming</span></a>
            	<a href="upcoming.php?option=add"><img src="../styles/article-addnew.png" height="25"><span>Add New</span></a>
                <a id="mnu-delete" href=""><img src="../styles/tools-delete.png" height="25"><span>Delete</span></a>
            </p>    
        </div>
        <!--	end		-->
    </div>
    
    <div class="content">
    <?php
		if($_POST)
		{
			if($_POST['editid'])
			{
				$id = $_POST["editid"];
				$project = trim( $_POST["name"] );
				
				$hDB->Query( "SELECT apart_pro_up_name FROM tbl_apartment_project_upcoming WHERE apart_pro_up_id = '$id'" );
				$obj = $hDB->Fetch();
				 
				if( !@rename( $basedir.$obj->apart_pro_up_name, $basedir.$project ) )
				{
					print "<script>location.href = '".$_SERVER['PHP_SELF']."?notify=error'</script>";
				}
				else
				{
					if( !empty($_FILES['image']['name'])) {
						Uploadify::UploadWithThumb( 'image', $basedir.$project, '307200', 'thumbnail.jpg' );
					}
					$hDB->Query( "UPDATE tbl_apartment_project_upcoming SET apart_pro_up_name = '$project' WHERE apart_pro_up_id = '$id'" );
					Notify::Success( "Project successfully updated!" );
				}
			}
			elseif($_POST['project_detail'])
			{
				$project = $_POST["project_detail"];
				$feature = $_POST["feature"];
				$terms = $_POST["terms"];
				
				if( !empty($_FILES['upapplication']['name']) ) {
					Uploadify::PdfUpload( 'upapplication', $basedir.$project, '10485760', 'application.pdf' );
				}
				if( !empty($_FILES['uppricelist']['name']) ) {
					Uploadify::ImageUpload( 'uppricelist', $basedir.$project, '307200', 'pricelist.jpg' );
				}
				if( !empty($_FILES['uplocation']['name']) ) {
					Uploadify::ImageUpload( 'uplocation', $basedir.$project, '307200', 'location.jpg' );
				}
				
				$hDB->Query( "UPDATE tbl_apartment_project_upcoming SET apart_pro_up_feature = '$feature', apart_pro_up_terms = '$terms' WHERE apart_pro_up_name = '$project' " );
				Notify::Success( $project." details successfully updated!" );
			}
			elseif($_POST['ckbox'])
			{
				foreach( $_POST["ckbox"] as $id )
				{
					$hDB->Query( "SELECT apart_pro_up_name FROM tbl_apartment_project_upcoming WHERE apart_pro_up_id = '$id'" );
					$obj = $hDB->Fetch();
						
					if( !Folder::Remove( $basedir.$obj->apart_pro_up_name ) ) {
						Notify::Error( 'Permission denaied!<b>'.$obj->apart_pro_up_name.'</b> project couldn\'t deleted.' );
					}
					else {
						$hDB->Query( "DELETE FROM tbl_apartment_project_upcoming WHERE apart_pro_up_id = '$id'" );
						$nd++;
					}
				}
				Notify::Success( $nd." project(s) has deleted from project list!" );
			}
			else
			{
				$project = trim( $_POST["name"] );
				
				$mkdir = @mkdir( $basedir.$project, 0777);
										
				if( !$mkdir )
				{
					print "<script>location.href = '".$_SERVER['PHP_SELF']."?option=add&notify=error'</script>";
				}
				else
				{
					@touch( $basedir.$project.'/index.html' );
					//Notify::Error( "Directory is created successfully!" );
					UploadiFy::UploadWithThumb( 'image', $basedir.$project, '307200', 'thumbnail.jpg' );
				
					$hDB->Query( "INSERT INTO tbl_apartment_project_upcoming( apart_pro_up_id, apart_pro_up_name, apart_pro_up_feature, apart_pro_up_terms ) VALUES ( '', '$project', '', '' )" );
					
					Notify::Success( 'New Project created successfully!' );	
				}
			}
		}
	?>
<!--   *****************		Article Add Form Module			***************** -->
	 <?php
		if($_GET["option"]==="add")
		{
			if( $_GET["notify"] ) {
				Notify::Error( "Permission denaied! Probably project name alreay exist. Please try another." );
			}
	?>  
            <div class="module-60" style="float:left">
        	<div class="module-header"><span>Create New Apartment Project</span></div>
            <div class="module-body">
            	<form action="upcoming.php?option=details" method="post" enctype="multipart/form-data" id="DataForm">
                    
                    <p>Project Name</p>
                    	<input class="input medium" name="name" type="text" fv="char 5" ><span></span>
                        <p><i><b>Caution:</b> Use only Alphabet & Numeric character, don't use any special character!</i></p>
                        
                    <br />
                    
                    <p>Project Image</p>
                    <div class="file-wrapper">
                    	<input type="file" name="image" class="upload" size="1" /><input type="button" id="upload" class="submit green" value="Browse File" />
                    </div>
                    &nbsp; <input type="text" class="input short-medium" id="thumbnail" fv="required" /><span></span>
                    <p><i><b>Hints:</b> Select an</i> <b>jpg / png / gif</b> <i>format image and max upload size is <b>300 KB</b>. This image will be displayed as project thumbnail.</i></p>
                    <br />
                    <p><input type="button" id="btnSubmit" value="Create" class="submit green" /> 
                    	<input type="button" id="btnCancel" value="Cancel" class="submit gray" /></p>
                </form>
            </div>
        </div>
           
	<?php
		}
		elseif( $_GET["option"] == "edit" )
		{
			$id = $_GET["projectid"];
			$hDB->Query( "SELECT * FROM tbl_apartment_project_upcoming WHERE apart_pro_up_id = '$id'" );
			
			$obj = $hDB->Fetch();
	?>
    	<!-- 		Land Project Add Module			-->
    	
        <div class="module-60" style="float:left">
        	<div class="module-header"><span>Edit existing Apartment Project</span></div>
            <div class="module-body">
            	<form action="upcoming.php?option=details" method="post" enctype="multipart/form-data" id="DataForm">
                	<h3>Project Editing</h3>
                    <!--</span>-->
                    <p>Project Name</p>
                    	<input type="hidden" name="editid" value="<?php print $obj->apart_pro_up_id ?>" />
                    	<input class="input medium" name="name" type="text" value="<?php print $obj->apart_pro_up_name ?>" fv="char 5" ><span></span>
                        <p><i><b>Caution:</b> Use only Alphabet & Numeric character, don't use any special character!</i></p>
                        
                    <br />    
                   
                    <p>Project Image</p>
                    <div class="file-wrapper">
                    	<input type="file" name="image" class="upload" size="1" /><input type="button" id="upload" class="submit green" value="Browse File" />
                    </div>
                    &nbsp; <input type="text" class="input short-medium" name="thumbnail" value="<?php if(file_exists($basedir.$obj->apart_pro_up_name.'/thumbnail.jpg')) print 'thumbnail.jpg' ?>" />
                    <p><i><b>Hints:</b> Select an</i> <b>jpg / png / gif</b> <i>format image and max upload size is <b>300 KB</b>. Don't want to change previous thumbnail, leave this blank!</i></p>
                    <br />
                    <p><input type="button" id="btnSubmit" value="Update" class="submit green" /> 
                    	<input type="button" id="btnCancel" value="Cancel" class="submit gray" /></p>
                </form>
            </div>
        </div>
    <!--		End of add Module				-->
    
     <?php
		}
		elseif( $_GET["option"] == "details" )
		{
			if( $_GET["projectid"] || $_POST["editid"] ) {
				
				$id = ( $_GET["projectid"] )? $_GET["projectid"] : $_POST["editid"];
					
				$hDB->Query( "SELECT * FROM tbl_apartment_project_upcoming WHERE apart_pro_up_id = '$id'" );
				$obj = $hDB->Fetch();
				$project = $obj->apart_pro_up_name;
			}
			else {
				$project = trim( $_POST["name"] );
			}
	?>
    <!--		Project Details module			-->
   		<div class="module-95" style="float:left">
        	<div class="module-header"><span>Project Details</span></div>
            <div class="module-body">
            <form action="upcoming.php" method="post" enctype="multipart/form-data" >
            
            	<h3><?php print $project ?></h3>
                
            		<input type="hidden" name="project_detail" value="<?php print $project ?>" />
            	<div id="accordion">
                    <h3><a href="#">Features</a></h3>
                    <div>
                        <textarea class="input long" rows="8" id="editor1" name="feature"><?php print $obj->apart_pro_up_feature ?></textarea> 
                    </div>
                    <h3><a href="#">Terms & Condition</a></h3>
                    <div>
                       <textarea class="input long" rows="8" id="editor2" name="terms"><?php print $obj->apart_pro_up_terms ?></textarea>
                    </div>
                    
                    <h3><a href="#">Application Form</a></h3>
                    <div>
                   
                        <div class="file-wrapper">
                        	<input type="file" class="upload" size="1" name="upapplication" />
                            <input type="button" id="btnUpload" class="submit green" value="Browse File" />
                           
                        </div>
                        &nbsp;<input type="text" class="input short" name="application" value="<?php if(file_exists($basedir.$obj->apart_pro_up_name.'/application.pdf')) print 'application.pdf' ?>" />
                        <p><i><b>Hint:</b> Support only <b>PDF</b> document format and max upload size is <b>2 MB</b> . 
                        	Already have one and don't want to change previous layout picture, leave this blank!</i></p>
                        
                    </div>
					<h3><a href="#">Price List</a></h3>
                    <div>
                        
                        <div class="file-wrapper">
                        	<input type="file" class="upload" size="1" name="uppricelist" />
                            <input type="button" id="btnUpload" class="submit green" value="Browse File" />
                           
                        </div>
                        &nbsp;<input type="text" class="input short" name="pricelist" value="<?php if(file_exists($basedir.$obj->apart_pro_up_name.'/pricelist.jpg')) print 'pricelist.jpg' ?>" />
                        <p><i><b>Hint:</b> Support only <b>jpg, png</b> & <b>gif</b> image format and max upload size is <b>300 KB</b>. 
                        	Already have one and don't want to change previous price list picture, leave this blank!</i></p>
                            
                    </div>
                    <h3><a href="#">Location</a></h3>
                    <div>
                        
                        <div class="file-wrapper">
                        	<input type="file" class="upload" size="1" name="uplocation" />
                            <input type="button" id="btnUpload" class="submit green" value="Browse File" />
                           
                        </div>
                        &nbsp;<input type="text" class="input short" name="location" value="<?php if(file_exists($basedir.$obj->apart_pro_up_name.'/pricelist.jpg')) print 'location.jpg' ?>" />
                        <p><i><b>Hint:</b> Support only <b>jpg, png</b> & <b>gif</b> image format and max upload size is <b>300 KB</b>. 
                        	Already have one and don't want to change previous price list picture, leave this blank!</i></p>
                            
                    </div>
              	</div>
                
                <br />
                <p><input type="submit" value="Submit" class="submit green" /> <input type="button" value="Cancel" id="btnCancel" class="submit gray" /></p>
            </form>
            </div>   
        </div>
        <!--		end of details module			-->
    
	<?php
		}
		
 /*<!--	********************* 		noticeegory Table Module		******************* -->*/
		
		else
		{
			if( $_GET["notify"] ) {
				Notify::Error( "Permission denaied! Probably project name alreay exist. Please try another." );
			}
	?>
             <!--			Land Ongoing project list				--->
        <div class="module-65" style="float:left">
                <div class="module-header"><span>Apartment Projects - Upcoming</span></div>
                <div class="module-body-table">
                <form id="DataForm" action="upcoming.php" method="post">
                    <table border="0">
                        <thead>
                            <tr>
                            	<th width="10%" style="text-align:center"><input type="checkbox" id="ckall" /></th>
                                <th width="10%" style="text-align:center">#</th>
                                <th width="40%">Project Name</th>
                                <th width="10%" style="text-align:center">ID</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead> 
                        
                        <tbody>
                        <?php
						
                            $hDB->Query( "SELECT * FROM tbl_apartment_project_upcoming ORDER BY apart_pro_up_id ASC" );
                           
                            while( $obj = $hDB->Fetch() )
                            {
                                $sn++ ;
								print "								
								<tr>
									<td align='center'><input type='checkbox' name='ckbox[]' id='ckbox' value='$obj->apart_pro_up_id' /></td>
									<td align='center'>".$sn."</td>
									<td>".$obj->apart_pro_up_name." 
										<a href='upcoming.php?option=edit&projectid=$obj->apart_pro_up_id' title='Edit it!'>Edit</a>
									</td>
									<td align='center'>".$obj->apart_pro_up_id."</td>
									<td style='border:none'>
										<a href='upcoming.php?option=details&projectid=$obj->apart_pro_up_id'>Edit Details</a>
									</td>
								</tr>";
							}
						?>
                        </tbody>
                    </table>   
                </form>            
                </div>
            </div>
            <!--		end of list			-->
	<?php
		}
	?>
<!--		******************			end of module table			********************	-->
		
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
    
    <!-- 	footer							-->
    <div class="footer">
    	<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
    </div>
</body>
</html>