<?php
class Database{
    
   
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "slimblog";
    
    public $connection;
    
    
    public function __construct(){
        
        $this->open_db_connection();
        
    }
    
    
    public function open_db_connection(){
        date_default_timezone_set('America/New_York');
        
        $this->connection = @new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);
        
        if($this->connection){
            //echo "Connected<br>";
        }
        else{
            die("Database connection failed". $this->$connection->connect_error() );
            
        }
    }
    
    
   public function row_count($result){


        return mysqli_num_rows($result);

    }
    
    
    
   public function escape($string) {


	   return $this->connection->real_escape_string($string);


  }
    
    
    
   private function confirm($result) {
    date_default_timezone_set('America/New_York');

	if(!$result) {
		die("QUERY FAILED" . $this->connection->error);
	 }

  }



public function query($query) {


	$result =  $this->connection->query($query);

	$this->confirm($result);

	return $result;


}

public function fetch_assoc($result){

	while($row = mysqli_fetch_assoc($result)){

		$db_rows[] = $row;
	}
	return $db_rows;
}




public function fetch_array($result) {


	return mysqli_fetch_array($result);

}

    
public function the_insert_id(){
    
    return $this->connection->insert_id;
}
    
    
    
}
 $database = new Database();


?>