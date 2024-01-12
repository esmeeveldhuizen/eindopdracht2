<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


<style>
 #container{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
 }
</style>
</head>

<body>

<div id="container">

<iframe width="520" height="445" src="https://www.youtube.com/embed/HLQ1cK9Edhc?si=E7JVx2gxIqJMBmT4">
</iframe>

  <h1>Voeg commentaar toe</h1>  

  <form action="" method="POST"> 

    <div> 
         naam: <input type="text" name="naam" value=""> 
    </div> 
    <div> 
         email: <input type="text" name="email" value=""> 
    </div> 
    <div>
         <textarea name="commentaar" cols="30" rows="10"></textarea>
    </div> 
         <input type="submit" value="Verzenden">

<?php 

include 'connectie.php';

 $naam = $email = $commentaar = ""; 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $naam = test_input($_POST["naam"]); 
    $email = test_input($_POST["email"]); 
    $commentaar = test_input($_POST["commentaar"]); 

if (empty($naam) || empty($email)) { 
     echo "Naam en email zijn verplicht"; 
     } 
elseif (empty($commentaar)) { 
         echo "U heeft geen commentaar opgegeven";         
    } else{
        $sql = "INSERT INTO alles (naam, email, commentaar)
                VALUES ('$naam', '$email', '$commentaar')";
    }
}
     
function test_input($data) { 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}

$sql_fetch_comments = "SELECT * FROM alles";
$result = $conn->query($sql_fetch_comments);

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



if ($result->num_rows > 0) {
    echo "<h2>Comments:</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>Name:</strong> " . $row["naam"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Comment:</strong> " . $row["commentaar"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No comments yet.</p>";
}
$conn->close();
?>

</div>
</body>
</html>