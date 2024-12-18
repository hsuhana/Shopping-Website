<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "phpAssignment2";

    $servername = "sql208.infinityfree.com";
    $username = "if0_37938189";
    $password = "ap0dxiLcNKcq";
    $database = "if0_37938189_shoppingweb";


    $conn = new mysqli($servername, $username, $password, $database);
    
    if($conn -> connect_error){
        die("Connection failed" .$conn -> connect_error);
    }
    echo "";
?>