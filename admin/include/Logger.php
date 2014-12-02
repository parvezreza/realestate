<?php

class Logger {
	//put your code here
	public static function Login($username,$password)
	{
		DBConnect::Query("SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'");
		
		$CookieObj = DBConnect::Fetch();
		
		if( DBConnect::Row() > 0 ){
			$_SESSION['username'] = $username;
			
			if($_POST['remember']){
				setcookie("userid",$CookieObj->user_id,time()+(3600*24*15),"/");
				setcookie("username",$username,time()+(3600*24*15),"/");
			}
			
			header("location: dashboard.php");
		}
		else{
			header("location: login.php?option=log&error=1");
		}
	}
	
	public static function Check()
	{
		if(!isset($_SESSION['username'])){
			if(!isset($_COOKIE['userid']) && !isset($_COOKIE['username'])){
				if($_SERVER['SERVER_NAME'] == 'localhost')
					print "<script>location.href='http://".$_SERVER['SERVER_NAME']."/noboudoy/admin/login.php';</script>";
				else
					print "<script>location.href='http://".$_SERVER['SERVER_NAME']."/admin/login.php';</script>";
				//header("location: ".$_SERVER['SERVER_NAME']."/noboudoy/admin/login.php");
			}
			else{
				$_SESSION['username'] = $_COOKIE['username'];
			}
			
		}
	}
	
	public static function Permit()
	{
		if(isset($_SESSION['username'])){ //|| (isset($_COOKIE['userid']) && isset($_COOKIE['username']))){
			header("location: dashboard.php");
		}
	}
	
	public static function Logout()
	{
		if(isset($_COOKIE['userid']) && isset($_COOKIE['username'])){
			setcookie("userid","",time()-3600,"/");
			setcookie("username","",time()-3600,"/");
		}
		
		session_unset();
		session_destroy();
		header("location: login.php?option=logout");
	}
}

?>