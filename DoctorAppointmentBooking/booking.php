
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $username = $_POST["email"];
    
    $patient=$_SESSION['name'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointment";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['id'])) {
    $recordId = $_GET['id'];

    $sql = "SELECT * FROM doc_reg WHERE user_id = $recordId";
    $sql2 = "SELECT * FROM login_table WHERE email='$patient'";
    // Execute the query
    $result = $conn->query($sql);
    $res = $conn->query($sql2);
    if($res->num_rows > 0){
        while($rows=$res->fetch_assoc()){
            $pid=$rows['userid'];
        }
    }

    // Check if the query was successful and fetch the record
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        // Now, $record contains the data of the retrieved record
        $dname=$row['docname'];
}}


    if (isset($_SESSION['name'])) {

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $mob=$_POST['mobile'];
    $place=$_POST['place'];
     // Ensure the script stops execution after redirection

$query="SELECT * FROM bookings WHERE email='$email'";
$dup=$conn->query($query);
if($dup->num_rows > 0){
    while ($row = $dup->fetch_assoc()) {
echo 'you already have an appointment at '.$row['dates'].' on '.$row['btime'].' for Dr.'.$dname;
    }}
else{

$sql1 = "SELECT * FROM bookings WHERE dates='$date' AND btime='$time'";
$res= $conn->query($sql1);
if($res->num_rows > 0){
    echo 'Doctor already have an appointment on'. $date.'at'.$time.'.Please choose another date or time';
}
else{
    
$sql = "INSERT INTO bookings VALUES ('$name','$email','$date','$time',$mob,'$place','$dname',$recordId,'$pid') ";

$result = $conn->query($sql);

if($result === TRUE){
    $_SESSION['booking']=$pid;
    $session_id=session_id();
    echo "<script>alert('Booking Successful')</script>";
    echo '<script>window.location.href="index.php";</script>';
    //echo'<script> header("location: index.php") </script>';
    
}
else{
    echo 'Error Booking'. $conn->error;

    //echo '<script>window.history.back();location.reload();</script>';
}

}}}

}
else{
    header("Location: login-main.php");
}
}}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Your Doctor</title>
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
            input[type="date"],
            input[type="time"],
            textarea {
                align-content: center;
                width: 90%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 3px;
                font-size: 16px;
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

<form action="" method="post" enctype="multipart/form-data">
            <h1>Appointment Booking</h1>
            <div class="input-box">
                <label>Patient Name:</label>
                <input type="text" name="name">
            </div>
            <div class="input-box">
                <label>Your Email:</label>
                <input type="email" name="email">
            </div>

            
            <div class="input-box">
                <label>Date for Appointment:</label>
                <input type="date" type="time" name="date" >
            </div>
            
            <div class="input-box">
                <label>Time for Appointment:</label>
                <input type="time" name="time" >
            </div>
            <div class="input-box">
                <label>Mobile Number:</label>
                <input type="text" name="mobile"  >
            </div>
            
           <div class="input-box">
                <label>Your Place:</label>
                <input type="text" name="place">
           </div>
            
            <button type="submit" class="btn" name='submit'>Book Now</button>
            
            
            
        </form>
</body>
</html>