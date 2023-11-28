<?php
require ('page_structure/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["userid"])) {
    $userid = $_GET["userid"];

    $sql = "DELETE FROM accountInfo WHERE userid = $userid";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Delete Successful'); window.location.href = 'account_record.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}


$conn->close();
?>

<script>
    function alert() {
        alert(isset($_POST["confirm"]));
    }
</script>