<?php 

$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'your_db_name';

try {
    //Set PDO error mode to exception
$options = array(PDO::ATTR_ERRMODE_EXCEPTION);
//create a new PDO instance
$conn = new PDO("mysql:host=$host; dbname=$database",$username,$password,$options);

echo "Database Connection Established Successfully ";

}catch(PDOException $e){

    echo "Connection failed: " . $e->getMessage();
    exit;
}

?>