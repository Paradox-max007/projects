<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["password"];
include('connection.php');
if(isset($_POST['login'])) {
$email=$_POST['email'];
$pass=$_POST['password'];

$stmt = $con->prepare("SELECT password FROM login_table WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    // Bind the result to a variable
    $stmt->bind_result($pass_hash);

    
if ($stmt->fetch()) {
        // Verify the password
	$res=password_verify($pass, $pass_hash);
        if ($res) {
            $_SESSION['name'] = $username;

            if (isset($_SESSION['name'])) {
            header("location:index.php");
        }
        else{
            echo '<script> window.location.href="login-main.php"</script>';
        }
        } else {
           echo '<script> window.location.href="login-main.php"; alert("Login Failed. Incorrect E-mail Id/Medical Id or Password")</script>';
        }
    } else {
        echo '<script> window.location.href="register.php"; alert("Please Register to Login")</script>';
    }

    // Close the statement and database connection
    $stmt->close();
    $con->close();
}
}
?>