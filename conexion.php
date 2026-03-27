<?php
$conn = mysqli_connect("Localhost", "root", "", "movies_db");
if(!$conn){
    die("connection failed: " . mysqli_connect_errno());
    
}

?>