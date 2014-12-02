<?php
	require_once( '../include/DBConnect.php' );
	include('../include/Logger.php');
	$hDB = new DBConnect();
	Logger::Check();;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Plot | Noboudoy Housing Limited</title>
<link rel="stylesheet" href="../styles/styles.css" type="text/css" />
<link rel="stylesheet" href="../styles/stylesheet.css" type="text/css" />
<link rel="stylesheet" href="../ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css"  />
<script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/jquery.formcheck_OLD.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
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
		/****			Form Submission				***/
			jQuery("input[name='total_price']").blur( function() {
				if( parseInt($(this).val()) < parseInt($("input[name='plot_katha']").val()) ) {
					$(this).next('span').removeClass().addClass('input-notation-error').html('Total price is not valid!');
					$(this).focus();
				}
			});
			
			jQuery("input[name='total_price']").keyup( function() {
				if( parseInt($(this).val()) >= parseInt($("input[name='plot_katha']").val()) ) {
					$(this).next('span').removeClass().html('');
				}
			});
			
			jQuery('#btnSubmit').click( function() {
				if( parseInt($("input[name='total_price']").val()) < parseInt($("input[name='plot_katha']").val()) ) {
					$("input[name='total_price']").next('span').removeClass().addClass('input-notation-error').html('Total price is not valid!');
				}
				else {
					jQuery('#DataForm').formCheck({ errorClass : 'input-notation-error', submit : true });
				}
			});
			$("input[value='Cancel']").click( function() {
				window.history.back();
			});
		/*			**			**				**			*/
		
		jQuery('input#client_id').click( function() {
			window.open('client_profile.php?elem1=client_id&elem2=client_name','clientdialog','fullscreen=no,resizable=no, width=850, height=500');
		});
		
	});
</script>
</head>
<body>
	<div class="header">
    <!--		logout				-->
    	<div class="top-bar"><h3>Plot Information</h3><a href="../index.php?option=logout"><span>Logout</span><img src="../styles/icon-logout.gif"></a></div>
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
            	<a href="plot.php?option=showall"><img src="../styles/tools-client-plot.png" height="25"><span>Client Plots</span></a> 
                <a href="plot.php?option=add"><img src="../styles/article-addnew.png" height="25"><span>Add New</span></a>
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
					$hDB->Query( "DELETE FROM tbl_plot_info WHERE plot_info_id = '$id'" );
				}
				Notify::Success( count($_POST["ckbox"])." plot information has deleted from list!" );
			}
		}
		else
		{
			$client_id = $_POST["client_id"];
			$client_name = $_POST["client_name"];
			
			$plot_number = $_POST["plot_number"];
			$file_number = $_POST["file_number"];
			$road_number = $_POST["road_number"];
			$sector = $_POST["sector"];
			$plot_size = $_POST["plot_size"];
			
			$plot_katha = sprintf("%.2f",$_POST["plot_katha"]);
			$total_price = sprintf("%.2f",$_POST["total_price"]);
			$installment = $_POST["total_install"];
			
			if( $_POST["info_id"] )
			{
				$id = $_POST["info_id"];
				
				$hDB->Query( "UPDATE tbl_plot_info SET plot_number = '$plot_number', plot_file_number = '$file_number', plot_road_number = '$road_number', plot_sector = '$sector', plot_size = '$plot_size', plot_rate_per_katha = '$plot_katha', plot_total_price = '$total_price', plot_total_installment = '$installment' WHERE plot_info_id = '$id'" );
				
				Notify::Success( "Plot Information updated successfully" );
				
			}
			else
			{
				$hDB->Query( "SELECT * FROM tbl_plot_info WHERE client_id = '".$client_id."'");
				if( $hDB->Row() > 0 ) {
					Notify::Error( "Client already exist in the plot info table. Please try other!" );
				}
				else {
					$hDB->Query( "INSERT INTO tbl_plot_info (plot_info_id, client_id, client_name, plot_number, plot_file_number, plot_road_number, plot_sector, plot_size, plot_rate_per_katha, plot_total_price, plot_total_installment, plot_date ) VALUES ('', '$client_id', '$client_name', '$plot_number', '$file_number', '$road_number', '$sector','$plot_size', '$plot_katha', '$total_price', '$installment', '".date( 'Y-m-d' )."' )");  
				
					Notify::Success( "Plot information added successfull!");   
				}
			}
		}
	}

?>
<!-- ************ PHP Submition Code  ****************************-->
	<?php
		if( $_GET["option"] === add )
		{
		
	?>
		<div class="module-50" style="float:left">
        	<div class="module-header"><span>Plot Information</span></div>
            <div class="module-body">
            <form action="<?php print $_SERVER[PHP_SELF] ?>" method="post" id="DataForm">
                <p>Client ID</p><input name="client_id" id="client_id" type="text" class="input short-medium" fv="numbers 1" /><span></span>
                	<p><i><b>Hints:</b> Click Client Id text field to select and insert a client id. Client name will be inserted automatically!</i></p>
                    
                <p>Client Name</p><input name="client_name" id="client_name" type="text" class="input short-medium" fv="required 5" /><span></span>
                
                <p>Plot Number</p><input name="plot_number" id="plotno" type="text" class="input short-medium" fv="required 1" /><span></span>
                
                <p>File Number</p><input name="file_number" type="text" class="input short-medium" fv="required 1" /><span></span>
                
                <p>Road Number</p><input name="road_number" type="text" class="input short-medium" fv="required 2" /><span></span>
                
                <p>Sector</p><input name="sector" type="text" class="input short-medium" fv="required 1" /><span></span>
                
                <p>Plot Size (katha)</p><input name="plot_size" type="text" class="input short-medium" fv="fraction 1" /><span></span>
                
                <p>Rate Per Katha</p><input name="plot_katha" type="text" class="input short-medium" style="text-align:right" fv="currency 2" /><span></span>
                
                <p>Total Price (BDT)</p><input name="total_price" type="text" class="input short-medium" style="text-align:right" fv="currency 3" /><span></span>
                
                <p>Total Installment</p><input name="total_install" type="text" class="input short-medium" fv="numbers 1" /><span></span>
                
                <p><input type="button" id="btnSubmit" value="Submit" class="submit green" />
                <input type="button" value="Cancel" class="submit gray" /> </p>
          	</form>
            
          	</div>
		</div>
     <?php 
		}
		elseif( $_GET["option"] === edit )
		{
			$id = $_GET["id"];
			$hDB->Query( "SELECT * FROM tbl_plot_info WHERE plot_info_id = '$id' " );
		 	$Object = $hDB->Fetch();
	?>
    	<div class="module-50" style="float:left">
        	<div class="module-header"><span>Plot Information</span></div>
            <div class="module-body">
            <form action="<?php print $_SERVER['PHP_SELF'] ?>" method="post" id="DataForm">
            
                <input type="hidden" name="info_id" value="<?php print $id ?>" />
                <p>Client ID</p><input name="client_id" type="text" class="input short-medium"  value="<?php print $Object->client_id ?>" disabled="disabled"/>
                
                <p>Client Name</p><input name="client_name" type="text" class="input short-medium" value="<?php print $Object->client_name ?>" disabled="disabled"/>
                
                <p>Plot Number</p><input name="plot_number" type="text" class="input short-medium" value="<?php print $Object->plot_number ?>" fv="required 1" /><span></span>
                
                <p>File Number</p><input name="file_number" type="text" class="input short-medium" value="<?php print $Object->plot_file_number ?>" fv="required 1" /><span></span>
                
                <p>Road Number</p><input name="road_number" type="text" class="input short-medium" value="<?php print $Object->plot_road_number ?>" fv="required 2"/><span></span>
                
                <p>Sector</p><input name="sector" type="text" class="input short-medium" value="<?php print $Object->plot_sector ?>" fv="required 1"/><span></span>
                
                <p>Plot Size (katha)</p><input name="plot_size" type="text" class="input short-medium" value="<?php print $Object->plot_size ?>" fv="fraction 1" /><span></span>
                
                <p>Rate Per Katha</p><input name="plot_katha" type="text" class="input short-medium" value="<?php print $Object->plot_rate_per_katha ?>" style="text-align:right" fv="currency 2" /><span></span>
                
                <p>Total Price (BDT)</p><input name="total_price" type="text" class="input short-medium" value="<?php print $Object->plot_total_price ?>"/ style="text-align:right" fv="currency 3" /><span></span>
                
                <p>Total Installment</p><input name="total_install" type="text" class="input short-medium" value="<?php print $Object->plot_total_installment ?>" /><span></span>
                
                <p><input type="button" id="btnSubmit" value="Submit" class="submit green" />
                <input type="button" value="Cancel" class="submit gray" /> </p>
          </form>
          </div>
		</div>
    <?php
		}
		else
		{
	?>
			<div class="module-95" style="float:left">
        		<div class="module-header"><span>Plot Information</span></div>
            	<div class="module-body-table">
            	<form id="DataForm" action="plot.php?option=com_delete" method="post">
                <table style="width:100%">
                	<thead>
                    	<tr>
                            <th width="2%"><input type="checkbox" id="ckall" /></th>
                            <th width="3%">#</th>
                            <th width="18%">Client Name</th>
                            <th width="6%">Client ID</th>
                            <th width="6%">Plot Number</th>
                            <th width="10%">File Number</th>
                            <th width="10%">Road Number</th>
                            <th width="5%">Sector</th>
                            <th width="10%">Plot Size</th>
                            <th width="10%">Rate Per Katha</th>
                            <th width="10%">Total Price</th>
                            <th width="10%">Installment</th>
                            <th>Edit</th>
                       	</tr>
                 	</thead>
                    <tbody>
                    <?php
						$hDB->Query( "SELECT * FROM tbl_plot_info ORDER BY plot_info_id ASC" );
						while( $Object = $hDB->Fetch() )
						{
							$sn++;
							print "<tr>
							<td><input type='checkbox' name='ckbox[]' value='$Object->plot_info_id' id='ckbox' /></td>
							<td>$sn</td>
							<td><a href='plot.php?option=edit&id=".$Object->plot_info_id."'>".$Object->client_name."</a></td>
							<td>".$Object->client_id."</td>
							<td>".$Object->plot_number."</td>
							<td>".$Object->plot_file_number."</td>
							<td>".$Object->plot_road_number."</td>
							<td>".$Object->plot_sector."</td>
							<td>".$Object->plot_size."</td>
							<td align='right'>".$Object->plot_rate_per_katha."</td>
							<td align='right'>".$Object->plot_total_price."</td>
							<td align='center'>".$Object->plot_total_installment."</td>
							<td>
								<a href='plot.php?option=edit&id=".$Object->plot_info_id."'><img src='../styles/pencil.gif' /></a>
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