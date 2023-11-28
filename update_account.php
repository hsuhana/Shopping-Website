<?php
require ('page_structure/connection.php');
var_dump($_SERVER["REQUEST_METHOD"]);
var_dump(isset($_POST["userid"]));

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userid"])) {
    echo "<script>alert('here')</script>";
    $userid = $_POST["userid"];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = hash('sha512', $password);

    // Verifique se o usuário confirmou a alteração

    $sql = "UPDATE accountInfo SET 
                fname = '$fname',
                lname = '$lname',
                username = '$username',
                phone = '$phone',
                email = '$email',
                password = '$password'
                WHERE userid = $userid";

    var_dump($sql);
    
    if ($conn->query($sql) === TRUE) {
        echo "Update Successful";
        header("Location: account_record.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    echo "Invalid request.";
}

$conn->close();
?>