<?php
//connect to db
require ('page_structure/connection.php');

//store the user inputs in variables and hash the password
$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);
//var_dump($username);
//var_dump($password);

//set up and run the query
$sql = "SELECT userid, role FROM accountInfo WHERE username = '$username' AND password = '$password'";
$result = $conn -> query($sql);
//var_dump($sql);
//store the number of results in a variable
$count = mysqli_num_rows($result);
//var_dump($count);
//check if any matches found
if($count == 1) {
	echo 'Logged in Successfully.';
	//foreach ($result as $row): This loop iterates over each row in the result set ($result). In each iteration, the current row is assigned to the variable $row. This assumes that $result is an iterable object, such as a PDOStatement.
	foreach($result as $row) {
		//access the existing session created automatically by the server
		session_start();
		//take the user's id from the database and store it in a session variable
		$_SESSION['userid'] = $row['userid'];
		$_SESSION['role'] = $row['role'];

		//redirect the user
		Header('Location: index.php');
	}
}
else {
	echo '<div>';
	echo '<p>Invalid Login</p>';
	echo '<p>Please log in again';
	echo "<a href='login.html' class=''>Log In</a>";
	echo '</p>';
	echo '</div>';
}
$conn = null;

?>