<?php 
 $naam = $email = $commentaar = ""; 
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = test_input($_POST["naam"]); 
    $email = test_input($_POST["email"]); 
    $commentaar = test_input($_POST["commentaar"]); 
 

 if (empty($name) || empty($email)) { 
     echo "Naam en email zijn verplicht"; 
     } 
 elseif (empty($commentaar)) { 
         echo "U heeft geen commentaar opgegeven";         
 } else { 
     echo "Naam: " . $name;     
     echo "<br>";     
     echo "Email: " . $email;     
     echo "<br>";     
     echo "Commentaar: " . $commentaar;     
     } 
    }
     

function test_input($data) { 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
 }
?>

</body>
</html>