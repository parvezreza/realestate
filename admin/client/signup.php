<?php 
	require_once( '../include/DBConnect.php' );
	include('../include/Logger.php');
	$hDB = new DBConnect();
	Logger::Check();;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Client Signup | Noboudoy Housing Limited</title>
<link rel="stylesheet" href="../styles/styles.css" type="text/css" />
<link rel="stylesheet" href="../ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/jquery.formcheck_OLD.js"></script>
<script type="text/javascript">
	jQuery(document).ready( function() {
		
		var selcount = 0;
		
		/****			Details area				***/
		jQuery(":text").add('textarea').not(this).attr('disabled','disabled');
		
		jQuery("input#btnSubmit").click( function() {
			if( $(this).val() == 'Edit ?' )
			{
				$(":text").add('textarea').removeAttr('disabled','disabled');
				$(this).val('Submit');
			}
			else
			{
				$("#DataForm").formCheck({ errorClass : 'input-notation-error', submit : true });
			}
		});
		
		/***				***						***/

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
			jQuery ('#DataForm').attr('action','signup.php?option=com_delete').submit();
		});
		
		jQuery ('#btnDelCancel').click( function() {
			jQuery ('#delete').dialog( 'close' );
		});
		/***			***						***/
		
		/****			Delete action			** **/
		jQuery ("a#mnu-aprove").click( function(e) {
			e.preventDefault();
			
			if( selcount > 0 )
				jQuery ("#aprove").dialog({
						title		: 'Confirmation',
						resizable	: false,
						closeOnEscape : false,
						open		: function() { $('#aprove #cnftext span').html( selcount ); },
						close		: function() { $('#aprove #cnftext span').html(''); }
				});
		});
		
		jQuery ('#btnAprove').click( function() {
			jQuery ('#DataForm').attr('action','signup.php?option=com_approve').submit();
		});
		
		jQuery ('#btnApCancel').click( function() {
			jQuery ('#aprove').dialog( 'close' );
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
			jQuery("input#ckbox").click(function() {
				var $this = $(this);
				if ($this.is(':checked')) {
					$(this).attr("checked","checked");
					selcount++;
				} else {
					$(this).removeAttr("checked");
					selcount--;
				}
			});
			
			jQuery("input[value='Cancel']").click( function() {
				window.history.back();
			});
		/**			***				***				**/
	});
</script>
</head>
<body>
	<div class="header">
    <!-- 	Log out					-->
    	<div class="top-bar"><h3>Waiting Signup</h3><a href="../index.php?option=logout"><span>Logout</span><img src="../styles/icon-logout.gif"></a></div>
    	<!-- 																		-->
    
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
    	<!--	end of main navigation		-->
	
    <!--	Sub Navigation				-->            
        <div class="sub-tab">
        	<p>
            	<a id="mnu-aprove" href=""><img src="../styles/client_approval.png" height="25"><span>Approval</span></a>
                <a id="mnu-delete" href=""><img src="../styles/tools-delete.png" height="25"><span>Delete</span></a>
            </p>    
        </div>
        <!--	end		-->
    </div>
    
    <div class="content">
    
	<?php
		if( $_POST )
		{
			if( $_GET["option"] === "com_approve" )
			{
				foreach( $_POST["ckbox"] as $id )
				{
					$hDB->Query( "SELECT * FROM tbl_signup_client WHERE signup_client_id = '$id'" );
					$obj = $hDB->Fetch();
					
					/****	Password Generator		***/
					$pass = substr(md5(microtime()), 0, 5);
					/***********************************/					
					
					$hDB->Query( "INSERT INTO tbl_client_profile( client_id, client_name, client_father_name, client_mother_name, client_profession, client_add_permanent, client_add_present, client_tel_office, client_res, client_mobile, client_email, client_date_birth, client_nationality, client_national_id, client_nominee_name, client_nominee_relation, client_nominee_contact, client_date,client_password ) VALUES( '', '$obj->signup_client_name', '$obj->signup_client_fname', '$obj->signup_client_mname', '$obj->signup_client_profession', '$obj->signup_client_add_permanent', '$obj->signup_client_add_present', '$obj->signup_client_tel_office', '$obj->signup_client_res', '$obj->signup_client_mobile', '$obj->signup_client_email', '$obj->signup_client_date_birth', '$obj->signup_client_nationality', '$obj->signup_client_national_id', '$obj->signup_client_nominee_name', '$obj->signup_client_nominee_relation', '$obj->signup_client_nominee_contact', '$obj->signup_client_date','$pass' )" );
					
					/****		Mailing Password		***/
					$to = $obj->signup_client_email;
					$subject = "Confirmation for Registration";
					$message = "Hello, ".$obj->signup_client_name.".\nYou have registered yourself successfully to Noboudoy Housing Ltd Website.\n\nYour Password is: ".$pass."\n\nThank you,\nNoboudoy website Authority";
					$header = "From: Noboudoy Housing Ltd";
					@mail($to,$subject,$message,$header);
					/*****		*****		****		***/
					
					$hDB->Query( "DELETE FROM tbl_signup_client WHERE signup_client_id = '$id'" );
				}
				Notify::Success( count($_POST["ckbox"])." item(s) approval successfully completed!" );
			}
			elseif( $_GET["option"] === 'com_delete' )
			{
				foreach( $_POST["ckbox"] as $id )
				{
					
					$hDB->Query( "DELETE FROM tbl_signup_client WHERE signup_client_id = '$id'" );
				}
				Notify::Success( count($_POST["ckbox"])." item(s) successfully deleted!" );
			}
			else
			{
				if( $_POST["client_id"] )
				{
					$id = $_POST["client_id"];
					
					$name = trim( $_POST["name"] );
					$f_name = trim( $_POST["f_name"] );
					$m_name = trim( $_POST["m_name"] );
					$profession = trim( $_POST["profession"] );
					$permanent = trim( $_POST["permanent"] );
					$present = trim( $_POST["present"] );
					
					$telephone = trim( $_POST["telephone"] );
					$res = trim( $_POST["res"] );
					$mobile = trim( $_POST["mobile"] );
					$email = trim( $_POST["email"] );
					
					$birth = trim( $_POST["birth"] );
					$nationality = trim( $_POST["nationality"] );
					$national_id = trim( $_POST["national_id"] );
					
					$nomi_name = trim( $_POST["nomi_name"] );
					$nomi_relation = trim( $_POST["relation"] );
					$nomi_address = trim( $_POST["nomi_address"] );
					
					$hDB->Query( "UPDATE tbl_signup_client SET signup_client_name = '$name', signup_client_fname = '$f_name', signup_client_mname = '$m_name', signup_client_add_present = '$present', signup_client_add_permanent = '$permanent', signup_client_tel_office = '$telephone', signup_client_res = '$res', signup_client_mobile = '$mobile', signup_client_email = '$email', signup_client_date_birth = '$birth', signup_client_nationality = '$nationality', signup_client_national_id = '$national_id', signup_client_nominee_name = '$nomi_name', signup_client_nominee_relation = '$nomi_relation', signup_client_nominee_contact = '$nomi_address' WHERE signup_client_id = '$id' " );
					
					Notify::Success( "Signup Client information has updated successfully!" );
				}
			}
		}
	?>
    

    <!--		***************			Details Module				******************			-->
    <?php
		if( $_GET["option"] === 'edit' )
		{
			$id = $_GET["signupid"];
			$hDB->Query( "SELECT * FROM tbl_signup_client WHERE signup_client_id = '$id'" );
			$obj = $hDB->Fetch();
	?>
       	<form action="<?php print $_SERVER[PHP_SELF] ?>" method="post" id="DataForm">
        <div class="module-50" style="float:left">
        	<div class="module-header"><span>Signup - Client Information</span></div>
            <div class="module-body">
            
            	<h3>Client Information</h3>
                <input type="hidden" name="client_id" value="<?php print $obj->signup_client_id?>" />
                <p>Name *</p><input name="name" type="text" class="input short-medium " value="<?php print $obj->signup_client_name ?>" fv="required 5"/><span></span>
                <p>S/O, W/O, D/O *</p><input name="f_name" type="text" class="input short-medium " value="<?php print $obj->signup_client_fname ?>" fv="required 5" /><span></span>
                <p>Mother's Name *</p><input name="m_name" type="text" class="input short-medium " value="<?php print $obj->signup_client_mname ?>" fv="required 5" /><span></span>
                <p>Profession</p><input name="profession" type="text" class="input short-medium " value="<?php print $obj->signup_client_profession ?>" fv="required 5" /><span></span>
                <p>Permanent Address *</p><textarea name="permanent" class="input short-medium" fv="required 5"><?php print $obj->signup_client_add_permanent ?></textarea><span></span>
                <p>Mailing Address *</p><textarea name="present" class="input short-medium" fv="required 5"><?php print $obj->signup_client_add_present ?></textarea><span></span>
                
                <p>Date of Birth (dd-mm-yyyy)</p><input  name="birth" type="text"  class="input short-medium" value="<?php print $obj->signup_client_date_birth ?>"/><span></span>
                <p>Nationality *</p><input  name="nationality" type="text"  class="input short-medium" value="<?php print $obj->signup_client_nationality ?>" fv="required 5" /><span></span>
                <p>National ID No/ Passport No</p><input  name="national_id" type="text"  class="input short-medium" value="<?php print $obj->signup_client_national_id ?>" /><span></span>
           	</div>
       	</div>
        
        <div class="module-45" style="float:right">
        	<div class="module-header"><span>Signup - Client Contact</span></div>
            <div class="module-body">
                <h3>Contact Details</h3>
                <p>Tel: Office</p><input  name="telephone" type="text"  class="input short-medium" value="<?php print $obj->signup_client_tel_office ?>" /><span></span>
                <p>Telephone: Residence</p><input  name="res" type="text"  class="input short-medium" value="<?php print $obj->signup_client_res ?>" /><span></span>
                
                <p>Mobile *</p><input  name="mobile" type="text"  class="input short-medium" value="<?php print $obj->signup_client_mobile ?>" fv="required 11" /><span></span>
                <p>E-mail</p><input  name="email" type="text"  class="input short-medium" value="<?php print $obj->signup_client_email ?>" fv="email 8" /><span></span>
            </div>
        </div>
        
        <div class="module-45" style="float:right">
        	<div class="module-header"><span>Signup - Client Nominee</span></div>
            <div class="module-body">
                <h3>Details of Nominee</h3>
                <p>Nominee Name *</p><input  name="nomi_name" type="text" class="input short-medium" value="<?php print $obj->signup_client_nominee_name ?>"  fv="required 5" /><span></span>
                <p>Relation with Client *</p><input  name="relation" type="text" class="input short-medium" value="<?php print $obj->signup_client_nominee_relation ?>" fv="required 3" /><span></span>
                <p>Contact Address</p><textarea  name="nomi_address" class="input short-medium" fv="required 5" /><?php print $obj->signup_client_nominee_contact ?></textarea><span></span>
               
                <p><input id="btnSubmit" type="button" value="Edit ?" class="submit green" />
                <input type="button" value="Cancel" class="submit gray" /> </p> 
            </div>
        </div>	
       	</form>
            	
    <?php
		}
		else
		{
	?>
    
    <!--					Signup module table					-->	
    	<div id="mod-main" class="module-95" style="float:left">
                <div class="module-header"><span>Waiting Signup List</span></div>
                <div class="module-body-table">
                <form id="DataForm" action="" method="post">
                    <table border="0">
                        <thead>
                            <tr>
                            	<th width="5%" style="text-align:center"><input type="checkbox" id="ckall" /></th>
                                <th width="5%" style="text-align:center">#</th>
                                <th width="20%">Client Name</th>
                                <th width="20%">Father's Name</th>
                                <th width="25%">Address</th>
                                <th width="15%">Mobile No</th>
                                <th width="10%">Apply Date</th>
                            </tr>
                        </thead> 
                        
                        <tbody>
                    	<?php
						
                            $hDB->Query( "SELECT * FROM tbl_signup_client ORDER BY signup_client_id DESC" );
                           
                            while( $obj = $hDB->Fetch() )
                            {
                                $sn++ ;
								print "								
								<tr>
									<td align='center'><input type='checkbox' name='ckbox[]' id='ckbox' value='$obj->signup_client_id' /></td>
									<td align='center'>".$sn."</td>
									<td><a href='signup.php?option=edit&signupid=$obj->signup_client_id'>".$obj->signup_client_name."</a></td>
									<td>".$obj->signup_client_fname."</td>
									<td>".$obj->signup_client_add_present."</td>
									<td>".$obj->signup_client_mobile."</td>
									<td>".date("d M, Y",strtotime($obj->signup_client_date))."</td>
								</tr>";
							}
						?>
                        </tbody>
                    </table>   
                </form>            
                </div>
            </div>
		<!--		******************			end of module table			********************	-->
	<?php
		}
	?>
        <!--		****		End of Details module		***				-->
        
        
        <!--			delete module			-->
            <div id="delete" style="display:none; margin:5px 0px">
                <center>
                <p id="cnftext"><span></span> item(s) into the queure! Do you want delete?</p>
                <br />
                <br />
                <p>
                    <input type="button" id="btnDelete" value="&nbsp; Yes &nbsp;" class="submit green" /> 
                    <input type="button" id="btnDelCancel" value="&nbsp; No &nbsp;" class="submit gray" />
                </p>
                </center>               
        	</div>
       	<!--			***				***				-->
        
        <!--			approval module			-->
            <div id="aprove" style="display:none; margin:5px 0px">
                <center>
                <p id="cnftext"><span></span> item(s) into the queure! Do you want approve?</p>
                <br />
                <br />
                <p>
                    <input type="button" id="btnAprove" value="&nbsp; Yes &nbsp;" class="submit green" /> 
                    <input type="button" id="btnApCancel" value="&nbsp; No &nbsp;" class="submit gray" />
                </p>
                </center>               
        	</div>
       	<!--			***				***				-->
        
    </div>
    <!--	end of content		-->
   
    <!--	footer					-->
    <div class="footer">
    	<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
    </div>
</body>
</html>

