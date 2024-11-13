<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "g9 database system";
	
 $conn = mysqli_connect($server,$username,$password,$db_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
  
?>