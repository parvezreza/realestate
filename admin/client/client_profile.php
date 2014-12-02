<?php
	require_once( '../include/DBConnect.php' );
	$hDB = new DBConnect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Noboudoy Housing Limited</title>
<link rel="stylesheet" href="../styles/styles.css" type="text/css" />
<link rel="stylesheet" href="../styles/stylesheet.css" type="text/css" />
<link rel="stylesheet" href="../ui+lightness/jquery-ui-1.8.17.custom.css" type="text/css"  />
<script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript">
		function getUrlVars() {
			var vars = {};
			var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
				vars[key] = value;
			});
			return vars;
		}
		
		var elem1 = getUrlVars()["elem1"];
		var elem2 = getUrlVars()["elem2"];
		var http = getUrlVars()["http"];
		
		jQuery (document).ready( function() {
			jQuery("a#client").click(function(e) {
				e.preventDefault();
				if( typeof(http) !== 'undefined' )
				{
					window.opener.document.location=http+'&clientid='+$(this).attr('href');
					window.close();
				}
				else
				{
					if( typeof(elem1) !== 'undefined' ){
						window.opener.document.getElementById(elem1).value = $(this).attr("href");
					}
					if( typeof(elem2) !== 'undefined' ){
						window.opener.document.getElementById(elem2).value = $(this).attr("title");
						window.opener.document.getElementById('plotno').focus();
					}
					window.close();
				}
			});
		});
		
</script>
</head>
<body>
    
    <div class="content">

		
<!-- 	*************		All Customers module		********	-->
		<div class="module-95" style="float:left">
        	<div class="module-header"><span>Client List</span></div>
            <div class="module-body-table" >
            <!--<form  id="DataForm" action="client_profile.php?option=com_delete" method="post">-->
            	<table style="width:100%">
                	<thead>
                    	<tr>
                            <th width="3%">#</th>
                            <th width="7$">Client ID</th>
                            <th width="20%">Client Name</th>
                            <th width="20%">S/O, W/O, D/O</th>
                            <th width="20%">Mailing Address</th>
                            <th width="10%">Mobile</th>
                            <th width="20%">Nominee Name</th>
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
							<td>$sn</td>
							<td>".$Object->client_id."</td>
							<td><a href='".$Object->client_id."' title='".$Object->client_name."' id='client'>".$Object->client_name."</a></td>
							<td>".$Object->client_father_name."</td>
							<td>".$Object->client_add_present."</td>
							<td>".$Object->client_mobile."</td>
							<td>".$Object->client_nominee_name."</td>
						</tr>";
					}					
					
					?>
                   	</tbody>
              	</table>
                <!--</form>-->
            </div>
            
       	</div>
    </div>

<!--		***		end of module		*******				-->
    
    <!--	footer				-		-->
    <div class="footer">
    	<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
    </div>
</body>
</html>