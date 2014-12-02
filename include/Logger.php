<?php

class Logger {
	
	public static function Check()
	{
		if(!isset($_SESSION['userid'])){
			if(!isset($_COOKIE['userid'])){
				if($_SERVER['SERVER_NAME'] == 'localhost')
					print "<script>location.href='http://".$_SERVER['SERVER_NAME']."/noboudoy/customer_login.php';</script>";
				else
					print "<script>location.href='http://".$_SERVER['SERVER_NAME']."/customer_login.php';</script>"; 
				//header("location: customer_login.php");
			}
			else{
				$_SESSION['userid'] = $_COOKIE['userid'];
			}
		}
	}
	
	public static function Permit()
	{
		if(isset($_SESSION['userid'])){ //|| (isset($_COOKIE['userid']) && isset($_COOKIE['username']))){
			//header("location: customer.php");
			if($_SERVER['SERVER_NAME'] == 'localhost')
				print "<script>location.href='http://".$_SERVER['SERVER_NAME']."/noboudoy/customer.php';</script>";
			else
				print "<script>location.href='http://".$_SERVER['SERVER_NAME']."/customer.php';</script>";
		}
	}
	
	public static function Logout()
	{
		if(isset($_COOKIE['userid'])){
			setcookie("userid","",time()-3600,"/");
		}
		
		session_unset();
		session_destroy();
		//header("location: customer_login.php?option=logout");
	}
}

?>