<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin = $_POST["email"];
include('connection.php');
if(isset($_POST['login'])) {
$email=$_POST['email'];
$pass=$_POST['password'];

$stmt = $con->prepare("SELECT * FROM login_table WHERE  email = ? AND password = ?");
    $stmt->bind_param("ss",  $email, $pass);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['admin'] = $email;
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            if (isset($_SESSION['admin'])) {    
	           header("location:admin-panel.php");
        }
        else{
            echo '<script>window.location.href="admin-login.html";alert("Login Failed!")</script>';
        }
    }
        
else{
	echo '<script>window.location.href="admin-login.html";alert("Login Failed. Password missmatch!")</script>';
}
    // Close the statement and database connection
    $stmt->close();
    $con->close();
}
}}
?>