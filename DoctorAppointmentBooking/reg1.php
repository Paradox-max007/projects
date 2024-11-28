<?php
if (isset($_POST['submit'])) {
    // Database connection parameters
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

    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
    $userid = $_POST['user-id'];
    $place = $_POST['place'];
    $phone = $_POST['mobile'];
    $address = $_POST['address'];
    $password=$_POST['password'];
    $medid="null";
    $pass_hash=password_hash($password, PASSWORD_DEFAULT);
    // Directory to store uploaded profile images
        // Insert user details into the tables
       $stmt2 = $conn->prepare("INSERT INTO user_reg (username,email, housename, place, mobile,userid) VALUES (?,?, ?, ?, ?, ?)");
        
        $stmt2->bind_param("ssssss", $username, $email, $address, $place, $phone,$userid);
       

        $stmt3 =$conn->prepare("INSERT INTO login_table(password,email,medical_id,userid) VALUES(?,?,?,?)");
        

        $stmt3->bind_param("ssss",$pass_hash,$email,$medid,$userid);
        
        
        
        $qry="SELECT * FROM login_table WHERE email='$email'";
        $res=$conn->query($qry);
        if($res->num_rows > 0){
             echo '<script>window.location.href="login-main.php"; alert("Already have an account.Please login")</script>';
         }
         else{
        if ($stmt2->execute() AND $stmt3->execute() ) {
           // echo "Profile created successfully.";
            echo '<script> alert("Record Added Successfully.Please note your ID");window.location.href="login-main.php"</script>';
         

        } else {
            echo '<script>location.href="register.php"; alert("Error adding record.")</script>';
            echo "Error: " . $stmt2->error;
        }
        // Close the statement and database connection
        $stmt2->close();
        
    }}

     else {
        echo "Data not set.";
    }

    $conn->close();

?>
