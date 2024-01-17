<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<!--style is voor de opmaak
dit zorgt ervoor dat de video en de tekst mooi in het midden komt. -->
<style> 
 #container {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
 }
</style>
</head>

<body>

<div id="container">

<!--hier staan de youtube video, de titel, de verzendknop en de velden voor het reactieformulier
alles wat zichtbaar is op het scherm -->

<iframe width="520" height="445" src="https://www.youtube.com/embed/HLQ1cK9Edhc?si=E7JVx2gxIqJMBmT4">
</iframe>

  <h1>Add comment</h1>  

  <form action="" method="POST"> 
    <div> 
         Name: <input type="text" name="naam" value=""> 
    </div> 
    <div> 
         Email: <input type="text" name="email" value=""> 
    </div> 
    <div>
         <textarea name="commentaar" cols="30" rows="10"></textarea>
    </div> 
         <input type="submit" value="Submit">

<?php 

include 'connectie.php';

 $naam = $email = $commentaar = ""; 
 //zodat alles veilig gaat
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $naam = test_input($_POST["naam"]); 
    $email = test_input($_POST["email"]); 
    $commentaar = test_input($_POST["commentaar"]); 

if (empty($naam) || empty($email)) { 
     echo "Name and email are required!"; 
     }  //geeft melding als de naam/email of comment ontbreekt
elseif (empty($commentaar)) { 
         echo "You have not commented";         
    } else{ //maakt de sql klaar voor de reacties
        $sql = "INSERT INTO alles (naam, email, commentaar)
                VALUES ('$naam', '$email', '$commentaar')";
        
        // De query wordt uitgevoerd met de volgende code
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }
}}
     
function test_input($data) { 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}
//haalt de reacties uit de database
$sql_fetch_comments = "SELECT * FROM alles";
$result = $conn->query($sql_fetch_comments);
//voert de sql query uit
if ($conn->query($sql_fetch_comments) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql_fetch_comments . "<br>" . $conn->error;
}


if ($result->num_rows > 0) {
    echo "<h2>Comments:</h2>";
    //laat de gegevens uit de database zien
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>Name:</strong> " . $row["naam"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Comment:</strong> " . $row["commentaar"] . "</p>";
        echo "<hr>";
    }
} else { //geeft melding als er geen reacties zijn
    echo "<p>No comments yet.</p>";
}
$conn->close(); //stopt de verbinding
?>

</div>
</body>
</html>