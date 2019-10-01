<?php 
$USERNAME = 'root';
$PASSWORD = '';
$HOST = 'localhost';
$DB = 'image_library';

class Database{
	private $Connection;
	//Step1:
	private static $instance;
	//Step2:
	private function Database(){
		$this->Open_Connection();
	}
	//Step 3: Get_Instance function
	public static function Get_Instance(){
		if(!isset(self::$instance)){
			self::$instance = new Database();
		}
		return self::$instance;
	}
	public function Open_Connection(){
		global $HOST, $DB, $USERNAME, $PASSWORD;
		try{
			$this->Connection = new PDO("mysql:host=$HOST; dbname=$DB", $USERNAME, $PASSWORD);
			$this->Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "You are connected !";
		}catch(PDOException $e){
			echo "Connection failed : ".$e->getMessage();
		}
	}
	
	public function Close_Connection(){
		$this->Connection = NULL;
	}
	
	public function Get_Connection(){
		return $this->Connection;
	}
}
?>