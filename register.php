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
        <div class="formstyle">
            <a class="navbar-brand shopper" href="./index.php">
            <img src="image/logo.png" alt="logo">
            </a>
            <h1>WELCOME TO HELLO WOOD</h1>
            <?php
                require ('page_structure/connection.php');


                if(isset($_POST['register'])) {
                    //variables

                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $username = $_POST['username'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
                    $role=$_POST['role'];


                    //validate inputs
                    $ok = true;

                    if (empty($fname)) {
	                echo '<p>First name required</p>';
	                $ok = false;
                    }
                    if (empty($lname)) {
	                echo '<p>Last name required</p>';
	                $ok = false;
                    }

                    $sql = "SELECT username FROM accountInfo WHERE username = '$username'";
                    $allusername = $conn -> query($sql);
                    $countallusername = mysqli_num_rows($allusername);

                    if($countallusername > 0) {
                        echo '<p>Choose other user name</p>';
	                    $ok = false;
                    }

                    if (empty($username)) {
	                echo '<p>Username required</p>';
	                $ok = false;
                    }

                    if (empty($phone)) {
                        echo '<p>Phone required</p>';
                        $ok = false;
                    }

                    if (empty($email)) {
                        echo '<p>Email required</p>';
                        $ok = false;
                    }

                    if (empty($password || ($password != $confirm_password))) {
	                echo '<p>Invalid required</p>';
	                $ok = false;
                    }
                    if (empty($role)) {
                    echo '<p>Role required</p>';
                    $ok = false;
                    }

                    if($ok == false) {
                        echo "<p>Please register again</p>";
                        echo "<a href='register.html' class=''>Register</a>";
                    }

                    //decide if we are save it or not
                    if($ok == true) {
	                $password = hash('sha512', $password);


  	                //set up the sql
  	                $sql = "insert into `accountInfo` (fname, lname, username, phone, email, password, role) VALUES ('$fname', '$lname', '$username', '$phone', '$email', '$password', '$role');";
  	                $conn -> query($sql);

                    $sql_get_userid = "SELECT userid FROM accountInfo WHERE username = '$username' AND password = '$password'";
                    $result = $conn -> query($sql_get_userid);

                    if($conn){
                        echo "<script>alert('Successfully register!')</script>";
                    }
                    
	                //disconnect
	                $conn = null;
                    }
                }
            ?>
            <div>
                <p>
                All setup, click the button below to head to the log in page! <a href="login.html">LOGIN</a>
                </p>
            </div>
        </div>
        <footer>
            <div>
                <p id="footer1">©HELLO WOOD Inc. All rights reserved</p>
                <br>
            </div>
        </footer>
    </body>
</html>