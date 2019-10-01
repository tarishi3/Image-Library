<?php
include_once "Database.php";

class Favorite {
    
	
    public static function Add_Favorite($User_ID, $Pictures_ID){
       
		try{
			$query  = "INSERT INTO FAVORITES(User_ID, Pictures_ID)";
			$query .= " VALUES(?, ?)";
			
			$database = Database::Get_Instance();
			$connection = $database->Get_Connection();
			$stmt = $connection->prepare($query);
			$stmt->bindParam(1,$User_ID);
			$stmt->bindParam(2,$Pictures_ID);
          
			$stmt->execute();
			
		}catch(PDOException $e){
			echo "Query Failed ".  $e->getMessage();
		}
    }
    
       
    public static function IsFavorite($User_ID, $Pictures_ID){
		
		try{
			$query = "SELECT Count(*) FROM FAVORITES WHERE Pictures_ID = $Pictures_ID AND User_ID = $User_ID";
            
			$database = Database::Get_Instance();
			$connection = $database->Get_Connection();
			$stmt = $connection->prepare($query);	
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return !empty($result['Count(*)']);
			
		}catch(PDOException $e){
			echo "Query Failed ".$e->getMessage();
		}
	}
    
    public static function Delete_Favorite($User_ID, $Pictures_ID){
	
		try{
			$query = "Delete FROM FAVORITES WHERE Pictures_ID = $Pictures_ID AND User_ID = $User_ID";
			
			$database = Database::Get_Instance();
			$connection = $database->Get_Connection();
			$connection->exec($query);
			
		}catch(PDOException $e){
			echo "Delete Query Failed ".$e->getMessage();
		}
	}
    
    
    
    public static function Display_Delete_Form($Pictures_ID){
        echo "<form action = '#' method = 'post'>";
        echo "<input type = 'hidden' name= 'Pictures_ID' value =".$Pictures_ID." >";
        echo "<button type ='submit' name = 'Delete' class='btn btn-danger'><span class='fa fa-trash'></span></button>";
        echo "</form>";
	}
	public static function Display_Add_Form($isFavorite = FALSE){
		echo "<form action = '#' method = 'POST'>";
        echo "<input type = 'hidden' name= 'Favorite' >";
		echo '<div class="pretty p-icon p-toggle p-plain" style="font-size:16px;color:red;">'; 
		echo '<input type="checkbox" name = "Checkbox" ';
			if($isFavorite){ echo "checked"; }
			
			echo ' onchange="this.form.submit();"  />'; 
			echo '<div class="state p-off">'; 
			echo '<i class="icon fa fa-heart-o" ></i>'; 
			echo '<label>Add Favorite</label>'; 
			echo '</div>'; 
			echo '<div class="state p-on p-danger-o">'; 
			echo '<i class="icon fa fa-heart"></i>'; 
			echo '<label>Remove Favorite</label>'; 
			echo '</div>'; 
		echo '</div>'; 	
        echo "</form>";
	}
    
}
?>