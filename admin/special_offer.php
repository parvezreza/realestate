<?php 
	require_once( 'include/DBConnect.php' );
	include('include/Logger.php');
	$hDB = new DBConnect();
	Logger::Check();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Special Offer | Noboudoy Housing Limited</title>
<link rel="stylesheet" href="styles/styles.css" type="text/css" />
<link rel="stylesheet" href="ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.formcheck_OLD.js"></script>
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
					
	});
			
</script>

</head>
<body>
	<div class="header">
    <!-- 	Log out					-->
    	<div class="top-bar"><h3>Special Offer</h3><a href="index.php?option=logout"><span>Logout</span><img src="styles/icon-logout.gif"></a></div>
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
            	<a href="special_offer.php?option=showll"><img src="styles/tools-categories.gif" height="25"><span>All Offers</span></a> 
            	<a href="special_offer.php?option=add"><img src="styles/article-addnew.png" height="25"><span>Add New</span></a>
                <a id="mnu-delete" href=""><img src="styles/tools-delete.png" height="25"><span>Delete</span></a>
            </p>    
        </div>
        <!--	end		-->
    </div>
    
    <div class="content">
    <?php
		if($_POST)
		{
			$offer = trim($_POST["offer"]);
			$date = date("Y-m-d");
			
			if($_POST["offerid"])
			{
				$id = $_POST["offerid"];
				
				$hDB->Query("UPDATE tbl_special_offer SET offer_description = '$offer', offer_date = '$date' WHERE offer_id = '$id'");
				
				Notify::Success( '1 Offer updated successfully!' );
			}
			elseif($_GET["option"]==='com_delete')
			{
				foreach($_POST["ckbox"] as $id)
				{
					$hDB->Query( "DELETE FROM tbl_special_offer WHERE offer_id = '$id'" );
				}
			
				Notify::Success( count($_POST["ckbox"])." Offer(s) successfully deleted!" );
			}
			else
			{
				$hDB->Query( "INSERT INTO tbl_special_offer( offer_id, offer_description, offer_date) VALUES('','$offer','$date')" );
				
				Notify::Success( '1 Offer saved successfully!' );
			}
		}
	?>
<!--   *****************		Article Add Form Module			***************** -->
	 <?php
		if($_GET["option"]==="add")
		{
	?>  
            <div class="module-75" style="float:left">
                <div class="module-header"><span>Add Offer</span></div>
                <div class="module-body">
                    <form action="special_offer.php" method="post" id="DataForm">
                        <p>Offer Description</p><input name="offer" class="input medium" type="text" fv="required"> <span></span>
                       
                        <p><input type="button" id="btnSubmit" value="Submit" class="submit green"><input type="button" value="Cancel" class="submit gray"></p>
                        
                    </form>
                </div>
            </div>
           
	<?php
		}

/* <!-- 	*********************		end of article module		******************* -->*/
    	elseif($_GET["option"]==='edit')
		{
			$id = $_GET["offerid"];
            
			$hDB->Query( "SELECT * FROM tbl_special_offer WHERE offer_id = '$id'" );
            
			$obj = $hDB->Fetch();
    ?>
    	<!-- 	*********************		Start of Edit noticeegory		******************* -->	
        	<div class="module-75" style="float:left">
                <div class="module-header"><span>Edit Offer</span></div>
                <div class="module-body">
                    <form action="special_offer.php" method="post" id="DataForm">
                    	<input type="hidden" name="offerid" value="<?php print $id ?>" />
                        <p>Offer Description</p><input name="offer" class="input medium" type="text" value="<?php print $obj->offer_description ?>" fv="required"> <span></span>
                       
                        <p><input type="button" id="btnSubmit" value="Submit" class="submit green"><input type="button" value="Cancel" class="submit gray"></p>
                        
                    </form>
                </div>
            </div>
	<?php
		}
		
 /*<!--	********************* 		noticeegory Table Module		******************* -->*/
		
		else
		{
	?>
            <div id="mod-main" class="module-95" style="float:left">
                <div class="module-header"><span>Special Offers</span></div>
                <div class="module-body-table">
                <form id="DataForm" action="special_offer.php?option=com_delete" method="post">
                    <table border="0">
                        <thead>
                            <tr>
                            	<th width="5%" style="text-align:center"><input type="checkbox" id="ckall" /></th>
                                <th width="10" style="text-align:center">#</th>
                                <th width="50%">Offer_description</th>
                                <th width="20%">Date</th>
                                <th width="15%">Actions</th>
                            </tr>
                        </thead> 
                        
                        <tbody>
                    	<?php
						
                            $hDB->Query( "SELECT * FROM tbl_special_offer ORDER BY offer_id DESC" );
                           
                            while( $obj = $hDB->Fetch() )
                            {
                                $sn++ ;
								print "								
								<tr>
									<td align='center'><input type='checkbox' name='ckbox[]' id='ckbox' value='$obj->offer_id' /></td>
									<td align='center'>".$sn."</td>
									<td>".$obj->offer_description."</td>
									<td>".date("d M, Y",strtotime($obj->offer_date))."</td>
									<td style='border:none'>
										<a href='special_offer.php?option=edit&offerid=$obj->offer_id' title='Edit it!'><img src='styles/pencil.gif'></a>
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