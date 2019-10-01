<?php 
require_once "Database.php";
include_once "Favorite.php";
include_once "Rating.php";
class Pictures{
		
	private $ID;
	private $Title;
	private $Category;
	private $Image;
	
	function Car($Title,$Category,$Image, $ID = null){
		$this->ID = $ID;
		$this->Title = $Title;
		$this->Category = $Category;
		$this->Image = $Image;
	}
		
	
	public function Create(){
		
		$database = Database::Get_Instance();
		$connection = $database->GetConnection();
		try{
			$query  = "INSERT INTO CAR(Title, Category, Image) ";
			$query .= " VALUES(?, ?, ?)";
		
			$stmt = $connection->prepare($query);
			$stmt->bindParam(1,$this->Title);
			$stmt->bindParam(2,$this->Category);
			$stmt->bindParam(3,$this->Image);
		
			$stmt->execute();
			
			return $connection-> lastInsertId();
			
		}catch(PDOException $e){
			echo "Query Failed ".  $e->getMessage();
		}
	}

	public static function ReadPictures(){
		
		try{
		
			$query = "SELECT * FROM pictures";
			$database = Database::Get_Instance();
		    $connection = $database->Get_Connection();
			$statement  = $connection->prepare($query);
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			return $result;
			
		}catch(PDOException $e){
			echo "Query Failed : ".$e->getMessage();
		}	
		
	}
	
	public static function Get_Favorite_Pictures($User_ID){
        try{
			$query = "SELECT * FROM pictures INNER JOIN favorites ON pictures.ID = favorites.Pictures_ID AND favorites.User_ID = $User_ID ";
			
			$database = Database::Get_Instance();
			$connection = $database->Get_Connection();
			$statement = $connection->prepare($query);
			$statement->execute();
			
			return $statement->fetchAll(PDO::FETCH_ASSOC);
        
		}catch(PDOException $e){
			echo "Query Failed ".$e->getMessage();
		}
    }

	public static function Get_By_ID($category_id){
		try{
			$query = "SELECT * FROM pictures WHERE Category = $category_id";
			$database = Database::Get_Instance();
			$connection = $database->Get_Connection();
			$statement = $connection->prepare($query);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
			
		}catch(PDOException $e){ 
			echo "Query failed ".$e->getMessage();
		}
	}

	public static function Calculate_Rating($pictures_id, $user_id = NULL){
		
		try{
			$query = "";
			if(empty($user_id)){
				$query = "SELECT AVG(Rating) FROM ratings WHERE Pictures_ID = $pictures_id";
			}else{
				$query = "SELECT AVG(Rating) FROM ratings WHERE Pictures_ID = $pictures_id AND User_ID = $user_id";
			}
			$database = Database::Get_Instance();
		    $connection = $database->Get_Connection();
			$statement  = $connection->prepare($query);
			$statement->execute();
			
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			
			return $result["AVG(Rating)"];
			
		}catch(PDOException $e){
			echo "Query Failed : ".$e->getMessage();
		}			
	}

	public static function display_detail($array, $id, $user_id = NULL){

		foreach ($array as $row) {

			if ($row['Category'] == $id) {

				echo "<div class = 'col-sm-6 col-md-4 col-lg-3 col-xl-2 item'>";
				echo "<img src='images/".$row['Image']."'alt='IMage' height='200' width='250'>";
				echo '<div class="card-footer">';
				echo "<font color = #CC0000><h6> Average Rating: </font></h6>";
					Rating::Display_Stars(self::Calculate_Rating($row['ID']));
				
				if(!empty($user_id)){
					echo "<br>";
					$user_rating = Pictures::Calculate_Rating($row['ID'], $user_id);
					Rating::Display_Form(Round($user_rating));
				}
				
				if(!empty($user_id)){
					echo "<br>";
					$isFavorite = Favorite::IsFavorite($user_id, $row['ID']);
					Favorite::Display_Add_Form($isFavorite);
				}
						
				echo "<br>";
				echo '</div>';
				echo "</div>";

				
			}
		}

	}

	
	
	public static function Display_Pictures($img_array){

		
		foreach ($img_array as $row) {
			
		$str = "<div class='col-sm-6 col-md-4 col-lg-3 col-xl-2 item' data-aos='fade' data-src='images/".$row['Image']."'";
		$str .= "data-sub-html='<h4>".$row['Title']."</h4>'>";
		echo $str;
		echo "<a href='#'><img src='images/".$row['Image']."'alt='IMage' height='200' width='250'></a>";
		echo "</div>";

		}
		
	}
}
?>




