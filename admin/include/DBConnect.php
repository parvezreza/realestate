<?php
session_start();
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnect
 *
 * @author Mamun
 */
class DBConnect {
    //put your code here
    private $_DBhost;
    private $_DBuser;
    private $_DBpass;
    private $_DBname;

    private static $_cnn;
    private static $_result;

    public function  __construct()
    {
       /* if($_SERVER['SERVER_NAME'] == 'localhost'){
			$this->_DBhost = 'localhost';
			$this->_DBuser = 'root';
			$this->_DBpass = '';
			$this->_DBname = 'noboudoy';
		}
		else{
			$this->_DBhost = 'localhost';
			$this->_DBuser = 'noboudoy_admin';
			$this->_DBpass = '5iFTsTL=MEd5';
			$this->_DBname = 'noboudoy_housing';
		}*/
		switch($_SERVER['SERVER_NAME'])
		{
			case 'localhost':
				$this->_DBhost = 'localhost';
				$this->_DBuser = 'root';
				$this->_DBpass = '';
				$this->_DBname = 'noboudoy';
				break;
			
			case 'www.noboudoy.com':
				$this->_DBhost = 'localhost';
				$this->_DBuser = 'noboudoy_admin';
				$this->_DBpass = '5iFTsTL=MEd';
				$this->_DBname = 'noboudoy_housing';
				break;
		}

        self::$_cnn = mysql_connect($this->_DBhost,  $this->_DBuser, $this->_DBpass);
        if( !self::$_cnn )
            throw new Exception("Databas could'nt connect! Because, ".  mysql_error());

        $db = mysql_select_db( $this->_DBname, self::$_cnn );
        if( !$db )
            throw new Exception("Could'nt select database! Because, ".  mysql_error());
		
    }

    public static function Query( $qstring )
    {
        //$sql = mysql_real_escape_string( $qstring );
        try 
        {
            self::$_result = mysql_query( $qstring );
            if( !self::$_result )
                throw new Exception ( "Could'nt attempt query! Because, ".mysql_error ());
         
        }catch ( Exception $e){
            Notify::Error( $e->getMessage() );
        }
     
    }

    public static function Fetch()
    {
        $fetch = mysql_fetch_object( self::$_result );
        return $fetch;
    }
	
	public static function Arrays()
    {
        $fetch = mysql_fetch_row( self::$_result );
        return $fetch;
    }
	
	public static function Row()
	{
		$row = mysql_num_rows( self::$_result );
		return $row;
	}

    public function  __destruct()
    {
        @mysql_free_result( self::$_result );
        @mysql_close( self::$_cnn );
    }
}

class Notify {

    public static function Success( $message )
    {
        print "<p class='notification n-success' >".$message."</p>";
    }

    public static function Error( $message )
    {
        print "<p class='notification n-error' >".$message."</p>";
    }

    public static function Information( $message )
    {
        print "<p class='notification n-information' >".$message."</p>";
    }

    public static function Attention( $message )
    {
        print "<p class='notification n-attention' >".$message."</p>";
    }
}

?>
