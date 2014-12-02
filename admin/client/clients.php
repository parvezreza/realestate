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
<link rel="stylesheet" href="../styles/stylesheet.css" type="text/css" />
<link rel="stylesheet" href="../ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css"  />
<script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/jquery.formcheck_OLD.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var selcount = 0;
		
	/****			Edit action				*****/
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
			
			jQuery("input[value='Cancel']").click( function() {
				window.history.back();
			});
		/*			**			**				**			*/
		
	});
</script>
</head>
<body>
	<div class="header">
    <!--		logout				-->
    	<div class="top-bar"><h3>Client List</h3><a href="../index.php?option=logout"><span>Logout</span><img src="../styles/icon-logout.gif"></a></div>
        <!--	end of log out		-->
        
    <!-- 	main Navigation			-->    
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
        
    	<!--	Sub Navigation				-->   
        <div class="sub-tab">
        	<p>
            	<a href="clients.php?option=showall"><img src="../styles/tools-client-list.png" height="25"><span>Client List</span></a> 
                <a href="clients.php?option=add"><img src="../styles/tools-client-add.png" height="25"><span>Add New</span></a>
                <a href="" id="mnu-delete"><img src="../styles/tools-delete.png" height="25"><span>Delete</span></a>
            </p>    
        </div>
    </div>
    <!-- 	End of Sub navigation			-->
    
    <div class="content">
<!-- ************ PHP Submition Code  ****************************-->
    <?php
		if($_POST)
		{
			if( $_GET["option"] === "com_delete" )
			{
				if( count($_POST["ckbox"]) > 0 )
				{
					foreach( $_POST["ckbox"] as $id )
					{
						$hDB->Query( "DELETE FROM tbl_client_profile WHERE client_id = '$id'" );
					}
					Notify::Success( count($_POST["ckbox"])." Client information has deleted from list!" );
				}
			}
			else
			{		
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
				
				/*$pro_name = trim( $_POST["pro_name"] );
				$plot_size = trim( $_POST["plot_size"] );*/
					
				if( $_POST["hidden_client_id"] )
				{
					$id = $_POST["hidden_client_id"];
					
					$hDB->Query( "UPDATE tbl_client_profile SET client_name = '$name', client_father_name = '$f_name', client_mother_name = '$m_name', client_add_present = '$present', client_add_permanent = '$permanent', client_tel_office = '$telephone', client_tel_res = '$res', client_mobile = '$mobile', client_email = '$email', client_date_birth = '$birth', client_nationality = '$nationality', client_national_id = '$national_id', client_nominee_name = '$nomi_name', client_nominee_relation = '$nomi_relation', client_nominee_contact = '$nomi_address' WHERE client_id = '$id' " );
					
					Notify::Success( "Client information updated successfully!");
				}
				
				else
				{
					/****	Password Generator		***/
					$pass = substr(md5(microtime()), 0, 5);
					/***********************************/	
					
					$hDB->Query( "INSERT INTO tbl_client_profile( client_id, client_name, client_father_name, client_mother_name, client_profession, client_add_permanent, client_add_present, client_tel_office, client_tel_res,  client_mobile, client_email, client_date_birth, client_nationality, client_national_id, client_nominee_name, client_nominee_relation, client_nominee_contact, client_date, client_password) VALUES ( '', '$name', '$f_name', '$m_name', '$profession', '$permanent', '$present', '$telephone','$res', '$mobile', '$email', '$birth', '$nationality', '$national_id', '$nomi_name', '$nomi_relation', '$nomi_address','".date( 'Y-m-d' )."', '$pass' )" );
					
					/****		Mailing Password		***/
					$to = $email;
					$subject = "Confirmation for Registration";
					$message = "Hello, ".$name.".\nYou have registered yourself successfully to Noboudoy Housing Ltd Website.\n\nYour Password is: ".$pass."\n\nThank you,\nNoboudoy website Authority";
					$header = "From: Noboudoy Housing Ltd";
					@mail($to,$subject,$message,$header);
					/*****		*****		****		***/
					
					Notify::Success( "Client information added successfully!" );
				}
			}
		}
	?>
<!-- ************ PHP Submition Code End ****************************-->
<!--		*********** 	New Customer Add	*************************** -->
	<?php
		if( $_GET["option"] === add )
		{
		
	?>
	<form action="<?php print $_SERVER[PHP_SELF];?>" method="post" id="DataForm">
		<div class="module-50" style="float:left">
        	<div class="module-header"><span>New Client - Information</span></div>
            <div class="module-body">
           
            	<h3>Client Information</h3>
                <p>Name *</p><input name="name" type="text" class="input short-medium" fv="required" /><span></span>
                <p>S/O, W/O, D/O *</p><input name="f_name" type="text" class="input short-medium" fv="required" /><span></span>
                <p>Mother's Name *</p><input name="m_name" type="text" class="input short-medium" fv="required" /><span></span>
                <p>Profession</p><input name="profession" type="text" class="input short-medium" /><span></span>
                <p>Permanent Address *</p><textarea name="permanent" class="input short-medium" fv="required" ></textarea><span></span>
                <p>Mailing Address *</p><textarea name="present" class="input short-medium" fv="required" ></textarea><span></span>
                <p>Date of Birth (dd-mm-yyyy)</p><input  name="birth" type="text"  class="input short-medium" /><span></span>
                <p>Nationality *</p><input  name="nationality" type="text"  class="input short-medium" fv="required" /><span></span>
                <p>National ID No/ Passport No</p><input  name="national_id" type="text" class="input short-medium" /><span></span>
            </div>
        </div>
        
        <div class="module-45" style="float:right">
        	<div class="module-header"><span>New Client - Contact</span></div>
            <div class="module-body">
                <h3>Contact Details</h3>
                <p>Telephone: Office</p><input  name="telephone" type="text"  class="input short-medium" /><span></span>
                <p>Telephone: Residence</p><input  name="res" type="text"  class="input short-medium" /><span></span>
                <p>Mobile *</p><input  name="mobile" type="text"  class="input short-medium" fv="required 11" /><span></span>
                <p>E-mail</p><input  name="email" type="text"  class="input short-medium" fv="email 8" /><span></span>
        	</div>
     	</div>
        <div class="module-45" style="float:right">
        	<div class="module-header"><span>New Client - Nominee</span></div>
            <div class="module-body">
                <h3>Details of Nominee</h3>
                <p>Nominee Name *</p><input  name="nomi_name" type="text"  class="input short-medium" fv="required" /><span></span>
                <p>Relation with Client *</p><input  name="relation" type="text"  class="input short-medium" fv="required" /><span></span>
                <p>Contact Address</p><textarea  name="nomi_address" class="input short-medium" fv="required" /></textarea><span></span>
               	
                <p><input type="button" id="btnSubmit" value="Submit" class="submit green" />
                <input type="button" value="Cancel" class="submit gray" /> </p>
            </div>
        </div>
    </form>	
    <?php
		}
		elseif( $_GET["option"] === edit)
		{
			$id = $_GET["client_id"];
			$hDB->Query( "SELECT * FROM tbl_client_profile WHERE client_id = '$id' " );
			$obj = $hDB->Fetch();
			
	?>
		<script type="text/javascript">
            jQuery(document).ready( function() {
                /****			Disable all field area				***/
                jQuery(":text").add('textarea').not(this).attr('disabled','disabled');
            });
        </script>
        
    <form action="<?php print $_SERVER[PHP_SELF] ?>" method="post" id="DataForm">
		<div class="module-50" style="float:left">
        	<div class="module-header"><span>Client - Information</span></div>
            <div class="module-body">
            
            	<h3>Client Information</h3>
                <input type="hidden" name="hidden_client_id" value="<?php print $obj->client_id?>" />
                <p>Name *</p><input name="name" type="text" class="input short-medium " value="<?php print $obj->client_name ?>" fv="required"/><span></span>
                <p>S/O, W/O, D/O *</p><input name="f_name" type="text" class="input short-medium " value="<?php print $obj->client_father_name ?>" fv="required"/><span></span>
                <p>Mother's Name *</p><input name="m_name" type="text" class="input short-medium " value="<?php print $obj->client_mother_name ?>" fv="required"/><span></span>
                <p>Profession</p><input name="profession" type="text" class="input short-medium " value="<?php print $obj->client_profession ?>"/><span></span>
                <p>Permanent Address *</p><textarea name="permanent" class="input short-medium" fv="required"><?php print $obj->client_add_permanent ?></textarea><span></span>
                <p>Mailing Address *</p><textarea name="present" class="input short-medium" fv="required"><?php print $obj->client_add_present ?></textarea><span></span>
                
                <p>Date of Birth (dd-mm-yyyy)</p><input  name="birth" type="text"  class="input short-medium" value="<?php print $obj->client_date_birth ?>"/><span></span>
                <p>Nationality *</p><input  name="nationality" type="text"  class="input short-medium" value="<?php print $obj->client_nationality ?>" fv="required" /><span></span>
                <p>National ID No/ Passport No</p><input  name="national_id" type="text"  class="input short-medium" value="<?php print $obj->client_national_id ?>" /><span></span>
           	</div>
       	</div>
        
        <div class="module-45" style="float:right">
        	<div class="module-header"><span>Client - Contact</span></div>
            <div class="module-body">
                <h3>Contact Details</h3>
                <p>Telephone: Office</p><input  name="telephone" type="text"  class="input short-medium" value="<?php print $obj->client_tel_office ?>" /><span></span>
                <p>Telephone: Residence</p><input  name="res" type="text"  class="input short-medium" value="<?php print $obj->client_tel_res ?>" /><span></span>
                <p>Mobile *</p><input  name="mobile" type="text"  class="input short-medium" value="<?php print $obj->client_mobile ?>" fv="required 11" /><span></span>
                <p>E-mail</p><input  name="email" type="text"  class="input short-medium" value="<?php print $obj->client_email ?>" fv="email 8" /><span></span>
            </div>
        </div>
        
        <div class="module-45" style="float:right">
        	<div class="module-header"><span>Client - Nominee</span></div>
            <div class="module-body">
                <h3>Details of Nominee</h3>
                <p>Nominee Name *</p><input  name="nomi_name" type="text" class="input short-medium" value="<?php print $obj->client_nominee_name ?>"  fv="required" /><span></span>
                <p>Relation with Client *</p><input  name="relation" type="text" class="input short-medium" value="<?php print $obj->client_nominee_relation ?>" fv="required" /><span></span>
                <p>Contact Address</p><textarea  name="nomi_address" class="input short-medium" fv="required" /><?php print $obj->client_nominee_contact ?></textarea><span></span>
               
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
<!-- 		************** 			********************	-->
		
<!-- 	*************		All Customers module		********	-->
		<div class="module-95" style="float:left">
        	<div class="module-header"><span>Client List</span></div>
            <div class="module-body-table" style="overflow:auto">
            <form  id="DataForm" action="clients.php?option=com_delete" method="post">
            	<table border="0">
                	<thead>
                    	<tr>
                            <th width="3%"><input type="checkbox" id="ckall" /></th>
                            <th width="3%">#</th>
                            <th width="10%">Clidnt ID</th>
                            <th width="17%">Client Name</th>
                            <th width="17%">S/O, W/O, D/O</th>
                            <th width="10%">Mobile</th>
                            <th width="17%">Nominee Name</th>
                            <th width="10%">Password</th>
                       	</tr>
                 	</thead>
                    <tbody>
             
           		<?php
					$hDB->Query( "SELECT * FROM tbl_client_profile ORDER BY client_id ASC" );
					while( $Object = $hDB->Fetch() )
					{
						$sn++; 
						print "
						<tr>
							<td><input type='checkbox' name='ckbox[]' value='$Object->client_id' id='ckbox'/></td>
							<td>".$sn."</td>
							<td>".$Object->client_id."</td>
							<td><a href='clients.php?option=edit&client_id=$Object->client_id'>".$Object->client_name."</a></td>
							<td>".$Object->client_father_name."</td>
							<td>".$Object->client_mobile."</td>
							<td>".$Object->client_nominee_name."</td>
							<td>".$Object->client_password."</td>
						</tr>";
					}					
					
					?>
                    <input type="hidden" name="customer_id" value="<?php print $obj->customer_id ?>" />
                   	</tbody>
              	</table>
            </form>
            </div>
           
       	</div>
   	<?php
		}
	?>
<!--		***		end of module		*******				-->

    <!--  ****** Delete conframation *************    --> 
    <div id="delete" style="display:none;">
    	<center>
    	<p id="cnftext"><span></span> item(s) into the queue! Do you want delete!</p>
        <br />
        <br />
        <p><input type="button" class="submit green" id="btnDelete" value="&nbsp; Yes &nbsp;" /> <input type="button" id="btnDelCancel" class="submit gray" value="&nbsp; No &nbsp;" /> </p>
        </center>
    </div>
    </div>
    <!-- End 							-->
    
    <!--	footer				-		-->
    <div class="footer">
    	<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
    </div>
</body>
</html>