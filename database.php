<?php
class Database 
{
	private static $dbName = 'gmmistur355wi19' ; 
	private static $dbHost = '10.8.30.49' ;
	private static $dbUsername = 'gmmistur355wi19';
	private static $dbUserPassword = 'gmmisturdbwi19g';
	
	private static $dbConnection  = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	// Returns instance of PDO class
	public static function connect()
	{
	   // One connection through whole application
       if ( null == self::$dbConnection )
       {      
        try 
        {
          self::$dbConnection =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
        }
        catch(PDOException $e) 
        {
          die($e->getMessage());  
        }
       } 
       return self::$dbConnection;
	}
	
	public static function disconnect()
	{
		self::$dbConnection = null;
	}
}
?>