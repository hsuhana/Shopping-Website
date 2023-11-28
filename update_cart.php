<?php


require ('./page_structure/connection.php');

// $quantity=$_POST['qty'];
// $userid=$_POST['userid'];
// $productID=$_POST['productID'];
// echo $quantity;
// echo "s";
// echo $userid;
// echo "s";
// echo $productID;



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])){
    //echo "<script>alert('start')</script>";
  
    $quantity=$_POST['qty'];
    $userid=$_POST['userid'];
    $productID=$_POST['productID'];
   
    $update_cart="UPDATE cart SET quantity = $quantity WHERE productID = $productID AND userid = $userid";

    if ($conn->query($update_cart) === TRUE) {
        echo "Update Successful";
        header("Location: ./cart.php");
        exit();
    }else{
        "Error: " . $update_cart . $conn->error;
    }

    //header("Location: ./cart.php");
    //exit(); 

}

$conn->close();
?>

