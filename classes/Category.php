<?php 
require_once "Database.php";

class Category{

	public static function Get_Name($category_id){
		try{
			$query  = "SELECT * FROM categories WHERE category_ID = $category_id";	
			$database = Database::Get_Instance();
			$connection = $database->Get_Connection();
			$statement = $connection->prepare($query);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			return $result["name"];
			
		}catch(PDOException $e ){
			echo "Query Failed ". $e->getMessage();
		}
		
	}

	public static function Get_ID($name){
		try{
			$query  = "SELECT * FROM categories WHERE name = $name";	
			$database = Database::Get_Instance();
			$connection = $database->Get_Connection();
			$statement = $connection->prepare($query);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			return $result["category_ID"];
			
		}catch(PDOException $e ){
			echo "Query Failed ". $e->getMessage();
		}
	}	
	
}
?>