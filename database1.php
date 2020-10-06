<?php
//Create database connection
    $servername = "localhost:3308";
    $username = "bhavya";
    $password = "1111";
    $database="myDB";    
            
    $conn=mysqli_connect($servername,$username,$password,$database);

if (!$mysqli) {

die("Connection error: " . mysqli_connect_error());

}
?>