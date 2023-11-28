<?php
//connect to db
require ('page_structure/connection.php');
include ('common_function.php');

    session_start();

    //check the user is customer or admin
    if (!isset($_SESSION["userid"])) {
        header("location: ./login.html"); // Redirect to login page if not logged in
        exit;
    }

    //default character is no one
    $role = "noone";
    //echo "<script>alert('I am $role')</script>";
    
    if (isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        //echo "<script>alert('I am $role')</script>";
    }
?>

<!DOCTYPE html>
<html id="landingPage" lang="en">
	<head>
		<meta charset="utf-8" />
		<title>HELLO WOOD</title>
		<meta name="author" content="Fang Ting HSU" />
		<meta name="description" content="A toy-selling website ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="image/logo.png" type="image/png" sizes="10x10"/>
		<link rel="stylesheet" href="css/style.css" />
	</head>
    <body class="formbody">
    <div>
    <form class="formstyle" method="post" action="update_account.php">
    <a class="navbar-brand shopper" href="./index.php">
    <img src="image/logo.png" alt="logo">
    </a>
        <h1>EDIT ACCOUNT</h1>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["userid"])) {
            $userid = $_GET["userid"];

            $sql = "SELECT * FROM accountInfo WHERE userid = $userid";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo'
                <input type="hidden" name="userid" value="' . $row["userid"] . '">
                <div>
                <div class="formedit">
                    <label for="fname">FIRST NAME </label>
                    <p>FIRST NAME</p><input type="text" placeholder="FIRST NAME" id="fname" name="fname" value="' . $row["fname"] . '" required />
                </div>
                <br />
                
                <div class="formedit">
                    <label for="lname">LAST NAME </label>
                    <p>LAST NAME</p><input type="text" placeholder="LAST NAME" id="lname" name="lname" value="' . $row["lname"] . '" required />
                </div>
                <br />

                <div class="formedit">
                    <label for="username">USERNAME </label>
                    <p>USERNAME</p><input type="text" placeholder="USERNAME" id="username" name="username" value="' . $row["username"] . '" required />
                </div>
                <br />

                <div class="formedit">
                    <label for="phone">PHONE </label>
                    <p>PHONE</p><input type="tel" placeholder="PHONE" id="phone" name="phone" value="' . $row["phone"] . '" required />
                </div>
                <br />

                <div class="formedit">
                    <label for="email">EMAIL</label>
                    <p>EMAIL</p><input type="email" placeholder="EMAIL" id="email" name="email" value="' . $row["email"] . '" required />
                </div>
                <br />
                
                <div class="formedit">
                    <label for="password">PASSWORD</label>
                    <p>PASSWORD</p><input type="password" placeholder="PASSWORD" id="password" name="password" autocomplete="off" required />
                </div>
                <br />
                </div>
                <input type="submit" class="editbutton" name="updateAccount" value="Update Account" />';


            } else {
                echo "User not found.";
            }
        } else {
            echo "Invalid request.";
        }

        $conn->close();
        ?>
    </form>
    </div>
    <footer>
        <div>
            <p id="footer1">©HELLO WOOD Inc. All rights reserved</p>
        </div>
    </footer>
</body>
</html>
    