<?php 
	require_once( 'include/DBConnect.php' );
	include('include/Logger.php');
	$hDB = new DBConnect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Noboudoy Housing Limited</title>
    <link rel="stylesheet" href="styles/styles.css" type="text/css" />
    <script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
    <style type="text/css">
		.module-25{
			float:left;
			width:25%;
			margin:12% 0 0 37.5%;
			background:url(styles/module-body-left-bg.gif) no-repeat scroll bottom left;
			clear:both;
		}
		.module-body p{
			text-align:center;
		}
		.input{ font-weight:400}
		.forgot{
			float:left;
			width:100%;
			text-align:center;
			margin:10px 0 0 0;
		}
		.checkbox{ }
	</style>
    <script type="text/javascript">
		/*jQuery(document).load(function(){
			jQeury(".container").css({ */
	</script>
</head>

<body>
	<div class="module-25">
    	<div class="module-header"><span>Administration</span></div>
        <div class="module-body">
        <?php
			if($_POST){
				$email = trim($_POST['email']);
				DBConnect::Query("SELECT * FROM tbl_users WHERE email = '$email'");
				if(DBConnect::Row() > 0){
					$obj = DBConnect::Fetch();
					/****		Mailing Password		***/
					$to = $email;
					$subject = "Account Recovery";
					$message = "Your User Name is: ".$obj->username."!\n\nYour Password is: ".$obj->password;
					$header = "From: www.noboudoy.com";
					@mail($to,$subject,$message,$header);
					/*****		*****		****		***/
					print "Please check your email, a message has sent to your email!<br /><br />";
					print "<a href='login.php'>Login...</a>";				}
				else{
					Notify::Error("Invalid Email ID!");
					print "<a href='recovery1.php'>Try again..</a>";
				}
			}
			else
			{
		?>		
            <form action="recovery1.php" method="post">
            <p>Enter your valid email id.</p>
            <p><label>Email:</label> <input class="input medium" type="text" name="email"></p>
            <p>
                <input class="submit green" type="submit" value="Submit">
            </p>
            
            </form>
        <?php
			}
		?>
        </div>
   	</div>
    
	<!--<div class="module-25">
    	<div class="module-header"><span>Administration</span></div>
        <div class="module-body">
            <form action="index.php" method="post">
            <?php
				/*if($_GET['error']){
					Notify::Error("Wrong Username or Password!");
					print "<p>&nbsp;</p>";
				}*/
			?>
            <p><label>Username:</label> <input class="input medium" type="text" name="username"></p>
            <p><label>Password:</label>&nbsp; <input class="input medium" type="password" name="password"></p>
            <p>
            	&nbsp; <input class="checkbox" type="checkbox" name="remember" value="yes" /> <label>Remember me</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input class="submit green" type="submit" value="Log in">
            </p>
            
            </form>
        </div>
   	</div>-->
</body>
</html>
