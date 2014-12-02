<?php
	session_start();
	function __autoload($class_name) {
		include 'include/' . $class_name . '.php';
	}
	
	if($_POST){
		$hDB = new DBConnect();
		
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		Logger::Login($username,$password);
	}
	elseif($_GET){
		Logger::Logout();
	}
	else{
		Logger::Check();
		Logger::Permit();
	}
	
?>