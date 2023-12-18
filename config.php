<?php 
$conn = new mysqli("localhost", "root", "", "penquin");
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }
?>