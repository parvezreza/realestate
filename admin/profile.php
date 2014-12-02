<?php 
	require_once( 'include/DBConnect.php' );
	include('include/Logger.php');
	$hDB = new DBConnect();
	Logger::Check();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>User Manager | Noboudoy Housing Limited</title>
    <link rel="stylesheet" href="styles/styles.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="js/md5-mz-1.3.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			
			var curErr = false;
			var userErr = false;
			var emailErr = false;
			var newpassErr = false;
			var repassErr = false;
			
		/******			Authentication Details			***************/	
			jQuery("input[name='cpass']").bind('keyup',function(e) {
				if(e.which == 13)
					e.preventDefault();
					
				var data = $(this).val();
				//$(this).next('span').html(data);
					
				if(data === $("#hpass").val())
				{
					$(this).next('span').removeClass().addClass('input-notation-correct').html('');
					curErr = false;
				}
					
				else
				{
					$(this).next('span').removeClass().addClass('input-notation-error').html('Password is wrong!');
					curErr = true;
				}
			});
			
			jQuery("input[name='username']").bind('keyup',function(e) {
				if(e.which == 13)
					e.preventDefault();
				
				if($(this).val().length > 4 && $(this).val().length < 21)
				{
					$(this).next('span').removeClass().addClass('input-notation-correct').html('');
					userErr = false;
				}
				else
				{
					$(this).next('span').removeClass().addClass('input-notation-error').html('Username is too short!');
					userErr = true;
				}
			});
			
			jQuery("input[name='email']").bind('keyup',function(e) {
				if(e.which == 13)
					e.preventDefault();
				
					var inputVal = $(this).val();
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					
					if(!emailReg.test(inputVal)) {
						$(this).next('span').removeClass().addClass('input-notation-error').html('Invalid Email Format!');
						emailErr = true;
					}
					else
					{
						$(this).next('span').removeClass().addClass('input-notation-correct').html('');
						emailErr = false;
					}
			});
			
			jQuery("input[name='npass']").bind('keyup',function(e) {
				if(e.which == 13)
					e.preventDefault();
				
				if($(this).val().length > 6 && $(this).val().length < 21)
				{
					var $this = $(this);
					var pc;
					
					$(this).next('span').removeClass().addClass('input-notation-correct').html('');
					newpassErr = false;
					/*******		Code for Indicator		********/
						if($this.val().length === 7)
							pc = 61;
							
						else if($this.val().length < 13)
							pc = ($this.val().length - 7) * 2.3 + 60;
							
						else if($this.val().length > 12)
							pc = ($this.val().length - 7) * 2.3 + 60;
						
						 var characterReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
						 var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
						 //var specialReg = 
   						 if(!numericReg.test($this.val()))
							pc += 10;
							
						 if(!characterReg.test($this.val()))
						 	pc += 15;
						
						$(".indicator p").css({"width": pc + "%","max-width":"100%"}); // Width setting
						
						if(pc >60 && pc < 71)
							$(".indicator p").html('very week');
						else if (pc > 70 && pc <81)
							$(".indicator p").html('week');
						else if(pc >80 && pc < 91)
							$(".indicator p").html('Good');
						else if(pc > 90)
							$(".indicator p").html('very good');
					
					/******			*****			****		****/
				}
				else if($(this).val().length > 20)
				{
					$(this).next('span').removeClass().addClass('input-notation-error').html('Password is too long!');
					newpassErr = true;
				}
				else
				{
					$(this).next('span').removeClass().addClass('input-notation-error').html('Password is too short!');
					$(".indicator p").css("width","0%").html('');
					newpassErr = true;
				}
			});
			
			jQuery("#rpass").bind('keyup',function(e) {
				if(e.which == 13)
					e.preventDefault();
					//var data = calcMD5($(this).val())
					
				if($(this).val() === $("input[name='npass']").val() && $(this).val() != '')
				{
					$(this).next('span').removeClass().addClass('input-notation-correct').html('');
					repassErr = false;
				}
				else
				{
					$(this).next('span').removeClass().addClass('input-notation-error').html('Did\'n matched!');
					repassErr = true;
				}
			});
			
			jQuery("#authsubmit").click(function() {
				if( !curErr && !userErr && !emailErr && !newpassErr && !repassErr )
					$("#passform").submit();
			});
			
		});
	</script>
</head>
<body>
	<div class="header">
    <!--		logout			-->
    	<div class="top-bar"><h3>User Manger - Noboudoy Housing Ltd</h3><a href="index.php?option=logout"><span>Logout</span><img src="styles/icon-logout.gif"></a></div>
        <!-- 	end of logout			-->
        
    <!---		Main Navigation			-->    
        <div class="tab">
            	<ul id="nav">
                	<li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="land/">Land Project</a></li>
                    <li><a href="apartment/">Apartment Project</a></li>
                    <li><a href="client/">Client Diary</a></li>
                    <li id="active"><a href="">User Manager</a></li>
                </ul>
        </div>
        <!--	end of main navigation		-->
        
    <!--	Sub Navigation		-->    
        <div class="sub-tab">
        	<p>
                
           	</p>    
        </div>
        <!--	end of sub navigation		-->
        
    </div>
    
    <div class="content">
	<?php
		if($_POST)
		{
			if($_POST["username"])
			{
				$user = trim( $_POST["username"] );
				$email = trim( $_POST["email"] );
				
				if( !empty($_POST["npass"]) )
				{
					$npass = trim( $_POST["npass"] );
					$sql = "UPDATE tbl_users SET username = '$user', email = '$email', password = '$npass' WHERE user_id = '1'";
				}
				else
				{
					$sql = "UPDATE tbl_users SET username = '$user', email = '$email' WHERE user_id = 1";
				}
				
				$hDB->Query( $sql );
				
				Notify::Success( "User authentication successfully updated!" );
			}
		}
	?>
<?php	
		$hDB->Query( "SELECT * FROM tbl_users WHERE user_id = 1" );
		$obj = $hDB->Fetch();
		
?>
    <!-- 	Authentication Form Module		-->
    	<div class="module-50" style="float:left">
        	<div class="module-header"><span>User Manager</span></div>
            <div class="module-body">
            	<form action="profile.php" method="post" id="passform">
                	<h3>User Manager Details</h3>
            	
                	<p>User Name <span style="font-size:9px">( 5-20 )</span></p>
                    	<input class="input short-medium" name="username" type="text" value="<?php print $obj->username ?>" >
                    	<span></span>
                    
                    <p>E-mail</p>
                    	<input type="text" class="input short-medium" name="email" value="<?php print $obj->email ?>"  />
                        <span></span>
                        
                   	<br />
                    <i>If you would like to change the password type a new. Otherwise leave this blank.</i>
                    
                    <p>Current Password</p>
                    	<input type="hidden" id="hpass" value="<?php print $obj->password ?>"  />
                    	<input class="input short-medium" type="password" name="cpass">
                        <span></span>
                    
                    <p>New Password <span style="font-size:9px">( 7-20 )</span></p>
                        <input class="input short-medium" type="password" name="npass">
                        <span></span>
                        
                    <p>Re-enter</p>
                    	<input class="input short-medium" type="password" id="rpass">
                        <span></span>
                    
                    <div class="indicator"><p></p></div>
                    
                    <p><i><strong>Hints:</strong> The password should be at least <strong>Seven</strong> characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ & ).</i></p>
                    
                    <p>
                    	<input type="button" value="Save Change(s)" class="submit green" id="authsubmit" />
                   	</p>
                </form>
            </div>
        </div>
    <!--	end of auth			-->

    </div>
    <!-- end of content			-->
    
    <!--	footer					-->
   	<div class="footer">
    	<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
    </div><br />
</body>
</html>