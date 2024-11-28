<?php
session_start();
include('connection.php');
if(isset($_POST['login'])) {
$email=$_POST['email'];
$pass=$_POST['password'];
$doc_id=$_POST['id'];
$stmt = $con->prepare("SELECT password FROM login_table WHERE userid = ? AND email = ?");
    $stmt->bind_param("ss", $doc_id, $email);

    // Execute the statement
    $stmt->execute();

    // Bind the result to a variable
    $stmt->bind_result($pass_hash);

    // Fetch the result
   /* if ($stmt->fetch()) {
    // $stored_hashed_password now contains the hashed password
    // You can use it for password verification during login
    echo "Stored Hashed Password: " . $pass_hash;
}*/
if ($stmt->fetch()) {
        // Verify the password
	$res=password_verify($pass, $pass_hash);
        if ($res) {
            header("location:view-booking.php?id=$doc_id");
        } else {
           echo '<script> window.location.href="doc-login.php"; alert("Login Failed. Incorrect E-mail Id/Medical Id or Password")</script>';
        }
    } else {
        echo "User not found.";
    }

    // Close the statement and database connection
    $stmt->close();
    $con->close();
}



 
/*if(password_verify($pass, $pass_hash)){
$result=mysqli_query($con,"SELECT * FROM login_table WHERE email='$email' AND medical_id='$med_id'");
$row=mysqli_num_rows($result);
if($row> 0){

header("location:sample.php");
}
else{
echo '<script> window.location.href="doc-login.php"; alert("Login Failed. Incorrect E-mail Id/Medical Id or Password")</script>';
}
}
}*/
?>