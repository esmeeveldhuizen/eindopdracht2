<?php 
include 'connectie.php'; 


$sql="INSERT INTO `alles`(`naam`, `email`, `commentaar`, `datum_tijd`) 
VALUES ('kees','kees@jaja','hallo','januari')";

if ($conn->query($sql) === TRUE) { 
    echo "New record created successfully";     
    } else {     
     echo "Error: " . $sql . "<br>" . $conn->error;     
    } 
    
    $conn->close();
