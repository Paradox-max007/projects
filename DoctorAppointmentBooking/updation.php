<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "appointment";

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check for errors in the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['id'])) {
    $id_to_delete = $_POST['id'];
    $sql1 = "DELETE FROM doc_reg WHERE user_id = '$id_to_delete'";
    $sql2 = "DELETE FROM qualification WHERE user_id = '$id_to_delete'";
    $sql3 = "DELETE FROM profile_images WHERE id = '$id_to_delete'";
    $sql4 = "DELETE FROM login_table WHERE userid = '$id_to_delete'";
    if ($conn->query($sql1) AND $conn->query($sql2) AND $conn->query($sql3) AND $conn->query($sql4)  === TRUE) {
       echo '<script> alert("User Deleted") </script>';
       echo '<script> window.history.back() </script>';
    } else {
        echo "<script> alert('Error deleting record: ' ) </script>";
    }

}

?>