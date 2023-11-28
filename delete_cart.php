<?php

   session_start();
   require ('./page_structure/connection.php');
   
   $var = $_GET["productID"];
   echo $var;

if ($_SERVER["REQUEST_METHOD"] = 'GET' && isset($_GET["productID"])) 
{
 
    $userid = $_SESSION["userid"];
    $productID = $_GET["productID"];
    $sql = "DELETE FROM cart WHERE productID=$productID AND userid=$userid";

    if ($conn->query($sql) == TRUE) {
        echo "Delete Successful";
        header("Location: ./cart.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>