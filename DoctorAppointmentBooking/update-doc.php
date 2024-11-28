<html>
<head>
    <style>
        form {
                max-width: 400px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                background-color: #f7f7f7;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
input[type="text"],
            input[type="email"],
            textarea {
                align-content: center;
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 3px;
                font-size: 16px;
            }
            
        .btn1 {
            text-align: right;
            background-color: #F02C09;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                font-size: 16px;
                text-decoration: none;
        }
        .cancel-button{
            text-align: left;
        }

            /* Style form submit button */
            button {
                background-color: #007bff;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                font-size: 16px;
                
            }

            /* Change button color on hover */
            input[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
</head>
    <body>

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
    $recordId = $_GET['id'];

    // Prepare a SQL query to retrieve the record
    $sql = "SELECT * FROM doc_reg WHERE user_id = $recordId";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful and fetch the record
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        // Now, $record contains the data of the retrieved record
        $places=$row['place'];
        $mobile=$row['mobile'];
        $emails=$row['email'];
        $name=$row['docname'];
    }} else {
        // Handle the case where the record with the specified ID was not found
        echo 'alert("Doctor not found in database")';
    }

}else {
    // Handle the case where 'id' is not set in the URL
    echo 'alert("Id not set")';
}
// Close the database connection


?>
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Update Doctor Details</h1>
            <p>(Only change the necessary fields)</p>

            
            <div class="input-box">
                <label>Updated Email:</label>
                <input type="email" name="email" value="<?php echo $emails ?>">
            </div>
            
            <div class="input-box">
                <label>Updated Place:</label>
                <input type="text" name="place" value="<?php echo $places ?>">
            </div>
            <div class="input-box">
                <label>Updated Mobile Number:</label>
                <input type="text" name="mobile" value="<?php echo $mobile ?>">
            </div>
            
           <div class="right-align">

            <a href="admin-view-doc.php" class="btn1">Cancel</a>

            <button type="submit" class="btn" name='submit' value="recordId">Update</button>
            </div>
            
            
            
        </form>
    </div>
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
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $place=$_POST['place'];
    $mob=$_POST['mobile'];



    $sql1="UPDATE doc_reg SET email='$email',place='$place',mobile=$mob WHERE user_id = $recordId"; 
    
    $sql2="UPDATE login_table SET email='$email' WHERE userid = $recordId";
        
    if ($conn->query($sql1) AND $conn->query($sql2) === TRUE) {
        echo '<script> alert("Doctor Record Updated Successfully!.")</script>';
       
        echo '<script>window.location.href="admin-view-doc.php"</script>';
    } else {
        echo '<script> window.history.back();alert("Error Updating Doctor Record")</script>';
        //echo 'failed updation';
    }
}
?>

</body>
</html>

