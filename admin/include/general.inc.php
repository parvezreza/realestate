<?php
	/*		Connection	Class			*/
	class mDB
	{
		private $host = 'localhost';
		private $user = 'root';
		private $password = 'root';
		private $dbName = 'mamunzet';
		private $cnn;
		
		private function Connect()
		{
			$this->cnn = mysql_connect($host,$password);
			if(!$cnn)
				print("DB Connection failed! Please check your connection settings.");
			
			$db = mysql_select_db($dbName,$cnn);
			if(!$db)
				print("Database could'nt found! Please check your settings.")
		}
		
		private function Disconnect()
		{
			mysql_close($this->cnn);
		}
		
		/*public static function Query( $queryStr )
		{
			$sql = mysql_query($queryStr);
			
		} */
	}
?>