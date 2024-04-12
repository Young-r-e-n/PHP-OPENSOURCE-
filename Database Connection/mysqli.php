<?php
$host = 'localhost';
$username ='your_username';
$password = 'your_password';
$database = 'your_db_name';

$conn = mysqli_connect($host,$username,$password,$database);

if (!$conn){
    echo "Connection Failed: ". mysqli_connect_errno() . "-" . mysqli_connect_error();
    exit;
}

?>
