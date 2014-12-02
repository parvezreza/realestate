<?php
	require_once( '../include/DBConnect.php' );
	include('../include/Logger.php');
	$hDB = new DBConnect();
	Logger::Check();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Payment | Noboudoy Housing Limited</title>
<!--<link rel="stylesheet" href="styles/styles.css" type="text/css" />-->
<link rel="stylesheet" href="../styles/styles.css" type="text/css" />
<link rel="stylesheet" href="../styles/stylesheet.css" type="text/css" />
<link rel="stylesheet" href="../ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css"  />
<script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/jquery.formcheck_OLD.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var selcount = 0;
		
	/***			add action				***/
		jQuery ("a#mnu-add").click( function(e) {
			e.preventDefault();
			var http = $(this).attr('href');
			window.open('client_profile.php?http='+http,'clientdialog','fullscreen=no,resizable=no, width=850, height=500');
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
		/**				Form Submission 			***/
			jQuery('#btnSubmit').click( function() {
				jQuery('#DataForm').formCheck({ errorClass : 'input-notation-error', submit : true });
			});
			
			$("input[value='Cancel']").click( function() {
				window.history.back();
			});
		/*			**			**				**			*/
		
	});
</script>
</head>
<body>
	<div class="header">
    <!--		logout				-->
    	<div class="top-bar"><h3>Client Payment</h3><a href="../index.php?option=logout"><span>Logout</span><img src="../styles/icon-logout.gif"></a></div>
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
            	<a href="payment.php"><img src="../styles/tools-payment.png" height="25"><span>All Payments</span></a> 
                <a href="<?php print $_SERVER['PHP_SELF'].'?option=add' ?>" id="mnu-add"><img src="../styles/article-addnew.png" height="25"><span>Add New</span></a>
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
			if( $_GET["action"] === "com_delete" )
			{
				if(count($_POST["ckbox"]) >0 )
				{
					foreach( $_POST["ckbox"] as $id )
					{
						$hDB->Query( "DELETE FROM tbl_payment_info WHERE payment_id = $id" );
					}
					Notify::Success( count($_POST["ckbox"])." Payment has deleted from list!" );
				}
			}
			else
			{
				$client_id = trim( $_POST[client_id] );
				$amount = trim( $_POST[payment_amount] );
				$amounts = sprintf("%.2f",$amount);
				$installment = trim( $_POST[payment_installment] );
				//$date = trim( $_POST[payment_date] );
				$remarks = trim( $_POST[payment_remarks] );
				if( $_POST["payment_id"] )
				{
					$id = $_POST["payment_id"];
					
					$hDB->Query( "UPDATE tbl_payment_info SET payment_amount = '$amounts', payment_remarks = '$remarks'  WHERE payment_id = '$id' " );
					Notify::Success( "Customer payment updated successfully!");
				}
				else
				{
					$hDB->Query("INSERT INTO tbl_payment_info (payment_id, client_id, payment_amount, payment_installment, payment_date, payment_remarks) VALUES ('','$client_id','$amounts', '$installment', '".date( 'Y-m-d' )."', '$remarks')");
					Notify::Success( "Payment information added successfully!" );
				} 
			}
		}
	?>
<!-- ************ PHP Submition Code End ****************************-->
<!--		*********** 	Customer Pay Module	*************************** -->
    <?php
		if( $_GET["option"] === "add" )
		{
			$clientid = $_GET["clientid"];
			
			if( $_GET["install"] )
			{
				$installment = $_GET["install"]+1;
			}
			else
			{
				$hDB->Query( "SELECT * FROM tbl_payment_info WHERE client_id = '$clientid'" );
				if( $hDB->Row() > 0 )
				{
					$hDB->Query( "SELECT MAX(payment_installment) AS installment FROM tbl_payment_info WHERE client_id = '$clientid'" );
					$obj = $hDB->Fetch();
					$installment = $obj->installment + 1;
				}
				else
				{
					$installment = 0;
				}
			}
			$hDB->Query( "SELECT client_name FROM tbl_client_profile WHERE client_id = '$clientid'" );
			$obj = $hDB->Fetch();
	?>
		<div class="module-50" style="float:left">
        	<div class="module-header"><span>Client Payment</span></div>
            <div class="module-body">
                <form action="<?php print $_SERVER[PHP_SELF] ?>" method="post" id="DataForm">
                
                	<input type="hidden" name="client_id" value="<?php print $clientid ?>" />
                    <p>Client ID</p><input type="text"  class="input short-medium" value="<?php print $clientid ?>"  disabled="disabled"/>
                    
                    <p>Client Name</p><input type="text" class="input short-medium" value="<?php print $obj->client_name ?>" disabled="disabled" />
                    
                    <input type="hidden" name="payment_installment" value="<?php print $installment ?>" />
                    <p>Installment</p><input type="text" class="input short-medium" value="<?php if( $installment == 0 ) print 'Down Payment';
                                                                                            else print $installment; ?>" disabled="disabled"/>
                    
                    <p>Payment Amount *</p><input  name="payment_amount" type="text" class="input short-medium" style="text-align:right" fv="currency 2" /><span></span>
    
                    <p>Payment Remarks</p><input name="payment_remarks" type="text" class="input short-medium" />
                    
                    <p><input type="button" id="btnSubmit" value="Submit" class="submit green" />
                    <input type="button" value="Cancel" class="submit gray" /> </p>
                
                </form>
                
            </div>
        </div>	
     <?php
		}
		elseif( $_GET["option"] === "edit" )
		{
			$id = $_GET["paymentid"];
			$hDB->Query( "SELECT * FROM tbl_payment_info WHERE payment_id = '$id' " );
			$obj = $hDB->Fetch();
			
			$hDB->Query( "SELECT client_name FROM tbl_client_profile WHERE client_id = '".$obj->client_id."'" );
			$Object = $hDB->Fetch();
	 ?>
			<div class="module-50" style="float:left">
        	<div class="module-header"><span>Client Payment</span></div>
            <div class="module-body">
                <form action="payment.php" method="post" id="DataForm">
                <input type="hidden" name="payment_id" value="<?php print $obj->payment_id ?>" />
                <p>Client ID</p><input  name="client_id" type="text"  class="input medium" value="<?php print $obj->client_id ?>" disabled="disabled"/>
                
                <p>Client Name</p><input type="text" class="input medium" value="<?php print $Object->client_name ?>" disabled="disabled" />
                
                <input type="hidden" name="payment_installment" value="<?php print $obj->payment_installment ?>" />
                <p>Installment</p><input  name="payment_installment" type="text"  class="input medium" value="<?php if( $obj->payment_installment == 0 )
																														print "Down Payment";
																													else print $obj->payment_installment;
																											 ?>" disabled="disabled"/>
                                                                                                             
                <p>Payment Amount *</p><input  name="payment_amount" type="text"  class="input medium" value="<?php print $obj->payment_amount?>" style="text-align:right" fv="currency 2" /><span></span>
                <p>Payment Remarks</p><input name="payment_remarks" type="text" class="input medium" value="<?php print $obj->payment_remarks ?>" />
                
                <p><input type="button" id="btnSubmit" value="Submit" class="submit green" />
                <input type="button" value="Cancel" class="submit gray" /> </p>
                </form>
                
            </div>
        </div>	
    <?php
		}
		elseif( $_GET["option"] === "installment")
		{
			$clientid = $_GET["clientid"];
			$hDB->Query( "SELECT client_name FROM tbl_client_profile WHERE client_id = '$clientid'");
			$obj = $hDB->Fetch();
			
	?>
            <div class="module-70" style="float:left">
                <div class="module-header"><span><?php print $clientid.'. '.$obj->client_name ?> &nbsp; &nbsp; <a href="payment.php?option=add&clientid=<?php print $clientid ?>">+ Add more payment</a></span></div>
                <div class="module-body-table">
                <form action="payment.php?clientid=<?php print $clientid ?>&option=installment&action=com_delete" method="post" id="DataForm" >
                  	<table>
                        <thead>
                            <tr>
                                <th width="5%"><input type="checkbox" id="ckall" /></th>
                                <th width="15%">Installment</th>
                                <th width="25%">Amount</th>
                               <th width="25%">Date</th>
                                <th width="25%">Remarks</th>
                               <!--  <th width="30%">Remarks</th>-->
                                <th width="5%">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $hDB->Query( "SELECT * FROM tbl_payment_info WHERE client_id = '$clientid' ORDER BY payment_id ASC " );
                        while( $Object = $hDB->Fetch() )
                        {
                            print " 
                            <tr>
                                <td><input type='checkbox' id='ckbox' name='ckbox[]' value='".$Object->payment_id."' ></td>";
                            if( $Object->payment_installment == 0)
                            {	
                                print "<td>Down payment</td>";
                            }
                            else
                            {
                                print "<td>".$Object->payment_installment."</td>";
                            }
                            print "
                                <td align='right'>".$Object->payment_amount."</td>
                                <td>".date('d M, Y',strtotime($Object->payment_date))."</td>
                                <td>".$Object->payment_remarks."</td>
                                <td>
                                    <a href='payment.php?option=edit&paymentid=$Object->payment_id'><img src='../styles/pencil.gif' /></a>
                                </td>
                            </tr>";
                        }
                        ?>
                        </tbody>
                 	</table> 
                </form>
                </div>
            </div>	
    <?php
		}
		else
		{
	 ?>
     	<div class="module-80" style="float:left">
        	<div class="module-header"><span>Client Payment</span></div>
            <div class="module-body-table">
            <form id="DataForm" action="payment.php?option=com_delete" method="post">
            	<table>
                	<thead>
                    	<tr>
                            <th width="5%">#</th>
                            <th width="15%">Client ID</th>
                            <th width="25%">Client Name</th>
                           <th width="25%">Installment</th>
                            <th width="5%">Action</th>
                       	</tr>
                 	</thead>
                    <tbody>
             
           		<?php
					$hDB->Query( "SELECT DISTINCT client_id FROM tbl_payment_info ORDER BY payment_id ASC " );
					while( $Object = $hDB->Fetch() )
					{
						$sn++; 
						print "
						<tr>
							<td>$sn</td>
							<td>".$Object->client_id."</td>";
						$objs = mysql_query("SELECT client_name FROM tbl_client_profile WHERE client_id = '".$Object->client_id."'");	
						$result = mysql_fetch_object($objs);	
						print "	
							<td><a href='payment.php?option=installment&clientid=".$Object->client_id."'>".$result->client_name."</a></td>";
						
						$objs = mysql_query( "SELECT MAX(payment_installment) AS installment FROM tbl_payment_info WHERE client_id = '".$Object->client_id."'" );	
						$result = mysql_fetch_object($objs);
						
						$obj = mysql_query( "SELECT * FROM tbl_payment_info WHERE client_id = '".$Object->client_id."' AND payment_installment = '".$result->installment."'" );
						$result2 = mysql_fetch_object($obj);

						print "
							<td><a href='payment.php?option=installment&clientid=$Object->client_id'>$result->installment</a></td>
							<td>
								<a href='payment.php?option=add&clientid=$Object->client_id&install=$result->installment' title='Add more payment!'><img src='../styles/add-plus.png' /></a>
								<a href='payment.php?option=edit&paymentid=$result2->payment_id' title='Edit last payment!'><img src='../styles/pencil.gif' /></a> 
								
							</td>
						</tr>";
					}
					?>
                   	</tbody>
              	</table>
                </form>
            </div>
       	</div>	
     
     <?php
		}
	 ?>
<!-- 		************** 			********************	-->
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