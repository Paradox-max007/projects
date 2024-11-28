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
    $med_id = $_POST['med-id'];
    $place = $_POST['place'];
    $phone = $_POST['mobile'];
    $spec = $_POST['specialisation'];
    $password=$_POST['password'];
    $pass_hash=password_hash($password, PASSWORD_DEFAULT);
    // Directory to store uploaded profile images
    $upload_dir = 'profile_images/';

    // Check if the directory exists; if not, create it
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Retrieve the uploaded file information
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_path = $upload_dir . uniqid() . '_' . $file_name;

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($file_tmp, $file_path)) {
        // Insert the profile image into the 'profile_images' table
        $stmt1 = $conn->prepare("INSERT INTO profile_images (file_name, file_data) VALUES (?, ?)");
        $stmt1->bind_param("ss", $file_name, file_get_contents($file_path));
        $stmt1->execute();
        $user_id = $stmt1->insert_id;
        $stmt1->close();

        // Insert user details into the tables
        $stmt2 = $conn->prepare("INSERT INTO doc_reg (user_id,email, medical_id, docname, place, mobile) VALUES (?,?, ?, ?, ?, ?)");
        $stmt2->bind_param("isssss", $user_id, $email, $med_id, $username, $place, $phone);

        $stmt3 =$conn->prepare("INSERT INTO login_table(password,email,medical_id,userid) VALUES(?,?,?,?)");

        $stmt3->bind_param("ssss",$pass_hash,$email,$med_id,$user_id);

        $stmt4 =$conn->prepare("INSERT INTO qualification (user_id,specialisation) VALUES(?, ?)");

        $stmt4->bind_param("is", $user_id,$spec);
        
        $qry="SELECT * FROM login_table WHERE email='$email'";
        $res=$conn->query($qry);
        if($res->num_rows > 0){
             echo '<script>window.location.href="doc-login.php"; alert("Already have an account.Please login")</script>';
         }
         else{
        if ($stmt2->execute() AND $stmt3->execute() AND $stmt4->execute()) {
           // echo "Profile created successfully.";
            echo '<script> alert("Doctor Record Added Successfully. Please note your ID('.$user_id.') inorder to LOGIN ");window.location.href="admin-view-doc.php";</script>';
         

        } else {
            echo '<script>window.location.href="doc-registration.php"; alert("Error adding record.")</script>';
            echo "Error: " . $stmt2->error;
        }
        // Close the statement and database connection
        $stmt2->close();
        
    }}

     else {
        echo "Error uploading profile image.";
    }

    $conn->close();
}
?>
