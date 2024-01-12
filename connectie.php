<?php 
//dit stukje code is alleen voor het koppelen van de database met de website

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "eindopdracht"; 

$conn = new mysqli($servername, $username, $password, $database); 

if ($conn->connect_error) { 
     die("Connection failed: " . $conn->connect_error);     
    } 
