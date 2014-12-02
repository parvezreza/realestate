<?php
	session_start();
	function __autoload($class_name) {
		include 'include/' . $class_name . '.php';
	}
	Logger::Permit();	
	$hDB = new DBConnect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login | Noboudoy Housing Limited</title>
    <link rel="stylesheet" href="styles/styles.css" type="text/css" />
    <script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
    <style type="text/css">
		.module-25{
			float:left;
			width:25%;
			margin:7% 0 0 37.5%;
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
		.header{
			margin:5% 0 0 37.5%;
			width:25%;
		}
		.footers{
			background:transparent url(styles/footer-bg.gif) repeat-x;
			float:left;
			width:100%;
			margin:12% 0 0 0;
			padding:5px 0 0 0;
			text-align:center
		}
	</style>
    <script type="text/javascript">
		/*jQuery(document).load(function(){
			jQeury(".container").css({ */
	</script>
</head>

<body>
    <div class="header">
    	<h1>Noboudoy Housing Limited</h1>
    </div>
    
	<div class="module-25">
    	<div class="module-header"><span>Administration</span></div>
        <div class="module-body">
            <form action="index.php" method="post">
            <?php
				if($_GET['error']){
					Notify::Error("Wrong Username or Password!");
					print "<p>&nbsp;</p>";
				}
			?>
            <p><label>Username:</label> <input class="input medium" type="text" name="username"></p>
            <p><label>Password:</label>&nbsp; <input class="input medium" type="password" name="password"></p>
            <p>
            	&nbsp; <input class="checkbox" type="checkbox" name="remember" value="yes" /> <label>Remember me</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input class="submit green" type="submit" value="Log in">
            </p>
            
            </form>
        </div>
   	</div>
    <div class="forgot">Forgot Password? <a href="recovery1.php">Click here..</a></div>
	<!--	footer					-->
    <div class="footers">
    	<span>&copy; 2013. <a href="http://www.worldgaon.com" target="_blank">Worldgaon (Pvt.) Ltd.</a></span>
    </div>
</body>
</html>